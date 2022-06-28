<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BobStore;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Auth;
use App\Inventory;
use App\Models\Activitylog;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchasesItems;
use App\Models\StoreStock;
use App\Models\SupplierPayment;
use App\Models\TempItemForPurchase;
use App\User;
use Carbon\Carbon;

class SupplierPurchaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('onlyview');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->supplier) {
            $suppliers = Seller::where('id',$request->supplier)->paginate(30);
        }else{
            $suppliers = Seller::whereDoesntHave('user')->orderBy('created_at', 'desc')->paginate(30);
        }
        return view('backend.sellers.suppliers', compact('suppliers'));
    }

    public function create()
    {

        return view('backend.sellers.supplierCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required'
        ]);
        $supplier = new Seller;
        $supplier->name = $request->name;
        $supplier->mobile = $request->mobile;
        $supplier->address = $request->address;
        $supplier->only_supplier = 1;
        $supplier->save();
        flash(translate('Supplier has been inserted successfully'))->success();
        return back();
    }

    public function edit($id)
    {
        $supplier = Seller::findOrFail(decrypt($id));
        return view('backend.sellers.supplierEdit', compact('supplier'));
    }
    public function update(Request $request, Seller $supplier)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required'
        ]);
        $supplier->name = $request->name;
        $supplier->mobile = $request->mobile;
        $supplier->address = $request->address;
        $supplier->only_supplier = 1;
        $supplier->save();
        flash(translate('Supplier has been updated successfully'))->success();
        return back();
    }
    public function destroy($id)
    {
        $supplier = Seller::findOrFail(decrypt($id));
        $supplier->delete();
        flash(translate('Supplier has been Deleted successfully'))->success();
        return back();
    }
    //Supplier Purchase module
    public function selectWarehouseToPurchase(Request $request, BobStore $warehouse)
    {
        if (!$warehouse) {
            flash('success', 'First Select WareHouse')->success();
            return back();
        }
        $suppliers = Seller::whereDoesntHave('user')->latest()->paginate(30);

        $q = '';
        if ($request->ajax()) {
            $suppliers = Seller::whereDoesntHave('user')->latest()->paginate(30);
            return view('backend.purchase.suppliers.ajax.ssuplierListAjax', compact('warehouse', 'suppliers', 'q'))->render();
        }
        return view('backend.purchase.suppliers.sselectSupplier', compact('warehouse', 'suppliers', 'q'));
    }

    public function serchSupplier(Request $request)
    {
        $warehouse = BobStore::find($request->warehouse);
        $q = $request->q;
        $suppliers = Seller::whereDoesntHave('user')
            ->where('name', 'like', "%" . $request->q . "%")
            ->orWhere('mobile', 'like', "%" . $request->q . "%")
            ->paginate(30);

        return view('backend.purchase.suppliers.ajax.ssuplierListAjax', compact('warehouse', 'suppliers', 'q'))->render();
    }
    public function newPurchase(Request $request, Seller $supplier, BobStore $warehouse)
    {
        $tempProducts = TempItemForPurchase::where('warehouse_id', $warehouse->id)
            ->where('supplier_id', $supplier->id)
            ->where('user_id', Auth::id())
            ->get();
        return view('backend.purchase.suppliers.snewPurchase', compact('warehouse', 'supplier', 'tempProducts'));
    }

    public function getProductAjax(Request $request)
    {
        $users = Product::where('id', 'like', '%' . $request->q . '%')
            ->orWhere('name', 'like', '%' . $request->q . '%')
            ->select(["*"])
            ->take(30)
            ->get();
        if ($users->count()) {
            if ($request->ajax()) {
                // return Response()->json(['items'=>$users]);
                return ProductResource::collection($users);
            }
        } else {
            if ($request->ajax()) {
                return ProductResource::collection($users);
            }
        }
    }
    public function getProductPrice(Request $request)
    {
        $product = Product::find($request->product_id);
        return response()->json([
            'unit_price'=>$product->unit_price
        ]);
    }
    public function addTempItem(Request $request)
    {

        $product = Product::withoutGlobalScopes()->find($request->product);
        $warehouse = BobStore::find($request->warehouse_id);
        $supplier = Seller::find($request->supplier_id);
        $temp_item = TempItemForPurchase::where('product_id', $product->id)
            ->where('user_id', Auth::id())
            ->where('warehouse_id', $warehouse->id)
            ->where('supplier_id', $supplier->id)
            ->first();

        if ($temp_item) {
            $temp_item->quantity = $request->quantity;
            $temp_item->purchase_price = $request->purchase_price;
            $temp_item->sale_price = $request->sale_price;
            $temp_item->total_price = $temp_item->purchase_price * $temp_item->quantity;
            $temp_item->editedBy_id = Auth::id();
            $temp_item->save();
            return response()->json([
                'success' => true,
                'status' => 'updated',
                'temp_id' => $temp_item->id,
                'purchase_price' => $temp_item->purchase_price,
                'quantity' => $temp_item->quantity,
                'sale_price' => $temp_item->sale_price,
                'total_price' => $temp_item->total_price,
                'total_purchase_price' => $warehouse->total_purchase_price($supplier->id),
                'grand_total' => $warehouse->total_purchase_price($supplier->id) + $supplier->due(),
            ]);
        } else {
            $temp_item = new TempItemForPurchase;
            $temp_item->warehouse_id = $warehouse->id;
            $temp_item->supplier_id = $supplier->id;
            $temp_item->product_id = $product->id;
            $temp_item->quantity = $request->quantity;
            $temp_item->purchase_price = $request->purchase_price;
            $temp_item->sale_price = $request->sale_price;
            $temp_item->total_price = $temp_item->purchase_price * $temp_item->quantity;
            $temp_item->user_id = Auth::id();
            $temp_item->addedBy_id = Auth::id();
            $temp_item->save();
        }
        return response()->json([
            'success' => true,
            'status' => 'inserted',
            'total_purchase_price' => $warehouse->total_purchase_price($supplier->id),
            'grand_total' => $warehouse->total_purchase_price($supplier->id) + $supplier->due(),
            'html' => view('backend.purchase.suppliers.ajax.sselectedItem', compact('temp_item', 'warehouse', 'supplier'))->render(),
        ]);
    }
    public function deleteTempItem(Request $request)
    {
        $warehouse = BobStore::find($request->warehouse);
        $supplier = Seller::find($request->supplier);
        $temp_item = TempItemForPurchase::find($request->item);
        $temp_item->delete();
        return response()->json([
            'success' => true,
            'total_purchase_price' => $warehouse->total_purchase_price($supplier->id),
            'grand_total' => $warehouse->total_purchase_price($supplier->id) + $supplier->due(),
        ]);
    }
    public function finalSave(Request $request, Seller $supplier, BobStore $warehouse)
    {
        $temp_items = $warehouse->tempPurchaseItems()->where('supplier_id', $supplier->id)->where('user_id', Auth::id())->where('quantity', '>', 0)->get();

        if (count($temp_items) < 1) {
            flash('Please add some product item')->warning();
            return redirect()->back();
        }


        $purchase = new Purchase;
        $purchase->warehouse_id = $warehouse->id;
        $purchase->supplier_id = $supplier->id;
        $purchase->date = $request->purchase_date;
        $purchase->save();

        $total_purchase_price = 0;
        foreach ($temp_items as $item) {
            //Purchase Item Add Start
            $purchase_items = new PurchasesItems;
            $purchase_items->warehouse_id = $warehouse->id;
            $purchase_items->supplier_id = $supplier->id;
            $purchase_items->product_id = $item->product_id;
            $purchase_items->product_name = $item->product->name;
            $purchase_items->purchase_id =  $purchase->id;
            $purchase_items->purchase_unit_price =  $item->purchase_price;
            $purchase_items->sale_price =  $item->sale_price;
            $purchase_items->quantity =  $item->quantity;
            $purchase_items->total_price =  $item->total_price;
            $purchase_items->save();

            $total_purchase_price +=  $purchase_items->total_price;
            //Purchase Item Add End

            // Store Stock Entry Start
            $store_stock = new StoreStock;
            $store_stock->warehouse_id = $warehouse->id;
            $store_stock->supplier_id = $supplier->id;
            $store_stock->product_id = $item->product_id;
            $store_stock->purchase_id =  $purchase->id;
            $store_stock->purchase_item_id =  $purchase_items->id;
            $store_stock->purchase_price =  $purchase_items->purchase_unit_price;
            $store_stock->quantity =   $purchase_items->quantity;
            $store_stock->sale_price =  $purchase_items->sale_price;
            $store_stock->addedBy_id =  Auth::id();
            $store_stock->save();
            // Store Stock Entry End
            $item->delete();
        }

        $purchase->purchase_price =  $total_purchase_price;
        $purchase->supplier_due = $supplier->due();
        $purchase->grand_total = $supplier->due() + $total_purchase_price;
        $purchase->paid_amount = $request->paid_amount ?? 00;
        $purchase->new_due = $purchase->grand_total - $purchase->paid_amount;
        $purchase->save();




        //Supplier Payment Start
        if ($request->paid_amount) {
            $last_transaction = SupplierPayment::max('transaction_id');
            if ($last_transaction) {
                $transaction_ids = explode('-', $last_transaction)[1] + 1;
                $transaction_id = "bob-" . $transaction_ids;
            } else {
                $transaction_id = "bob-10001";
            }

            $suplier_paymnet = new SupplierPayment;
            $suplier_paymnet->date = $purchase->date;
            $suplier_paymnet->transaction_id = $transaction_id;
            $suplier_paymnet->supplier_id = $supplier->id;
            $suplier_paymnet->previous_due =$purchase->grand_total;
            $suplier_paymnet->moved_balance =  $purchase->paid_amount;
            $suplier_paymnet->current_due =  $purchase->new_due;
            $suplier_paymnet->payment_method = 'manual';
            $suplier_paymnet->note = 'Paid With Purchase';
            $suplier_paymnet->addedBy_id = Auth::id();
            $suplier_paymnet->save();
        }



        //Supplier Payment End

        //Supplier Balance Update Start
        $supplier->admin_to_pay = $supplier->admin_to_pay + $total_purchase_price;
        $supplier->paid_amount = $supplier->paid_amount + $purchase->paid_amount;
        $supplier->save();
        //Supplier Balance Update End


        if ($request->has('save_and_print')) {
            // flash('Purchase Placed')->success();
            return redirect()->route('warehousePurchaseItem', ['warehouse' => $warehouse, 'purchase' => $purchase]);
        }
        flash('Purchase Placed')->success();
        return redirect()->back();
    }

    public function warehousePurchaseList(Request $request, BobStore $warehouse)
    {
        $purchase_lists = Purchase::with('warehouse', 'supplier')->whereHas('supplier', function ($q) {
            $q->where('user_id', null);
        })->where('warehouse_id', $warehouse->id)->latest()->paginate(30);
        return view('backend.purchase.suppliers.swarehousePurchaseList', compact('warehouse', 'purchase_lists'));
    }
    public function warehousePurchaseItem(Request $request, BobStore $warehouse, Purchase $purchase)
    {
        $purchase_items = PurchasesItems::with('product', 'supplier')->where('purchase_id', $purchase->id)->get();
        return view('backend.purchase.suppliers.swarehousePurchaseItems', compact('warehouse', 'purchase', 'purchase_items'));
    }
    public function supplierPayment(Request $request, Seller $supplier)
    {
        $payment_history = SupplierPayment::where('supplier_id', $supplier->id)->latest()->paginate(30);
        return view('backend.purchase.suppliers.ssupplier_paments.ssupplier_payments', compact('supplier', 'payment_history'));
    }
    public function warehouseWiseProductStockList(Request $request, Product $product)
    {

        $stocks = StoreStock::with('supplier', 'warehouse', 'purchase_item')->where('product_id', $product->id)->where('quantity', ">", 0)->paginate(30);
        $total_stock_price = 0;
        foreach ($stocks as $stock) {
           $total_stock_price += $stock->quantity * $stock->purchase_price;
        }

        return view('backend.product.products.warehouseWiseProductStockList', compact('product', 'stocks','total_stock_price'));
    }
    public function salesHistoryOfStock(Request $request, StoreStock $stock)
    {
        $stock_history = OrderDetail::where('store_stock_id',$stock->id)->latest()->paginate(30);
        return view('backend.product.products.stockHistory', compact('stock_history', 'stock'));
    }
    public function supplierProductStock(Request $request, Seller $supplier)
    {
        $stocks = StoreStock::with('supplier', 'warehouse', 'purchase_item')->where('supplier_id', $supplier->id)->where('quantity', ">", 0)->paginate(30);
        return view('backend.sellers.supplierProductStocks', compact('supplier', 'stocks'));
    }
    public function supplierInvoice(Request $request, Seller $supplier)
    {
        $purchases = Purchase::with('warehouse','supplier')->where('supplier_id',$supplier->id)->latest()->paginate(30);
        return view('backend.sellers.supplierPurchaseInvoice', compact('supplier', 'purchases'));

    }
    public function supplierInvoiceDetails(Request $request, Seller $supplier,Purchase $purchase)
    {
       $purchase_items = PurchasesItems::with('purchase','product')->where('purchase_id',$purchase->id)->get();
       return view('backend.sellers.supplierPurchaseInvoiceDetails', compact('purchase_items', 'purchase','supplier'));
    }
}
