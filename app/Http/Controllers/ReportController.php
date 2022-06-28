<?php

namespace App\Http\Controllers;

use App\BobStore;
use App\Http\Resources\SupplierResource;
use Illuminate\Http\Request;
use App\Product;
use App\Seller;
use App\User;
use App\Search;
use App\Models\Order;
use App\Models\PurchasesItems;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('onlyview');
    }

    //customise

    public function stock_report(Request $request)
    {
        $sort_by = null;
        $products = Product::orderBy('created_at', 'desc');
        if ($request->has('category_id')) {
            $sort_by = $request->category_id;
            $products = $products->where('category_id', $sort_by);
        }
        $products = $products->paginate(15);
        return view('backend.reports.stock_report', compact('products', 'sort_by'));
    }

    public function in_house_sale_report(Request $request)
    {
        $sort_by = null;
        $products = Product::orderBy('num_of_sale', 'desc')->where('added_by', 'admin');
        if ($request->has('category_id')) {
            $sort_by = $request->category_id;
            $products = $products->where('category_id', $sort_by);
        }
        $products = $products->paginate(15);
        return view('backend.reports.in_house_sale_report', compact('products', 'sort_by'));
    }

    public function seller_sale_report(Request $request)
    {
        $sort_by = null;
        $sellers = Seller::orderBy('created_at', 'desc');
        if ($request->has('verification_status')) {
            $sort_by = $request->verification_status;
            $sellers = $sellers->where('verification_status', $sort_by);
        }
        $sellers = $sellers->paginate(10);
        return view('backend.reports.seller_sale_report', compact('sellers', 'sort_by'));
    }

    public function wish_report(Request $request)
    {
        $sort_by = null;
        $products = Product::orderBy('created_at', 'desc');
        if ($request->has('category_id')) {
            $sort_by = $request->category_id;
            $products = $products->where('category_id', $sort_by);
        }
        $products = $products->paginate(10);
        return view('backend.reports.wish_report', compact('products', 'sort_by'));
    }

    public function user_search_report(Request $request)
    {
        $searches = Search::orderBy('count', 'desc')->paginate(10);
        return view('backend.reports.user_search_report', compact('searches'));
    }
    public function purchaseReport(Request $request)
    {

        $from = $request->from ?? '';
        $to = $request->to ?? '';
        $warehouse = $request->warehouse ?? '';
        $supplier = $request->supplier ?? '';
        $seller = $request->seller ?? '';
        $purchaseItems = PurchasesItems::with('product', 'purchase');
        if ($request->from && $request->to) {
            $purchaseItems = $purchaseItems->whereHas('purchase', function ($qq) use ($from, $to) {
                $qq->whereBetween('date', [$from, $to]);
            });
        } elseif ($request->from) {
            $purchaseItems = $purchaseItems->whereHas('purchase', function ($qq) use ($from) {
                $qq->whereBetween('date', [$from, Carbon::now()]);
            });
        } elseif ($request->to) {
            flash('First Select From Date then Select To Date')->warning();
            return back();
        }
        if ($warehouse) {
            $purchaseItems = $purchaseItems->where('warehouse_id' . $warehouse);
        }
        if ($supplier && $seller) {
            flash('Plese Select Supplier Or Seller. Don\'t Select Both!!!')->warning();
            return back();
        }
        $supplier = null;
        if ($supplier) {
            $supplier = Seller::find($supplier);
            $purchaseItems = $purchaseItems->where('supplier_id' . $supplier);
        } elseif ($seller) {
            $supplier = Seller::find($seller);
            $purchaseItems = $purchaseItems->where('supplier_id' . $seller);
        }


        $purchaseItems = $purchaseItems->orderBy('product_id')->paginate(100);
        $warehouse_list = BobStore::orderBy('store_name')->get();
        return view('backend.reports.purchase_report', compact('request', 'purchaseItems', 'warehouse_list','supplier'));
    }
    public function supplierAllAjax(Request $request)
    {

        $users = Seller::where('id', 'like', '%' . $request->q . '%')
            ->where('only_supplier', true)
            ->orWhere('name', 'like', '%' . $request->q . '%')
            ->select("*")->take(10)->get();
        // dd($users);

        if ($users->count()) {
            if ($request->ajax()) {
                return $users;
            }
        } else {
            if ($request->ajax()) {
                return $users;
            }
        }
    }
    public function sellerAllAjax(Request $request)
    {
        $users = Seller::whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->q . '%');
        })
            ->orWhere('id', 'like', '%' . $request->q . '%')
            ->where('only_supplier', false)
            ->select("*")->take(10)->get();

        if ($users->count()) {
            if ($request->ajax()) {
                return SupplierResource::collection($users);
            }
        } else {
            if ($request->ajax()) {
                return SupplierResource::collection($users);
            }
        }
    }
}
