<?php

namespace App\Http\Controllers;

use App\Utility\PayfastUtility;
use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\InstamojoController;
use App\Http\Controllers\ClubPointController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\PublicSslCommerzPaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\PaytmController;
use App\Http\Controllers\OTPVerificationController;
use App\OtpConfiguration;
use App\Order;
use App\BusinessSetting;
use Mail;
use App\Mail\PaymentReceivedMailManager;
use App\Coupon;
use App\Product;
use App\CouponUsage;
use App\User;
use App\Address;
use App\City;
use Agent;
use App\AdvancePayment;
use Session;
use App\Utility\PayhereUtility;

class CheckoutController extends Controller
{


protected $device;
public function __construct()
    {
    if (!Agent::isDesktop()) {
                $this->device = 'frontend.mobile.pages';
            }
        }

    //check the selected payment gateway and redirect to that controller accordingly
    public function checkout(Request $request)
    {


        if ($request->payment_option != null) {


            $orderController = new OrderController;
            $orderController->store($request);



            $request->session()->put('payment_type', 'cart_payment');
            if ($request->session()->get('order_id') != null) {

                if ($request->payment_option == 'paypal') {
                    $paypal = new PaypalController;
                    return $paypal->getCheckout();
                } elseif ($request->payment_option == 'stripe') {
                    $stripe = new StripePaymentController;
                    return $stripe->stripe();
                } elseif ($request->payment_option == 'sslcommerz') {
                    $sslcommerz = new PublicSslCommerzPaymentController;
                    return $sslcommerz->index($request);
                } elseif ($request->payment_option == 'aamarpay') {

                    $sslcommerz = new AmarPayController;
                    return $sslcommerz->index($request);
                } elseif ($request->payment_option == 'instamojo') {
                    $instamojo = new InstamojoController;
                    return $instamojo->pay($request);
                } elseif ($request->payment_option == 'razorpay') {
                    $razorpay = new RazorpayController;
                    return $razorpay->payWithRazorpay($request);
                } elseif ($request->payment_option == 'paystack') {
                    $paystack = new PaystackController;
                    return $paystack->redirectToGateway($request);
                } elseif ($request->payment_option == 'voguepay') {
                    $voguePay = new VoguePayController;
                    return $voguePay->customer_showForm();
                } elseif ($request->payment_option == 'payhere') {
                    $order = Order::findOrFail($request->session()->get('order_id'));

                    $order_id = $order->id;
                    $amount = $order->grand_total;
                    $first_name = json_decode($order->shipping_address)->name;
                    $last_name = 'X';
                    $phone = json_decode($order->shipping_address)->phone;
                    $email = json_decode($order->shipping_address)->email;
                    $address = json_decode($order->shipping_address)->address;
                    $city = json_decode($order->shipping_address)->city;

                    return PayhereUtility::create_checkout_form($order_id, $amount, $first_name, $last_name, $phone, $email, $address, $city);
                } elseif ($request->payment_option == 'payfast') {
                    $order = Order::findOrFail($request->session()->get('order_id'));

                    $order_id = $order->id;
                    $amount = $order->grand_total;

                    return PayfastUtility::create_checkout_form($order_id, $amount);
                } else if ($request->payment_option == 'ngenius') {
                    $ngenius = new NgeniusController();
                    return $ngenius->pay();
                } else if ($request->payment_option == 'iyzico') {
                    $iyzico = new IyzicoController();
                    return $iyzico->pay();
                } else if ($request->payment_option == 'nagad') {

                    $nagad = new NagadController;
                    $nagad->getSession();
                } else if ($request->payment_option == 'bkash') {
                    $bkash = new BkashController;
                    return $bkash->pay();
                }
                 else if ($request->payment_option == 'flutterwave') {
                    $flutterwave = new FlutterwaveController();
                    return $flutterwave->pay();
                } else if ($request->payment_option == 'mpesa') {
                    $mpesa = new MpesaController();
                    return $mpesa->pay();
                } elseif ($request->payment_option == 'paytm') {
                    $paytm = new PaytmController;
                    return $paytm->index();
                } elseif ($request->payment_option == 'cash_on_delivery') {
                    $request->session()->put('cart', Session::get('cart'));
                    $request->session()->forget('owner_id');
                    $request->session()->forget('delivery_info');
                    $request->session()->forget('coupon_id');
                    $request->session()->forget('coupon_discount');

                    flash(translate("Your order has been placed successfully"))->success();
                    return redirect()->route('order_confirmed');
                } elseif ($request->payment_option == 'wallet') {
                    $user = Auth::user();
                    $order = Order::findOrFail($request->session()->get('order_id'));
                    if ($user->balance >= $order->grand_total) {
                        $user->balance -= $order->grand_total;
                        $user->save();
                        return $this->checkout_done($request->session()->get('order_id'), null);
                    }
                } else {

                    $order = Order::findOrFail($request->session()->get('order_id'));
                    $order->manual_payment = 1;
                    $order->save();

                    // $request->session()->put('cart', Session::get('cart')->where('owner_id', '!=', Session::get('owner_id')));
                    // $request->session()->forget('owner_id');
                    $request->session()->forget('delivery_info');
                    $request->session()->forget('coupon_id');
                    $request->session()->forget('coupon_discount');

                    flash(translate('Your order has been placed successfully. Please submit payment information from purchase history'))->success();
                    return redirect()->route('order_confirmed');
                }
            }
        } else {
            flash(translate('Select Payment Option.'))->warning();
            return back();
        }
    }

    //redirects to this method after a successfull checkout
    public function checkout_done($order_id, $payment)
    {
        $order = Order::findOrFail($order_id);
        $order->payment_status = Session::has('advancePayment')?'partial':'paid';
        $order->payment_details = $payment;

        if(Session::has('advancePayment')){
        $ad = new AdvancePayment;
        $ad->user_id= Auth::id();
        $ad->order_id= $order_id;
        $ad->payment= $payment;
        $ad->payment_type = Session::get('payment_type');
        $ad->save();
        }

        if($order->save()){

            //mail...payment

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


            //otp..payment

            if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated && \App\OtpConfiguration::where('type', 'otp_for_paid_status')->first()->value){
            try {
                $otpController = new OTPVerificationController;
                $otpController->send_payment_status($order);
            } catch (\Exception $e) {
            }
        }

    }



        if (\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated) {
            $affiliateController = new AffiliateController;
            $affiliateController->processAffiliatePoints($order);
        }

        if (\App\Addon::where('unique_identifier', 'club_point')->first() != null && \App\Addon::where('unique_identifier', 'club_point')->first()->activated) {
            $clubpointController = new ClubPointController;
            $clubpointController->processClubPoints($order);
        }
        if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() == null || !\App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated) {
            if (BusinessSetting::where('type', 'category_wise_commission')->first()->value != 1) {
                $commission_percentage = BusinessSetting::where('type', 'vendor_commission')->first()->value;
                foreach ($order->orderDetails as $key => $orderDetail) {
                    $orderDetail->payment_status = 'paid';
                    $orderDetail->save();
                    if ($orderDetail->product->user->user_type == 'seller') {
                        $seller = $orderDetail->product->user->seller;
                        $seller->admin_to_pay = $seller->admin_to_pay+$orderDetail->purchase_price;
                       // // $seller->admin_to_pay = $seller->admin_to_pay + ($orderDetail->price * (100 - $commission_percentage)) / 100 + $orderDetail->tax + $orderDetail->shipping_cost;
                        $seller->save();
                    }
                }
            } else {
                foreach ($order->orderDetails as $key => $orderDetail) {
                    $orderDetail->payment_status = 'paid';
                    $orderDetail->save();
                    if ($orderDetail->product->user->user_type == 'seller') {
                        $commission_percentage = $orderDetail->product->category->commision_rate;
                        $seller = $orderDetail->product->user->seller;
                        $seller->admin_to_pay = $seller->admin_to_pay+$orderDetail->purchase_price;
                      //  $seller->admin_to_pay = $seller->admin_to_pay + ($orderDetail->price * (100 - $commission_percentage)) / 100 + $orderDetail->tax + $orderDetail->shipping_cost;
                        $seller->save();
                    }
                }
            }
        } else {
            foreach ($order->orderDetails as $key => $orderDetail) {
                $orderDetail->payment_status = 'paid';
                $orderDetail->save();
                if ($orderDetail->product->user->user_type == 'seller') {
                    $seller = $orderDetail->product->user->seller;
                    $seller->admin_to_pay = $seller->admin_to_pay+$orderDetail->purchase_price;
                    //$seller->admin_to_pay = $seller->admin_to_pay + $orderDetail->price + $orderDetail->tax + $orderDetail->shipping_cost;
                    $seller->save();
                }
            }
        }

        $order->commission_calculated = 1;
        $order->save();

        if (Session::has('cart')) {
            Session::put('cart', Session::get('cart')->where('owner_id', '!=', Session::get('owner_id')));
        }
        Session::forget('owner_id');
        Session::forget('payment_type');
        Session::forget('advancePayment');
        Session::forget('delivery_info');
        Session::forget('coupon_id');
        Session::forget('coupon_discount');
        Session::put('nagad_order_id',$order->id);

        flash(translate('Payment completed'))->success();
        // return redirect()->route('nagad_order_confirm',$order->id);

        return view('frontend.order_confirmed', compact('order'));
    }
    public function nagad_order_confirm($id)
    {
        $order=Order::where('id',$id)->first();
        flash(translate('Payment completed'))->success();
        return view('frontend.order_confirmed', compact('order'));

    }
    public function get_shipping_info(Request $request)
    {
        if(Auth::check()){
            if(Session::has('cart')){

                $categories = Category::all();

                if(Agent::isMobile())
                {
                    return view($this->device.'.delivery_info',compact('categories'));
                }else{
                    return view('frontend.delivery_info',compact('categories'));
                }

            }else{
                flash(translate('Your cart is empty'))->success();
                return back();
            }

        }
        return back();

        // $city=City::get();
        // if(Agent::isMobile())
        // {
        //     if(Auth::check()){
        //         if (Session::has('cart') && count(Session::get('cart')) > 0) {
        //             // $categories = Category::all();
        //             return view($this->device.'.delivery_info');
        //         }
        //         flash(translate('Your cart is empty'))->success();
        //         return back();
        //     }else{
        //         flash(translate('Plz Login'))->success();
        //         return back();
        //     }

        // }else{
        //     //is Desktop
        // if (Session::has('cart') && count(Session::get('cart')) > 0) {
        //      $categories = Category::all();
        //     // return view('frontend.shipping_info', compact('categories'));
        //     return view('frontend.delivery_info',compact('categories'));
        // }
        // flash(translate('Your cart is empty'))->success();
        // return back();
       //}
    }


    public function store_shipping_info(Request $request)
    {
        Session::put('delivry_method_id', $request->shipping);

        if (Auth::check()) {
            if ($request->address_id == null) {
                flash(translate("Please add shipping address"))->warning();
                return back();
            }
            $address = Address::findOrFail($request->address_id);

            $data['name'] = Auth::user()->name;
            $data['email'] = Auth::user()->email;
            $data['address'] = $address->address;
            $data['country'] = $address->country;
            $data['city'] = $address->city;
            $data['postal_code'] = $address->postal_code;
            $data['phone'] = $address->phone;
            $data['checkout_type'] = $request->checkout_type;
        } else {
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['address'] = $request->address;
            $data['country'] = $request->country;
            $data['city'] = $request->city;
            $data['postal_code'] = $request->postal_code;
            $data['phone'] = $request->phone;
            $data['checkout_type'] = $request->checkout_type;
        }
        $product_payment_delivry_methods = Session::get('delivry_method_id');
        $shipping_info = $data;
        $request->session()->put('shipping_info', $shipping_info);

        $subtotal = 0;
        $tax = 0;
        $shipping = 0;
        foreach (Session::get('cart') as $key => $cartItem) {
            $subtotal += $cartItem['price'] * $cartItem['quantity'];
            $tax += $cartItem['tax'] * $cartItem['quantity'];
            $shipping += $cartItem['shipping'] * $cartItem['quantity'];
        }

        $total = $subtotal + $tax + $shipping;

        if (Session::has('coupon_discount')) {
            $total -= Session::get('coupon_discount');
        }
        if(Agent::isMobile()){


            return view($this->device.'.payment_select', compact('total','product_payment_delivry_methods'));

        }else{
            return view('frontend.payment_select', compact('total','product_payment_delivry_methods'));
            //  return view('frontend.payment_select', compact('total'));
        }


        // return view('frontend.payment_select', compact('total'));
    }

    public function advancePayment(Request $request){

        $request->session()->put('advancePayment', $request->advancepayment);
        return back();
    }


    public function store_delivery_info(Request $request)
    {
        //dd($request->owner_id);

    Session::put('delivry_method_id', $request->shipping);
     //dd($request->all());
       /* print_r( Session::get('al_cart')); exit();
        echo '<pre>'; print_r($request->all()); exit();*/
        $categories = Category::all();

        $request->session()->put('owner_id', $request->owner_id);
        $product_payment_delivry_methods = $request->shipping;

        if (Session::has('cart') && count(Session::get('cart')) > 0) {
            $cart = $request->session()->get('cart', collect([]));

            $cart = $cart->map(function ($object, $key) use ($request) {

                if (\App\Product::find($object['id'])->user_id == $request->owner_id) {

                    $object['shipping_type'] = 'home_delivery';

                    if ($request['shipping_type_' . $request->owner_id] == 'pickup_point') {


                        $object['shipping_type'] = 'pickup_point';
                        $object['pickup_point'] = $request['pickup_point_id_' . $request->owner_id];
                    } else {

                        $object['shipping_type'] = 'home_delivery';
                    }
                }
               return $object;
            //    print_r($object);
            });
            // dd($cart);
           // $request->session()->put('cart', $cart);

            $cart = $cart->map(function ($object, $key) use ($request) {
                if (\App\Product::find($object['id'])->user_id == $request->owner_id) {
                    if ($object['shipping_type'] == 'home_delivery') {
                        $object['shipping'] = getShippingCost($key);
                    }
                    else {
                        $object['shipping'] = 0;
                    }
                } else {
                    $object['shipping'] = 0;
                }
                return $object;
            });


            $request->session()->put('cart', $cart);

            $subtotal = 0;
            $tax = 0;
            $shipping = 0;
            foreach (Session::get('cart') as $key => $cartItem) {
                $subtotal += $cartItem['price'] * $cartItem['quantity'];
                $tax += $cartItem['tax'] * $cartItem['quantity'];
                $shipping += $cartItem['shipping'] * $cartItem['quantity'];
            }
            // dd($subtotal);
            $total = $subtotal + $tax + $shipping;

            if (Session::has('coupon_discount')) {
                $total -= Session::get('coupon_discount');
            }

            // dd($product_payment_delivry_methods);
            if(Agent::isMobile()){
                return view($this->device.'.shipping_info', compact('categories'));
            }else{

              return view('frontend.shipping_info', compact('categories'));
                // return view('frontend.payment_select', compact('total','product_payment_delivry_methods'));
            }

        }
         else {
            flash(translate('Your Cart was empty'))->warning();
            return redirect()->route('home');
        }
    }

    public function get_payment_info(Request $request)
    {

        if(Agent::isMobile()){
            $subtotal = 0;
            $tax = 0;
            $shipping = 0;
            if(Session::has('cart')){
                foreach (Session::get('cart') as $key => $cartItem) {
                    $subtotal += $cartItem['price'] * $cartItem['quantity'];
                    $tax += $cartItem['tax'] * $cartItem['quantity'];
                    $shipping += $cartItem['shipping'] * $cartItem['quantity'];
                }

                $total = $subtotal + $tax + $shipping;

                if (Session::has('coupon_discount')) {
                    $total -= Session::get('coupon_discount');
                }
                return view($this->device.'.payment_select', compact('total'));
            }else
            {
                return redirect('/');
            }


            // return view($this->device.'.payment_select', compact('total','product_payment_delivry_methods'));

        }else{
            $subtotal = 0;
            $tax = 0;
            $shipping = 0;
            if(Session::has('cart')){
                foreach (Session::get('cart') as $key => $cartItem) {
                    $subtotal += $cartItem['price'] * $cartItem['quantity'];
                    $tax += $cartItem['tax'] * $cartItem['quantity'];
                    $shipping += $cartItem['shipping'] * $cartItem['quantity'];
                }

                $total = $subtotal + $tax + $shipping;

                if (Session::has('coupon_discount')) {
                    $total -= Session::get('coupon_discount');
                }
                return view('frontend.payment_select', compact('total'));
            }else
            {
                return redirect('/');
            }

        }
    }

    public function apply_coupon_code(Request $request)
    {
        //dd($request->all());
        $coupon = Coupon::where('code', $request->code)->first();

        if ($coupon != null) {
            if (strtotime(date('d-m-Y')) >= $coupon->start_date && strtotime(date('d-m-Y')) <= $coupon->end_date) {
                if (CouponUsage::where('user_id', Auth::user()->id)->where('coupon_id', $coupon->id)->first() == null) {
                    $coupon_details = json_decode($coupon->details);

                    if ($coupon->type == 'cart_base') {
                        $subtotal = 0;
                        $tax = 0;
                        $shipping = 0;
                        foreach (Session::get('cart') as $key => $cartItem) {
                            $subtotal += $cartItem['price'] * $cartItem['quantity'];
                            $tax += $cartItem['tax'] * $cartItem['quantity'];
                            $shipping += $cartItem['shipping'] * $cartItem['quantity'];
                        }
                        $sum = $subtotal + $tax + $shipping;

                        if ($sum >= $coupon_details->min_buy) {
                            if ($coupon->discount_type == 'percent') {
                                $coupon_discount = ($sum * $coupon->discount) / 100;
                                if ($coupon_discount > $coupon_details->max_discount) {
                                    $coupon_discount = $coupon_details->max_discount;
                                }
                            } elseif ($coupon->discount_type == 'amount') {
                                $coupon_discount = $coupon->discount;
                            }
                            $request->session()->put('coupon_id', $coupon->id);
                            $request->session()->put('coupon_discount', $coupon_discount);
                            flash(translate('Coupon has been applied'))->success();
                        }
                    } elseif ($coupon->type == 'product_base') {
                        $coupon_discount = 0;
                        foreach (Session::get('cart') as $key => $cartItem) {
                            foreach ($coupon_details as $key => $coupon_detail) {

                                if ($coupon_detail->product_id == $cartItem['id']) {
                                    if ($coupon->discount_type == 'percent') {
                                        $coupon_discount += $cartItem['price'] * $coupon->discount / 100;
                                    } elseif ($coupon->discount_type == 'amount') {
                                        $coupon_discount += $coupon->discount;
                                    }
                                }
                            }
                        }
                        if($coupon_discount == 0){
                            flash(translate('Invalid coupon!'))->warning();
                        }
                        $request->session()->put('coupon_id', $coupon->id);
                        $request->session()->put('coupon_discount', $coupon_discount);
                        if($coupon_discount != 0){
                            flash(translate('Coupon has been applied'))->success();
                        }

                    }
                    elseif ($coupon->type == 'category_base') {

                        $coupon_discount = 0;
                        foreach (Session::get('cart') as $key => $cartItem) {
                            $product = Product::find($cartItem['id']);
                            foreach ($coupon_details as $key => $coupon_detail) {

                                if ($coupon_detail->category_id == $product->category->id) {
                                    if ($coupon->discount_type == 'percent') {
                                        $coupon_discount += $cartItem['price'] * $coupon->discount / 100;
                                    } elseif ($coupon->discount_type == 'amount') {
                                        $coupon_discount += $coupon->discount;
                                    }
                                }
                            }
                        }
                        if($coupon_discount == 0){
                            flash(translate('Invalid coupon!'))->warning();
                        }
                        $request->session()->put('coupon_id', $coupon->id);
                        $request->session()->put('coupon_discount', $coupon_discount);
                        if($coupon_discount != 0){
                            flash(translate('Coupon has been applied'))->success();
                        }

                    }
                }
                 else {
                    flash(translate('You already used this coupon!'))->warning();
                }
            } else {
                flash(translate('Coupon expired!'))->warning();
            }
        } else {
            flash(translate('Invalid coupon!'))->warning();
        }
        return back();
    }

    public function remove_coupon_code(Request $request)
    {

        $request->session()->forget('coupon_id');
        $request->session()->forget('coupon_discount');
        return back();
    }

    public function order_confirmed()
    {
        if(Agent::isMobile())
        {
            $order = Order::findOrFail(Session::get('order_id'));
            return view($this->device.'.order_confirmed', compact('order'));
        }
        else{
            $order = Order::findOrFail(Session::get('order_id'));
            return view('frontend.order_confirmed', compact('order'));
        }

    }
}
