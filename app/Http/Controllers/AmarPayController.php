<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use Illuminate\Routing\UrlGenerator;
use App\Http\Controllers;
use App\Order;
use App\BusinessSetting;
use App\Seller;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\WalletController;
use App\CustomerPackage;
use App\SellerPackage;
use App\Http\Controllers\CustomerPackageController;

session_start();

class AmarPayController extends Controller
{

    public function index(Request $request)
    {


        if (Session::has('payment_type')) {
            $order = Order::findOrFail($request->session()->get('order_id'));
            if (BusinessSetting::where('type', 'aamarpay_sandbox')->first()->value == 1) {
                $url = 'https://sandbox.aamarpay.com/request.php'; // live url https://secure.aamarpay.com/request.php
            } else {
                $url = 'https://secure.aamarpay.com/request.php';
            }

            $tran_id = rand(1111111, 9999999);
            $fields = array(
                'store_id' => env('AamarPay_STORE_ID'), //store id will be aamarpay,  contact integration@aamarpay.com for test/live id

                'amount' => ceil($order->grand_total), //transaction amount
                'payment_type' => 'VISA', //no need to change
                'currency' => 'BDT',  //currenct will be USD/BDT
                'tran_id' => $tran_id, //transaction id must be unique from your end
                'cus_name' => $request->session()->get('shipping_info')['name'],  //customer name
                'cus_email' => ($request->session()->get('shipping_info')['email']) ? $request->session()->get('shipping_info')['email'] : 'almamun214@gmail.com', //customer email address
                # 'cus_email' => $request->session()->get('shipping_info')['email'], //customer email address
                'cus_add1' => $request->session()->get('shipping_info')['address'],  //customer address
                'cus_add2' => 'Mohakhali DOHS', //customer address
                'cus_city' => $request->session()->get('shipping_info')['city'],  //customer city
                'cus_state' => 'Dhaka',  //state
                'cus_postcode' => $request->session()->get('shipping_info')['postal_code'], //postcode or zipcode
                'cus_country' => $request->session()->get('shipping_info')['country'],  //country
                'cus_phone' => $request->session()->get('shipping_info')['phone'], //customer phone number
                'cus_fax' => 'Not¬Applicable',  //fax
                'ship_name' => 'ship name', //ship name
                'ship_add1' => 'House B-121, Road 21',  //ship address
                'ship_add2' => 'Mohakhali',
                'ship_city' => 'Dhaka',
                'ship_state' => 'Dhaka',
                'ship_postcode' => '1212',
                'ship_country' => 'Bangladesh',
                'desc' => 'payment description',
                'success_url' => route('success'), //your success route
                'fail_url' => route('fail'), //your fail route
                'cancel_url' => route('cancel'), //your cancel url
                'opt_a' => $tran_id,  //optional paramter
                'opt_b' => $request->session()->get('order_id'),
                'opt_c' => $request->session()->get('payment_type'),
                'opt_d' => '',
                'signature_key' => env('AamarPay_Signature_key')); //signature key will provided aamarpay, contact integration@aamarpay.com for test/live signature key

            $fields_string = http_build_query($fields);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_URL, $url);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));
            curl_close($ch);

            $this->redirect_to_merchant($url_forward);
        }


    }

    function redirect_to_merchant($url)
    {

        ?>
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <script type="text/javascript">
                function closethisasap() {
                    document.forms["redirectpost"].submit();
                }
            </script>
        </head>
        <body onLoad="closethisasap();">
        <?php if (BusinessSetting::where('type', 'aamarpay_sandbox')->first()->value == 1) { ?>
            <form name="redirectpost" method="post"
                  action="<?php echo 'https://sandbox.aamarpay.com/' . $url; ?>"></form>
        <?php } else { ?>
            <form name="redirectpost" method="post"
                  action="<?php echo 'https://secure.aamarpay.com/' . $url; ?>"></form>
            <!-- for live url https://secure.aamarpay.com -->
        <?php } ?>

        </body>
        </html>
        <?php
        exit;
    }


    public function success(Request $request)
    {
        $payment = json_encode($request->all());


        if (isset($request->opt_c)) {

            if ($request->opt_c == 'cart_payment') {
                $checkoutController = new CheckoutController;
                return $checkoutController->checkout_done($request->opt_b, $payment);
            }
        } else {
            echo 'aamarpay success function';
        }

    }

    public function fail(Request $request)
    {
        // return $request;

        $request->session()->forget('order_id');
        $request->session()->forget('payment_data');
        flash(translate('Payment Failed'))->success();
        return redirect()->route('home');
    }

    public function cancel(Request $request)
    {
        $request->session()->forget('order_id');
        $request->session()->forget('payment_data');
        flash(translate('Payment cancelled'))->success();
        return redirect()->route('home');
    }
}
