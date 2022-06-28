<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BobStore;
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

class PurchaseController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('onlyview');
    // }

    public function selectWarehouseToPurchase(Request $request, BobStore $warehouse)
    {
        if (!$warehouse) {
            return redirect()->back()->with('success', 'First Select WareHouse');
        }
        $sellers = Seller::with('user')->whereHas('user', function ($q) {
            $q->orderBy('name');
        })->latest()->paginate(30);

        $q = '';
        if ($request->ajax()) {
            $sellers = Seller::with('user')->whereHas('user', function ($q) {
                $q->orderBy('name');
            })->latest()->paginate(30);
            return view('backend.purchase.ajax.suplierListAjax', compact('warehouse', 'sellers', 'q'))->render();
        }
        return view('backend.purchase.selectSupplier', compact('warehouse', 'sellers', 'q'));
    }
    public function serchSupplier(Request $request)
    {
        $warehouse = BobStore::find($request->warehouse);
        $q = $request->q;
        $sellers = Seller::with('user')->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', "%" . $request->q . "%");
            $q->orWhere('email', 'like', "%" . $request->q . "%");
        })->paginate(30);

        return view('backend.purchase.ajax.suplierListAjax', compact('warehouse', 'sellers', 'q'))->render();
    }
    public function newPurchase(Request $request, BobStore $warehouse, Seller $supplier)
    {

        $products = Product::withoutGlobalScopes()->where('user_id', $supplier->user_id)->get();
        $tempProducts = TempItemForPurchase::where('warehouse_id', $warehouse->id)
            ->where('supplier_id', $supplier->id)
            ->where('user_id', Auth::id())
            ->get();
        return view('backend.purchase.newPurchase', compact('warehouse', 'supplier', 'products', 'tempProducts'));
    }
    public function selectTempProduct(Request $request)
    {
        $product = Product::withoutGlobalScopes()->find($request->product);
        $warehouse = BobStore::find($request->warehouse);
        $supplier = Seller::find($request->supplier);

        $tempProduct = new TempItemForPurchase;
        $tempProduct->warehouse_id = $warehouse->id;
        $tempProduct->supplier_id = $supplier->id;
        $tempProduct->product_id = $product->id;
        $tempProduct->sale_price = $product->unit_price;
        $tempProduct->user_id = Auth::id();
        $tempProduct->addedBy_id = Auth::id();
        $tempProduct->save();

        $tempProducts = TempItemForPurchase::where('warehouse_id', $warehouse->id)
            ->where('supplier_id', $supplier->id)
            ->where('product_id', $product->id)
            ->where('user_id', Auth::id());

        return response()->json([
            'success' => true,
            'html' => view('backend.purchase.ajax.selectedItem', compact('tempProduct', 'warehouse', 'supplier'))->render(),
            'product_id' => $tempProduct->product_id,
            'total_purchase_price' => $warehouse->total_purchase_price($supplier->id),
            'grand_total' => number_format($warehouse->total_purchase_price($supplier->id) + $supplier->due(), 2),
            'hasItem' => $warehouse->hasAnyItem($supplier->id),
        ]);
    }
    public function unselectTempProduct(Request $request)
    {
        $product = Product::withoutGlobalScopes()->find($request->product);
        $warehouse = BobStore::find($request->warehouse);
        $supplier = Seller::find($request->supplier);

        $tempProduct = TempItemForPurchase::where('warehouse_id', $warehouse->id)
            ->where('supplier_id', $supplier->id)
            ->where('product_id', $product->id)
            ->where('user_id', Auth::id())
            ->first();


        $product_id = $tempProduct->product_id;
        $tempProduct->delete();

        return response()->json([
            'success' => true,
            'product_id' => $product_id,
            'total_purchase_price' => $warehouse->total_purchase_price($supplier->id),
            'grand_total' => number_format($warehouse->total_purchase_price($supplier->id) + $supplier->due(), 2),
            'hasItem' => $warehouse->hasAnyItem($supplier->id),

        ]);
    }
    public function updateTempItem(Request $request)
    {
        $warehouse = BobStore::find($request->warehouse);
        $supplier = Seller::find($request->supplier);

        $item = TempItemForPurchase::find($request->item);
        if ($request->type == 'price') {
            $item->purchase_price = $request->purchase_price;
            $item->quantity = $request->quantity;
            $item->total_price = $item->purchase_price * $request->quantity;
            $item->save();

            return response()->json([
                'success' => true,
                'final_item_price' => $item->total_price,
                'type' => $request->type,
                'total_purchase_price' => $warehouse->total_purchase_price($supplier->id),
                'grand_total' => $warehouse->total_purchase_price($supplier->id) + $supplier->due(),
                'hasItem' => $warehouse->hasAnyItem($supplier->id),
            ]);
        }

        if ($request->type == 'quantity') {
            $item->quantity = $request->quantity;
            $item->total_price = $item->purchase_price * $item->quantity;
            $item->save();

            return response()->json([
                'success' => true,
                'final_item_price' => $item->total_price,
                'type' => $request->type,
                'total_purchase_price' => $warehouse->total_purchase_price($supplier->id),
                'grand_total' => $warehouse->total_purchase_price($supplier->id) + $supplier->due(),
                'hasItem' => $warehouse->hasAnyItem($supplier->id),
            ]);
        }

        if ($request->type == 'sale_price') {
            $item->sale_price = $request->sale_price;
            $item->save();

            return response()->json([
                'success' => true,
            ]);
        }
    }
    public function storePurchase(Request $request, BobStore $warehouse, Seller $supplier)
    {

        $temp_items = $warehouse->tempPurchaseItems()->where('supplier_id', $supplier->id)->where('user_id', Auth::id())->where('quantity', '>', 0)->get();

        if (count($temp_items) < 1) {
            return redirect()->back()->with('warning', 'Please add some product item');
        }


        //Purchase Start
        $purchase = new Purchase;
        $purchase->warehouse_id = $warehouse->id;
        $purchase->supplier_id = $supplier->id;
        // $purchase->purchase_price = $warehouse->total_purchase_price($supplier->id);
        // $purchase->supplier_due = $supplier->due();
        // $purchase->grand_total = $supplier->due() + $warehouse->total_purchase_price($supplier->id);
        // $purchase->paid_amount = $request->paid_amount ?? 00;
        // $purchase->new_due = $purchase->grand_total - $purchase->paid_amount;
        $purchase->date = $request->date;
        $purchase->save();
        //Purchase End

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
        $supplier->admin_to_pay = $supplier->admin_to_pay + $purchase->purchase_price;
        $supplier->paid_amount = $supplier->paid_amount + $purchase->paid_amount;
        $supplier->save();
        //Supplier Balance Update End


        if ($request->submitType == 'save_and_print') {
            return redirect()->route('purchaseItems', ['warehouse' => $warehouse, 'purchase' => $purchase]);
        }
        return redirect()->back()->with('success', 'Purchase Placed');
    }

    public function purchaseList(Request $request, BobStore $warehouse)
    {
        $purchase_lists = Purchase::with('warehouse', 'supplier')->whereHas('supplier', function ($q) {
            $q->whereHas('user');
        })->where('warehouse_id', $warehouse->id)->latest()->paginate(30);
        return view('backend.purchase.warehousePurchaseList', compact('warehouse', 'purchase_lists'));
    }
    public function purchaseItems(Request $request, BobStore $warehouse, Purchase $purchase)
    {
        $purchase_items = PurchasesItems::with('product', 'supplier')->where('purchase_id', $purchase->id)->get();
        return view('backend.purchase.warehousePurchaseItems', compact('warehouse', 'purchase', 'purchase_items'));
    }
    public function warhouseStockList(BobStore $warehouse)
    {
        $stocks = StoreStock::with('supplier', 'product')
        ->where('warehouse_id', $warehouse->id)
        ->where('quantity','>',0)
        ->orderBy('product_id')
        ->paginate(30);
        return view('backend.purchase.warehouseStockLists', compact('warehouse', 'stocks'));
    }

    public function supplierPayment(Request $request, Seller $supplier)
    {
        $payment_history = SupplierPayment::where('supplier_id', $supplier->id)->latest()->paginate(30);
        return view('backend.purchase.supplier_paments.supplier_payments', compact('supplier', 'payment_history'));
    }
    public function storeSupplierPayment(Request $request, Seller $supplier)
    {
        $request->validate([
            'paid_amount' => 'required|integer',
            'payment_method' => 'required',
            'note' => 'nullable',
            'date' => 'required'
        ]);

        $last_transaction = SupplierPayment::max('transaction_id');
        if ($last_transaction) {
            $transaction_ids = explode('-', $last_transaction)[1] + 1;
            $transaction_id = "bob-" . $transaction_ids;
        } else {
            $transaction_id = "bob-10001";
        }

        $payment = new SupplierPayment;
        $payment->date = $request->date;
        $payment->transaction_id = $transaction_id;
        $payment->supplier_id = $supplier->id;
        $payment->previous_due = $supplier->due();
        $payment->moved_balance = $request->paid_amount;
        $payment->current_due = $payment->previous_due - $request->paid_amount;
        $payment->payment_method = $request->payment_method;
        $payment->note = $request->note;
        $payment->addedBy_id = Auth::id();
        $payment->save();

        $supplier->paid_amount = $supplier->paid_amount + $payment->moved_balance;
        $supplier->save();


        flash("{$payment->moved_balance} Taka Paid Successfully")->success();
        return redirect()->back();
    }

    public function orderStatusChange(Request $request, Order $order)
    {
        $status = $request->status;
        $warehouse = BobStore::find($request->warehouse);

        if ($order->order_status == $status) {

            flash("This Order Already {$status}")->warning();
            return redirect()->back();
        }
        if ($status == 'cancel') {
            foreach ($order->orderDetails()->where('delivery_status', '!=', 'cancel')->get() as $item) {
                if ($item->delivery_status != 'cancel' && $status == 'cancel') {
                    $totalorderItemsCancelPrice = $item->price + $item->tax + $item->shipping_cost + $item->commision;
                    $order->grand_total = $order->grand_total - $totalorderItemsCancelPrice;
                    $order->save();

                    //activity log
                    $a_log = new Activitylog;
                    $a_log->user_id = Auth::id();
                    $a_log->loggable_id = $order->id;
                    $a_log->orderdetails_id = $item->id;
                    $a_log->loggable_type = Order::class;
                    $a_log->description = "Updated $status from $item->delivery_status";
                    $a_log->save();

                    $item->delivery_status = 'cancel';
                    $item->cancel_at = now();
                    $item->save();
                }
            }


            $order->order_status = 'cancel';
            $order->cancel_at = now();
            $order->save();
            return redirect()->back()->with('success', 'Order on Cancelled Successfully');
        }

        if ($status == 'confirmed') {
            if ($request->with_items) {
                foreach ($order->orderDetails as $item) {

                    //activity log
                    $a_log = new Activitylog;
                    $a_log->user_id = Auth::id();
                    $a_log->loggable_id = $order->id;
                    $a_log->orderdetails_id = $item->id;
                    $a_log->loggable_type = Order::class;
                    $a_log->description = "Updated $status from $item->delivery_status";
                    $a_log->save();


                    $item->delivery_status = 'confirmed';
                    $item->confirmed_at = now();
                    $item->save();
                }
            } else {
                $confirmed_order_items = $order->orderDetails()->where('delivery_status', 'pending')->get();
                foreach ($confirmed_order_items as $item) {

                    //activity log
                    $a_log = new Activitylog;
                    $a_log->user_id = Auth::id();
                    $a_log->loggable_id = $order->id;
                    $a_log->orderdetails_id = $item->id;
                    $a_log->loggable_type = Order::class;
                    $a_log->description = "Updated $status from $item->delivery_status";
                    $a_log->save();

                    $item->delivery_status = 'confirmed';
                    $item->confirmed_at = now();
                    $item->save();
                }
            }

            $order->order_status = 'confirmed';
            $order->confirmed_at = now();
            $order->save();


            return redirect()->back()->with('success', 'Order Successfully Confirmed');
        }

        if ($status == 'on_delivery') {
            if ($request->with_items) {
                foreach ($order->orderDetails as  $item) {
                    if ($item->product->hasStock($warehouse->id, $item->quantity)) {  //is Stock Found?
                        $batch = $item->product->warehouseWiseBatch($warehouse->id, $item->quantity);
                        $batch->quantity = $batch->quantity - $item->quantity;
                        $batch->save();

                        $item->store_stock_id =  $batch->id;
                        $item->save();
                    } else { // If Have not Stock of this product Then..
                        $purchase_price = $item->product->purchase_price;
                        $sale_price = $item->product->unit_price;

                        $supplier = User::find($item->seller_id)->seller;

                        //Purchase Start
                        $purchase = new Purchase;
                        $purchase->warehouse_id = $warehouse->id;
                        $purchase->supplier_id = $supplier->id;
                        $purchase->purchase_price = $purchase_price * $item->quantity;
                        $purchase->supplier_due = $supplier->due();
                        $purchase->grand_total = $supplier->due() + ($purchase->purchase_price);
                        $purchase->paid_amount = $request->paid_amount ?? 00;
                        $purchase->new_due = $purchase->grand_total - $purchase->paid_amount;
                        $purchase->date = Carbon::now()->format('Y-m-d');
                        $purchase->save();
                        //Purchase End

                        //Purchase Item Add Start
                        $purchase_items = new PurchasesItems;
                        $purchase_items->warehouse_id = $warehouse->id;
                        $purchase_items->supplier_id = $supplier->id;
                        $purchase_items->product_id = $item->product_id;
                        $purchase_items->purchase_id =  $purchase->id;
                        $purchase_items->purchase_unit_price = $purchase_price;
                        $purchase_items->sale_price =  $sale_price;
                        $purchase_items->quantity =  $item->quantity;
                        $purchase_items->total_price =  $purchase_items->purchase_unit_price * $purchase_items->quantity;
                        $purchase_items->note = "Product {$item->product_id} Purchase From Auth purchase and Stock";
                        $purchase_items->save();
                        //Purchase Item Add End

                        // Store Stock Entry Start
                        $store_stock = new StoreStock;
                        $store_stock->warehouse_id = $warehouse->id;
                        $store_stock->supplier_id = $supplier->id;
                        $store_stock->product_id = $item->product_id;
                        $store_stock->purchase_id =  $purchase->id;
                        $store_stock->purchase_item_id =  $purchase_items->id;
                        $store_stock->purchase_price =  $purchase_price;
                        $store_stock->quantity =  $purchase_items->quantity;
                        $store_stock->sale_price =  $purchase_items->sale_price;
                        $store_stock->addedBy_id =  Auth::id();
                        $store_stock->save();
                        // Store Stock Entry End

                        //After store Stock Item then decrement
                        $store_stock->quantity = 0;
                        $store_stock->editedby_id =  Auth::id();
                        $store_stock->save();
                        //After store Stock Item then decrement

                        //Update Store Stock id in Order Item
                        $item->store_stock_id = $store_stock->id;
                        $item->save();

                        //Supplier amount added
                        $supplier->admin_to_pay = $supplier->admin_to_pay + $purchase->grand_total;
                        $supplier->save();
                    }

                    //activity log
                    $a_log = new Activitylog;
                    $a_log->user_id = Auth::id();
                    $a_log->loggable_id = $order->id;
                    $a_log->orderdetails_id = $item->id;
                    $a_log->loggable_type = Order::class;
                    $a_log->description = "Updated $status from $item->delivery_status";
                    $a_log->save();

                    $item->delivery_status = 'on_delivery';
                    $item->on_delivery_at = now();
                    $item->save();
                }
            } else {

                $confirmed_order_items = $order->orderDetails()->where('delivery_status', 'confirmed')->get();
                foreach ($confirmed_order_items as $item) {
                    if ($item->product->hasStock($warehouse->id, $item->quantity)) {  //is product Stock Found?
                        $batch = $item->product->warehouseWiseBatch($warehouse->id, $item->quantity);
                        $batch->quantity = $batch->quantity - $item->quantity;
                        $batch->save();

                        $item->store_stock_id =  $batch->id;
                        $item->save();
                    } else { // If Have not Stock of this product Then..
                        // dump("Stock Nai");
                        $purchase_price = $item->product->purchase_price;
                        $sale_price = $item->product->unit_price;

                        $supplier = User::find($item->seller_id)->seller;
                        //Purchase Start
                        $purchase = new Purchase;
                        $purchase->warehouse_id = $warehouse->id;
                        $purchase->supplier_id = $supplier->id;
                        $purchase->purchase_price = $purchase_price * $item->quantity;
                        $purchase->supplier_due = $supplier->due();
                        $purchase->grand_total = $supplier->due() + ($purchase->purchase_price);
                        $purchase->paid_amount = $request->paid_amount ?? 00;
                        $purchase->new_due = $purchase->grand_total - $purchase->paid_amount;
                        $purchase->date = Carbon::now()->format('Y-m-d');
                        $purchase->save();
                        //Purchase End

                        //Purchase Item Add Start
                        $purchase_items = new PurchasesItems;
                        $purchase_items->warehouse_id = $warehouse->id;
                        $purchase_items->supplier_id = $supplier->id;
                        $purchase_items->product_id = $item->product_id;
                        $purchase_items->purchase_id =  $purchase->id;
                        $purchase_items->purchase_unit_price = $purchase_price;
                        $purchase_items->sale_price =  $sale_price;
                        $purchase_items->quantity =  $item->quantity;
                        $purchase_items->total_price =  $purchase_items->purchase_unit_price * $purchase_items->quantity;
                        $purchase_items->note = "Product {$item->product_id} Purchase From Auth purchase and Stock";
                        $purchase_items->save();
                        //Purchase Item Add End

                        // Store Stock Entry Start
                        $store_stock = new StoreStock;
                        $store_stock->warehouse_id = $warehouse->id;
                        $store_stock->supplier_id = $supplier->id;
                        $store_stock->product_id = $item->product_id;
                        $store_stock->purchase_id =  $purchase->id;
                        $store_stock->purchase_item_id =  $purchase_items->id;
                        $store_stock->purchase_price =  $purchase_price;
                        $store_stock->quantity =  $purchase_items->quantity;
                        $store_stock->sale_price =  $purchase_items->sale_price;
                        $store_stock->addedBy_id =  Auth::id();
                        $store_stock->save();
                        // Store Stock Entry End

                        //After store Stock Item then decrement
                        $store_stock->quantity = 0;
                        $store_stock->editedby_id =  Auth::id();
                        $store_stock->save();
                        //After store Stock Item then decrement

                        //Update Store Stock id in Order Item
                        $item->store_stock_id = $store_stock->id;
                        $item->save();

                        $supplier->admin_to_pay = $supplier->admin_to_pay + $purchase->grand_total;
                        $supplier->save();
                    }

                    //activity log
                    $a_log = new Activitylog;
                    $a_log->user_id = Auth::id();
                    $a_log->loggable_id = $order->id;
                    $a_log->orderdetails_id = $item->id;
                    $a_log->loggable_type = Order::class;
                    $a_log->description = "Updated $status from $item->delivery_status";
                    $a_log->save();

                    $item->delivery_status = 'on_delivery';
                    $item->on_delivery_at = now();
                    $item->save();
                }
            }
            $order->order_status = 'on_delivery';
            $order->on_delivery_at = now();
            $order->save();

            $order->warehouse_id = $request->warehouse;
            $order->save();
            flash('Order on Delivery Successfully')->success();
            return redirect()->back();
        }

        if ($status == 'delivered') {
            foreach ($order->orderDetails as $item) {
                //activity log
                $a_log = new Activitylog;
                $a_log->user_id = Auth::id();
                $a_log->loggable_id = $order->id;
                $a_log->orderdetails_id = $item->id;
                $a_log->loggable_type = Order::class;
                $a_log->description = "Updated $status from $item->delivery_status";
                $a_log->save();

                $item->delivery_status = 'delivered';
                $item->delivered_at = now();
                $item->save();
            }

            $order->order_status = 'delivered';
            $order->delivered_at = now();
            $order->save();
            flash('Order Delivered Successfully')->success();
            return redirect()->back();
        }
    }


    public function warehouseStockCheck(Request $request)
    {
        $order = Order::find($request->order);

        if ($request->with_items) {
            $order_items = OrderDetail::where('order_id', $order->id)->get();
        } else {
            $order_items = OrderDetail::where('order_id', $order->id)->where('delivery_status', 'confirmed')->get();
        }

        $warehouse = BobStore::find($request->id);

        return $view = view('backend.sales.all_orders.ajax.stockShowAjax', compact('order_items', 'warehouse'))->render();
    }

    public function oldOrderStatusChange()
    {
        $orders = Order::with('orderDetails')->whereHas('orderDetails')->where('order_status', null)->get();
        foreach ($orders as $key => $order) {
            $status = [];
            if ($item = $order->orderDetails()->where('delivery_status', 'delivered')->first()) {
                // $status['id'] = $item->id;
                // $status['order_id'] = $item->order_id;
                $status['status'] = 'delivered';
                $status['date_column'] = 'delivered_at';
                $status['date'] = $item->updated_at;
            } elseif ($item = $order->orderDetails()->where('delivery_status', 'on_delivery')->first()) {
                // $status['id'] = $item->id;
                // $status['order_id'] = $item->order_id;
                $status['status'] = 'on_delivery';
                $status['date_column'] = 'on_delivery_at';
                $status['date'] = $item->updated_at;
            } elseif ($item = $order->orderDetails()->where('delivery_status', 'confirmed')->first()) {
                // $status['id'] = $item->id;
                // $status['order_id'] = $item->order_id;
                $status['status'] = 'confirmed';
                $status['date_column'] = 'confirmed_at';
                $status['date'] = $item->updated_at;
            } elseif ($item = $order->orderDetails()->where('delivery_status', 'pending')->first()) {
                // $status['id'] = $item->id;
                // $status['order_id'] = $item->order_id;
                $status['status'] = 'pending';
                $status['date_column'] = 'pending_at';
                $status['date'] = $item->updated_at;
            } elseif ($item = $order->orderDetails()->where('delivery_status', 'cancel')->first()) {
                // $status['id'] = $item->id;
                // $status['order_id'] = $item->order_id;
                $status['status'] = 'cancel';
                $status['date_column'] = 'cancel_at';
                $status['date'] = $item->updated_at;
            }

            // $delivery_status =$status['status'];
            $order->order_status = $status['status'];
            $date_column = $status['date_column'];
            $order->$date_column = $status['date'];
            $order->save();

            // dump($date_column);
            // dd($order);
            // die;
            // if ($key == 100) {
            //     break;
            // }
            // dump($date_column);
        }
    }
}
