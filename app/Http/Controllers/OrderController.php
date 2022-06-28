<?php

namespace App\Http\Controllers;

use App\OrderExportList;
use Illuminate\Http\Request;
use App\Http\Controllers\OTPVerificationController;
use App\Http\Controllers\ClubPointController;
use App\Http\Controllers\AffiliateController;
use App\Order;
use App\Product;
use App\ProductStock;
use App\Color;
use App\OrderDetail;
use App\CouponUsage;
use App\Models\Coupon;
use App\OtpConfiguration;
use App\User;
use App\BusinessSetting;
use Auth;
use Session;
use DB;
use PDF;
use Mail;
use App\Models\Seller;
use App\Mail\InvoiceEmailManager;
use App\Mail\PaymentReceivedMailManager;
use CoreComponentRepository;
use Excel;
use Illuminate\Support\Facades\File;
use App\Role;
use Carbon;
use App\Models\Activitylog;
use Agent;
use App\BobStore;
use App\DeliveryMan;

class OrderController extends Controller
{
    protected $device;
    public function __construct()
    {
        if (!Agent::isDesktop()) {
            $this->device = 'frontend.mobile.pages';
        }
        $this->middleware('onlyview');
    }
    /**
     * Display a listing of the resource to seller.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $payment_status = null;
        $delivery_status = null;
        $sort_search = null;
        $orders = DB::table('orders')
            ->orderBy('code', 'desc')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('order_details.seller_id', Auth::user()->id)
            ->select('orders.id')
            ->distinct();

        if ($request->payment_status != null) {
            $orders = $orders->where('order_details.payment_status', $request->payment_status);
            $payment_status = $request->payment_status;
        }
        if ($request->delivery_status != null) {
            $orders = $orders->where('order_details.delivery_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }

        $orders = $orders->paginate(15);

        foreach ($orders as $key => $value) {
            $order = \App\Order::find($value->id);
            $order->viewed = 1;
            $order->save();
        }
        if (Agent::isMobile()) {
            return view($this->device . '.seller.orders', compact('orders', 'payment_status', 'delivery_status', 'sort_search'));
        } else {
            return view('frontend.user.seller.orders', compact('orders', 'payment_status', 'delivery_status', 'sort_search'));
        }
    }
    // All Orders report
    public function all_orders_report(Request $request)
    {
        $date = $request->date;
        $seller_id = $request->user_id;
        $orders = Order::orderBy('code', 'desc');
        if ($date != null) {
            $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        return view('backend.reports.all_order_excel_export', compact('orders', 'seller_id',  'date'));
    }
    public function all_order_export(Request $request)
    {
        $date = $request->date;
        $user_id = $request->user_id;
        if ($date != null and $user_id != null) {
            $order = Order::whereHas('orderDetails', function ($query) use ($user_id, $date) {
                return $query->where('seller_id', '=', $user_id)->whereDate('order_details.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->whereDate('order_details.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
            })->get();
        } else if ($date != null) {
            $order = Order::whereHas('orderDetails', function ($query) use ($user_id, $date) {
                return $query->whereDate('order_details.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->whereDate('order_details.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
            })->get();
        } else if ($user_id != null) {
            $order = Order::whereHas('orderDetails', function ($query) use ($user_id) {
                return $query->where('seller_id', '=', $user_id)->orWhereNull('seller_id');
            })->get();
        }


        $pdf = PDF::setOptions([
            //'a4' => 'portrait',
            'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])->setPaper('a4', 'landscape')->loadView('backend.invoices.test_pdf_report', compact('order'));
        return $pdf->download('order-export.pdf');
        //$date = $request->date;
        //$user_id =$request->user_id;
        //return view('backend.invoices.test_pdf_report');
        // return Excel::download(new OrderExportList($date,$user_id), 'order_export.xlsx');
    }
    // All Orders
    public function all_orders(Request $request)
    {
        $sellers = Seller::get();
        $status = $request->status ?? '';
        $delivery_status = $request->delivery_status ?? '';
        $product = $request->product;
        $date = $request->date;
        $sort_search = null;
        $selleridsf = $request->seller;


        $orders = Order::orderBy('id', 'desc');

        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }

        if ($date != null) {
            $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        if ($delivery_status != null && $selleridsf == null) {
            if ($delivery_status == "paid" || $delivery_status == "unpaid") {

                $orders = $orders->whereHas('paymentDetails', function ($q) use ($delivery_status) {
                    $q->where('payment_status', $delivery_status);
                });
            } else {
                $orders = $orders->whereHas('orderDetails', function ($q) use ($delivery_status) {
                    $q->where('delivery_status', $delivery_status);
                });
            }
        }
        if ($delivery_status != null && $selleridsf != null) {
            if ($delivery_status == "paid" || $delivery_status == "unpaid") {
                $orders = $orders->whereHas('paymentDetails', function ($q) use ($delivery_status, $selleridsf) {
                    $q->where('payment_status', $delivery_status);
                    $q->where('seller_id', $selleridsf);
                });
            } else {
                $orders = $orders->whereHas('orderDetails', function ($q) use ($delivery_status, $selleridsf) {
                    $q->where('delivery_status', $delivery_status);
                    $q->where('seller_id', $selleridsf);
                });
            }
        }

        if ($status) {
           $orders = $orders->where('order_status',$status);
        }



        if ($product) {
            $orders = $orders->whereHas('orderDetails', function ($q) use ($product) {
                $q->where('product_id', $product);
            });
        }

        if ($product) {
            $productDetails = Product::find($product);
        }else{
            $productDetails =null;
        }

        $orders = $orders->paginate(15);
        return view('backend.sales.all_orders.index', compact('orders', 'sort_search', 'date', 'sellers','request','productDetails'));
    }
    public function all_orders_delivery_status(Request $request)
    {
        $date = $request->date;
        $sort_search = null;
        $payment_type = $request->payment_type;
        $delivery_status = $request->delivery_status;

        $orders = Order::orderBy('code', 'desc');

        if ($payment_type != null) {
            $orders->whereHas('orderDetails', function ($query) use ($payment_type) {
                return $query->where('order_details.payment_status', '=', $payment_type);
            });
        }

        if ($delivery_status != null) {
            $orders->whereHas('orderDetails', function ($query) use ($delivery_status) {
                return $query->where('order_details.delivery_status', '=', $delivery_status);
            });
        }
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }
        if ($date != null) {
            $orders = $orders->where('delivery_date', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('delivery_date', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        $orders = $orders->paginate(15);
        return view('backend.reports.all_orders_delivery_status', compact('orders', 'sort_search', 'date', 'payment_type', 'delivery_status'));
    }

    public function all_orders_show($id)
    {
        $order = Order::findOrFail($id);
        $deliveryMans = DeliveryMan::where('active', 1)->get();
        $warehouses = BobStore::where('active', true)->orderBy('store_name')->get();
        return view('backend.sales.all_orders.show', compact('order', 'deliveryMans', 'warehouses'));
    }

    // Inhouse Orders
    public function admin_orders(Request $request)
    {
        $date = $request->date;
        $payment_status = null;
        $delivery_status = null;
        $sort_search = null;
        $admin_user_id = User::where('user_type', 'admin')->first()->id;
        $orders = DB::table('orders')
            ->orderBy('id', 'desc')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('order_details.seller_id', $admin_user_id)
            ->select('orders.id')
            ->distinct();

        if ($request->payment_type != null) {
            $orders = $orders->where('order_details.payment_status', $request->payment_type);
            $payment_status = $request->payment_type;
        }
        if ($request->delivery_status != null) {
            $orders = $orders->where('order_details.delivery_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }
        if ($date != null) {
            $orders = $orders->where('orders.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('orders.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }

        $orders = $orders->paginate(15);
        return view('backend.sales.inhouse_orders.index', compact('orders', 'payment_status', 'delivery_status', 'sort_search', 'admin_user_id', 'date'));
    }

    public function show($id)
    {
        $order = Order::findOrFail(decrypt($id));
        $order->viewed = 1;
        $order->save();
        return view('backend.sales.inhouse_orders.show', compact('order'));
    }

    // Seller Orders
    public function seller_orders(Request $request)
    {

        $date = $request->date;
        $payment_status = null;
        $delivery_status = null;
        $sort_search = null;
        $admin_user_id = User::where('user_type', 'admin')->first()->id;
        $orders = DB::table('orders')
            ->orderBy('id', 'desc')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('order_details.seller_id', '!=', $admin_user_id)
            ->select('orders.id')
            ->distinct();

        if ($request->payment_type != null) {
            $orders = $orders->where('order_details.payment_status', $request->payment_type);
            $payment_status = $request->payment_type;
        }
        if ($request->delivery_status != null) {
            $orders = $orders->where('order_details.delivery_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }
        if ($date != null) {
            $orders = $orders->where('orders.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('orders.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }

        $orders = $orders->paginate(15);
        return view('backend.sales.seller_orders.index', compact('orders', 'payment_status', 'delivery_status', 'sort_search', 'admin_user_id', 'date'));
    }

    public function seller_orders_show($id)
    {

        $order = Order::findOrFail($id);
        $order->viewed = 1;
        $order->save();
        return view('backend.sales.seller_orders.show', compact('order'));
    }


    // Pickup point orders
    public function pickup_point_order_index(Request $request)
    {

        $date = $request->date;
        $sort_search = null;

        if (Auth::user()->user_type == 'staff' && Auth::user()->staff->pick_up_point != null) {

            //$orders = Order::where('pickup_point_id', Auth::user()->staff->pick_up_point->id)->get();
            $orders = DB::table('orders')
                ->orderBy('code', 'desc')
                ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                ->where('order_details.pickup_point_id', Auth::user()->staff->pick_up_point->id)
                ->select('orders.id')
                ->distinct();

            if ($request->has('search')) {
                $sort_search = $request->search;
                $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
            }
            if ($date != null) {
                $orders = $orders->where('orders.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('orders.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
            }

            $orders = $orders->paginate(15);



            return view('backend.sales.pickup_point_orders.index', compact('orders'));
        } else {

            //$orders = Order::where('shipping_type', 'Pick-up Point')->get();
            $orders = DB::table('orders')
                ->orderBy('code', 'desc')
                ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                ->where('order_details.shipping_type', 'pickup_point')
                ->select('orders.id')
                ->distinct();

            if ($request->has('search')) {
                $sort_search = $request->search;
                $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
            }
            if ($date != null) {
                $orders = $orders->where('orders.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('orders.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
            }

            $orders = $orders->paginate(15);

            return view('backend.sales.pickup_point_orders.index', compact('orders', 'sort_search', 'date'));
        }
    }

    public function pickup_point_order_sales_show($id)
    {
        if (Auth::user()->user_type == 'staff') {
            $order = Order::findOrFail(decrypt($id));
            return view('backend.sales.pickup_point_orders.show', compact('order'));
        } else {
            $order = Order::findOrFail(decrypt($id));
            return view('backend.sales.pickup_point_orders.show', compact('order'));
        }
    }

    /**
     * Display a single sale to admin.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       if(Session::has('cart')){
        $delivry_methods_delivery_date = 0;
        $order = new Order;
        if(Auth::check()){
            $order->user_id = Auth::user()->id;
        }
        else{
            $order->guest_id = mt_rand(100000, 999999);
        }

        if (Session::has('delivery_info')){
            $delivry_method_session_id = session()->get('delivery_info');
            $delivry_methods = \App\DelivryMethod::where('id', $delivry_method_session_id)->get();

            foreach ($delivry_methods as $delivry_methods_item){
            $delivry_methods_delivery_date = $delivry_methods_item->delivery_date;
        }
        }

        $date = Carbon\Carbon::now();

        $order->shipping_address = json_encode($request->session()->get('shipping_info'));

        $order->payment_type = $request->payment_option;
        $order->delivery_viewed = '0';
        $order->payment_status_viewed = '0';
        $order->code = "p".rand(100,999)."-".rand(10000000,99999999);
        //$order->code = "BOB-".;
        $order->date = strtotime('now');
        $order->delivery_date = $date->addDays($delivry_methods_delivery_date);


        if($order->save()){
            $order->code = "Pro-".$order->id;
            $order->save();
            $subtotalsf=0;
            $subtotal = 0;
            $tax = 0;
            $shipping = 0;
            $delivry_methods_delivery_charge = 0;
            $product_commision_rate = 0;
            $product_shipping_cost = 0;
            $delivry_methods_title = '';
           // $delivry_methods_array = array();

            //calculate shipping is to get shipping costs of different types
            $admin_products = array();
            $seller_products = array();
            $price_tax = 0;

            //Order Details Storing

            $fainal_delivry_methods_array = 0;
            $fainal_delivry_methods_grand_total = 0;

            foreach(Session::get('cart') as $key => $cartItem){

                $subtotalsf=$subtotalsf+$cartItem['price'];

                $product = Product::find($cartItem['id']);

                if($product->added_by == 'admin'){
                    array_push($admin_products, $cartItem['id']);
                }
                else{
                    $product_ids = array();
                    if(array_key_exists($product->user_id, $seller_products)){
                        $product_ids = $seller_products[$product->user_id];
                    }
                    array_push($product_ids, $cartItem['id']);
                    $seller_products[$product->user_id] = $product_ids;
                }

                if (Session::has('delivery_info')){


                    $delivry_method_id_session = session()->get('delivery_info');



                /*    $delivry_methods = \App\DelivryMethod::where('parent_id', $delivry_method_id_session)->where('type',$product->seller_shipping_id)->first();

                    $delivry_methods_title = $delivry_methods->title;
                    $delivry_methods_delivery_charge += $delivry_methods->delivery_charge*$cartItem['quantity'];*/

                    $delivry_methods = \App\DelivryMethod::where('parent_id',
                    $delivry_method_id_session)->get();
                    $delivry_methods_item_kg = array();
                    $delivry_methods_item_cft = array();
                    $delivry_methods_array = array();
                    $total_delivery_charge = 0;
                    foreach ($delivry_methods as $delivry_methods_item){

                        if($delivry_methods_item->type == 1){
                            $delivry_methods_item_kg['delivery_charge_compare'] = $product->total_kg*$delivry_methods_item->delivery_charge;
                            $delivry_methods_item_kg['delivery_charge'] = $delivry_methods_item->delivery_charge;
                            $delivry_methods_item_kg['title'] = $delivry_methods_item->title;
                            $delivry_methods_item_kg['total_kg_or_total_cft'] = $product->total_kg;
                        }
                        if($delivry_methods_item->type == 2){
                            $delivry_methods_item_cft['delivery_charge_compare'] = $product->total_cft*$delivry_methods_item->delivery_charge;
                            $delivry_methods_item_cft['delivery_charge'] = $delivry_methods_item->delivery_charge;
                            $delivry_methods_item_cft['title'] =  $delivry_methods_item->title;
                            $delivry_methods_item_cft['total_kg_or_total_cft'] = $product->total_cft;
                        }



                    }
                    if($delivry_methods_item_kg['delivery_charge_compare'] < $delivry_methods_item_cft['delivery_charge_compare']){
                        $delivry_methods_array = $delivry_methods_item_cft;
                    }else{
                        $delivry_methods_array = $delivry_methods_item_kg;
                    }


                }
               // dd($delivry_methods_array);

                if ($product->tax_type == 'percent') {
                    $price_discount = ($product->unit_price * $product->discount) / 100;
                    $price_tax= (($product->unit_price - $price_discount) * $product->tax) / 100;
                } elseif ($product->tax_type == 'amount') {
                    $price_tax = $product->tax;
                }


                if($product->category->commision_rate){
                    if($product->added_by == 'admin'){
                        $product_commision_rate = 0;
                    }else{
                        if($product->discount_type == 'percent'){
                            $price_discount = ($product->unit_price*$product->discount)/100;
                            $unit_price_discount = (($product->unit_price + $price_tax) - $price_discount);
                            $product_commision_rate = ( $unit_price_discount*$product->category->commision_rate)/100 ;
                        }else{
                            $product_commision_rate = ((($product->unit_price +$price_tax) - $product->discount) *$product->category->commision_rate)/100 ;
                        }


                    }

                }

                if($product->shipping_cost){

                    $product_shipping_cost = $product->shipping_cost;
                }

                $subtotal += $cartItem['price']*$cartItem['quantity'] +$product_commision_rate*$cartItem['quantity']+$product_shipping_cost*$cartItem['quantity'];

                $tax += $cartItem['tax']*$cartItem['quantity'];

                $product_variation = $cartItem['variant'];

                if($product_variation != null){
                    $product_stock = $product->stocks->where('variant', $product_variation)->first();
                    if($product->digital != 1 &&  $cartItem['quantity'] > $product_stock->qty){
                        flash(translate('The requested quantity is not available for ').$product->getTranslation('name'))->warning();
                        $order->delete();
                        return redirect()->route('cart')->send();
                    }
                    else {
                        $product_stock->qty -= $cartItem['quantity'];
                        $product_stock->save();
                    }
                }
                else {
                    if ($product->digital != 1 && $cartItem['quantity'] > $product->current_stock) {
                        flash(translate('The requested quantity is not available for ').$product->getTranslation('name'))->warning();
                        $order->delete();
                        return redirect()->route('cart')->send();
                    }
                    else {
                        $product->current_stock -= $cartItem['quantity'];
                        $product->save();
                    }
                }

                $min_delivery_charge = \App\MinDeliveryCharge::where('id',1)->first();
                if(($delivry_methods_array['delivery_charge'] * $delivry_methods_array['total_kg_or_total_cft']) >0 && ($delivry_methods_array['delivery_charge'] * $delivry_methods_array['total_kg_or_total_cft']) < $min_delivery_charge->minimum_charge ){


                    //Edit by saif
                    // $total_delivery_charge = $min_delivery_charge->minimum_charge;
                    if(Session::get('cart')->count() < 2){

                        $shipping_charge=Session::get('shipping_info');
                        if( $shipping_charge &&  $shipping_charge['city'] !="Dhaka" ){
                            $total_delivery_charge +=  $min_delivery_charge->outside_minimum_charge;
                        }else{

                            $total_delivery_charge +=  $min_delivery_charge->minimum_charge;
                        }

                    }
                    else{

                        $total_delivery_charge +=  ($delivry_methods_array['delivery_charge'] * $delivry_methods_array['total_kg_or_total_cft']);
                    }


                    //Edit by saif

                    // $fainal_delivry_methods_array = $min_delivery_charge->minimum_charge;
                    // $fainal_delivry_methods_grand_total += $min_delivery_charge->minimum_charge;

                    $fainal_delivry_methods_array = $total_delivery_charge;
                    $fainal_delivry_methods_grand_total += $total_delivery_charge;

                    $delivry_methods_array['title'] = $min_delivery_charge->min_title;
                }else{

                    $fainal_delivry_methods_array = ($delivry_methods_array['delivery_charge'] * $delivry_methods_array['total_kg_or_total_cft']);
                    $fainal_delivry_methods_grand_total += ($delivry_methods_array['delivery_charge'] * $delivry_methods_array['total_kg_or_total_cft']);
                }

                /*if($fainal_delivry_methods_array > 0 && $fainal_delivry_methods_array < $min_delivery_charge->minimum_charge){
                    $total_delivery_charge = $min_delivery_charge->minimum_charge;
                    $fainal_delivry_methods_array = $min_delivery_charge->minimum_charge;
                    $delivry_methods_array['title'] = $min_delivery_charge->min_title;
                }*/


              // $fainal_delivry_methods_array += ($delivry_methods_array['delivery_charge'] * $delivry_methods_array['total_kg_or_total_cft']);

                $order_detail = new OrderDetail;
                $order_detail->order_id  =$order->id;
                $order_detail->seller_id = $product->user_id;
                $order_detail->product_id = $product->id;
                $order_detail->variation = $product_variation;
                $order_detail->warranty = $product->warranty_days;
                $order_detail->unit_price = $product->unit_price * $cartItem['quantity'];
                $order_detail->purchase_price = $product->purchase_price * $cartItem['quantity'];
                //coupon

                if(Session::has('coupon_discount')){
                    $coupon_id=Session::get('coupon_id');
                    $couponAmount= Session::get('coupon_discount');
                    $coupontype=Coupon::where('id',$coupon_id)->first();
                    //product Base
                    if($coupontype->type == "product_base"){
                        $dkjd=json_decode($coupontype->details);
                        $productcouponid=$dkjd[0]->product_id;

                        if($product->id== $productcouponid)
                        {
                        $productprice=$cartItem['price'] * $cartItem['quantity'];

                        // $productRate=$product_commision_rate+$cartItem['price'] * $cartItem['quantity'];
                        //$couponProductRate=(10*$productRate)/100;

                        $Priceresult=($product_commision_rate*$couponAmount)/$productRate;
                        $couponCommissionresult=($product_commision_rate*$couponAmount)/$productRate;

                            $order_detail->price = $productprice-$Priceresult;
                            $order_detail->commision = $product_commision_rate*$cartItem['quantity']-$couponCommissionresult;
                            $order_detail->coupon_amount=$couponCommissionresult;
                        }
                        else{
                            $order_detail->price = $cartItem['price'] * $cartItem['quantity'];
                            $order_detail->commision = $product_commision_rate*$cartItem['quantity'];
                            $order_detail->coupon_amount=0;
                        }
                    }
                    else{
                        $order_detail->price = $cartItem['price'] * $cartItem['quantity'];
                        $order_detail->commision = $product_commision_rate*$cartItem['quantity'];

                    }





                }else
                {
                    $order_detail->price = $cartItem['price'] * $cartItem['quantity'];
                    $order_detail->commision = $product_commision_rate*$cartItem['quantity'];
                }

                //coupon



                $order_detail->tax = $cartItem['tax'] * $cartItem['quantity'];
                $order_detail->delivry_methods_title = $delivry_methods_array['title'];
               // $order_detail->delivry_methods_charge = ($delivry_methods_array['delivery_charge'] * $delivry_methods_array['total_kg_or_total_cft']);
                $order_detail->delivry_methods_charge = $fainal_delivry_methods_array;



                $order_detail->shipping_type = $cartItem['shipping_type'];
                $order_detail->product_referral_code = $cartItem['product_referral_code'];
                if($product->id && $product->parts_warranty){

                    $product_parts_warranties = DB::table('product_parts_warranties')->where('product_id', $product->id)->get();
                    $order_detail->parts_warranty =  json_encode($product_parts_warranties, JSON_PRETTY_PRINT);

                }



                //Dividing Shipping Costs
                if ($cartItem['shipping_type'] == 'home_delivery') {
                    $order_detail->shipping_cost = getShippingCost($key);
                }
                else {
                    $order_detail->shipping_cost = 0;
                }

                $shipping += 0;
               // $shipping += $order_detail->shipping_cost;

                if ($cartItem['shipping_type'] == 'pickup_point') {
                    $order_detail->pickup_point_id = $cartItem['pickup_point'];
                }
                //End of storing shipping cost

                $order_detail->quantity = $cartItem['quantity'];
                $order_detail->save();

                $product->num_of_sale++;
                $product->save();
            }

            //  dd($subtotalsf);









//dd($fainal_delivry_methods_grand_total);
            //dd($subtotal);
            $order->grand_total = $subtotal + $tax  + $fainal_delivry_methods_grand_total;

            if(Session::has('coupon_discount')){
                $order->grand_total -= Session::get('coupon_discount');
                $order->coupon_discount = Session::get('coupon_discount');

                $coupon_usage = new CouponUsage;
                $coupon_usage->user_id = Auth::user()->id;
                $coupon_usage->coupon_id = Session::get('coupon_id');
                $coupon_usage->save();
            }

            $order->save();


            $order_confirmation_mail = BusinessSetting::where('type', 'order_confirmation_mail')->first()->value;

            $array['view'] = 'emails.invoice';
            $array['subject'] = translate('Your Order Placement on BelaObela is completed successfully');
            $array['from'] = env('MAIL_USERNAME');
            $array['order'] = $order;
            $array['order_confirmation_mail'] = $order_confirmation_mail;

            if(1==1){

                $path = public_path().'/assets/pdf/'. 'order-'.$order->code.'.pdf';

                $path_folder = public_path().'/assets/pdf';

                if(!File::isDirectory($path_folder)){
                File::makeDirectory($path_folder, 0777, true, true);
                }

                $pdf = PDF::setOptions([
                    'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
                    'logOutputFile' => storage_path('logs/log.htm'),
                    'tempDir' => storage_path('logs/')
                ])->loadView('backend.invoices.customer_invoice', compact('order'));
                 $pdf->save($path);

                $array['path'] = $path;
            }



            if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated && \App\OtpConfiguration::where('type', 'otp_for_order')->first()->value){
                try {
                    $otpController = new OTPVerificationController;
                    $otpController->send_order_code($order);
                } catch (\Exception $e) {

                }
            }

            //sends email to customer with the invoice pdf attached
            if(env('MAIL_USERNAME') != null){
                try {
                    Mail::to($request->session()->get('shipping_info')['email'])->queue(new InvoiceEmailManager($array));
                    Mail::to(User::where('user_type', 'admin')->first()->email)->queue(new InvoiceEmailManager($array));
                } catch (\Exception $e) {

                }
            }

            unlink($path);
            Session::forget('cart');
            $request->session()->put('order_id', $order->id);
        }
    }
    else
    {
        return redirect('/');
    }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        if ($order != null) {
            foreach ($order->orderDetails as $key => $orderDetail) {
                try {
                    if ($orderDetail->variantion != null) {
                        $product_stock = ProductStock::where('product_id', $orderDetail->product_id)->where('variant', $orderDetail->variantion)->first();
                        if ($product_stock != null) {
                            $product_stock->qty += $orderDetail->quantity;
                            $product_stock->save();
                        }
                    } else {
                        $product = $orderDetail->product;
                        $product->current_stock += $orderDetail->quantity;
                        $product->save();
                    }
                } catch (\Exception $e) {
                }

                $orderDetail->delete();
            }
            $order->delete();
            flash(translate('Order has been deleted successfully'))->success();
        } else {
            flash(translate('Something went wrong'))->error();
        }
        return back();
    }

    public function order_details(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->save();
        return view('frontend.user.seller.order_details_seller', compact('order'));
    }

    public function update_delivery_status(Request $request)
    {
        // if($request->has('order_id')){
        //     // $orderDetail = Order::findOrFail($request->order_detail_id);
        //     // $orderDetail->payment_status = $request->status;
        //     // $orderDetail->save();
        //     //activity log
        //     $orderbeforeStatus=Order::where('id',$id)->first();
        //      $a_log= New Activitylog;
        //      $a_log->user_id=Auth::id();
        //      $a_log->loggable_id=$orderId;
        //      $a_log->orderdetails_id=0;
        //      $a_log->loggable_type=Order::class;
        //      $a_log->description="Updated $request->status from $orderbeforeStatus->payment_status";
        //      $a_log->save();
        //     return 1;

        // }

        // $order = Order::findOrFail($request->order_id);
        // $order->delivery_viewed = '0';
        // $order->save();
        // if(Auth::user()->user_type == 'seller'){
        //     foreach($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail){
        //         $orderDetail->delivery_status = $request->status;
        //         $orderDetail->save();
        //     }
        // }
        // else{
        //     foreach($order->orderDetails as $key => $orderDetail){
        //         $orderDetail->delivery_status = $request->status;
        //         $orderDetail->save();
        //     }
        // }

        // if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated && \App\OtpConfiguration::where('type', 'otp_for_delivery_status')->first()->value){
        //     try {
        //         $otpController = new OTPVerificationController;
        //         $otpController->send_delivery_status($order);
        //     } catch (\Exception $e) {
        //     }
        // }

        // return 1;

    }

    public function update_payment_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->payment_status_viewed = '0';
        $order->save();
        //activity log
        $orderbeforeStatus = Order::where('id', $request->order_id)->first();
        $a_log = new Activitylog;
        $a_log->user_id = Auth::id();
        $a_log->loggable_id = $request->order_id;
        $a_log->orderdetails_id = $order->orderDetails->first()->id;
        $a_log->loggable_type = Order::class;
        $a_log->description = "Updated $request->status from $orderbeforeStatus->payment_status";
        $a_log->save();


        //

        if (Auth::user()->user_type == 'seller') {
            foreach ($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail) {
                $orderDetail->payment_status = $request->status;
                $orderDetail->save();
            }
        } else {
            foreach ($order->orderDetails as $key => $orderDetail) {
                $orderDetail->payment_status = $request->status;
                $orderDetail->save();
            }
        }

        $status = 'paid';
        foreach ($order->orderDetails as $key => $orderDetail) {
            if ($orderDetail->payment_status != 'paid') {
                $status = 'unpaid';
            }
        }

        $order_payment_status = $order->payment_status = $status;

        if ($order_payment_status == 'paid') {

            if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated && \App\OtpConfiguration::where('type', 'otp_for_paid_status')->first()->value) {
                try {
                    $otpController = new OTPVerificationController;
                    $otpController->send_payment_status($order);
                } catch (\Exception $e) {
                }
            }

            //email....

            $payment_received_mail = BusinessSetting::where('type', 'payment_received_mail')->first()->value;

            $array['view'] = 'emails.payment';
            $array['subject'] = translate('Your Payment is received by BelaObela successfully');
            $array['from'] = env('MAIL_USERNAME');
            $array['order'] = $order;
            $array['payment_received_mail'] = $payment_received_mail;

            try {
                Mail::to($order->user->email)->queue(new PaymentReceivedMailManager($array));
            } catch (\Exception $e) {
            }
        } else {
        }

        $order->save();


        if ($order->payment_status == 'paid' && $order->commission_calculated == 0) {
            if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() == null || !\App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated) {
                if ($order->payment_type == 'cash_on_delivery') {
                    if (BusinessSetting::where('type', 'category_wise_commission')->first()->value != 1) {
                        $commission_percentage = BusinessSetting::where('type', 'vendor_commission')->first()->value;
                        foreach ($order->orderDetails as $key => $orderDetail) {
                            $orderDetail->payment_status = 'paid';
                            $orderDetail->save();
                            // if ($orderDetail->product->user->user_type == 'seller') {
                            //     $seller = $orderDetail->product->user->seller;
                            //     $seller->admin_to_pay = $seller->admin_to_pay - ($orderDetail->price * $commission_percentage) / 100;
                            //     $seller->save();
                            // }
                        }
                    } else {
                        foreach ($order->orderDetails as $key => $orderDetail) {
                            $orderDetail->payment_status = 'paid';
                            $orderDetail->save();
                            // if ($orderDetail->product->user->user_type == 'seller') {
                            //     $commission_percentage = $orderDetail->product->category->commision_rate;
                            //     $seller = $orderDetail->product->user->seller;
                            //     $seller->admin_to_pay = $seller->admin_to_pay - ($orderDetail->price * $commission_percentage) / 100;
                            //     $seller->save();
                            // }
                        }
                    }
                } elseif ($order->manual_payment) {
                    if (BusinessSetting::where('type', 'category_wise_commission')->first()->value != 1) {
                        $commission_percentage = BusinessSetting::where('type', 'vendor_commission')->first()->value;
                        foreach ($order->orderDetails as $key => $orderDetail) {
                            $orderDetail->payment_status = 'paid';
                            $orderDetail->save();
                            // if ($orderDetail->product->user->user_type == 'seller') {
                            //     $seller = $orderDetail->product->user->seller;
                            //     $seller->admin_to_pay = $seller->admin_to_pay + ($orderDetail->price * (100 - $commission_percentage)) / 100 + $orderDetail->tax + $orderDetail->shipping_cost;
                            //     $seller->save();
                            // }
                        }
                    } else {
                        foreach ($order->orderDetails as $key => $orderDetail) {
                            $orderDetail->payment_status = 'paid';
                            $orderDetail->save();
                            // if ($orderDetail->product->user->user_type == 'seller') {
                            //     $commission_percentage = $orderDetail->product->category->commision_rate;
                            //     $seller = $orderDetail->product->user->seller;
                            //     $seller->admin_to_pay = $seller->admin_to_pay + ($orderDetail->price * (100 - $commission_percentage)) / 100 + $orderDetail->tax + $orderDetail->shipping_cost;
                            //     $seller->save();
                            // }
                        }
                    }
                }
            }

            if (\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated) {
                $affiliateController = new AffiliateController;
                $affiliateController->processAffiliatePoints($order);
            }

            if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated) {
                if ($order->user != null) {
                    $clubpointController = new ClubPointController;
                    $clubpointController->processClubPoints($order);
                }
            }

            $order->commission_calculated = 1;
            $order->save();
        }


        return 1;
    }
    public function salesorder($orderId)
    {
        $order = Order::findOrFail($orderId);
        $orderDetails = OrderDetail::Where('order_id', $orderId)->where('delivery_status', 'delivered')->get();
        return view('backend.sales.salesDelivery', compact('order', 'orderDetails'));
    }
}
