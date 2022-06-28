<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessSetting;
use App\RefundRequest;
use App\OrderDetail;
use App\Seller;
use App\Wallet;
use App\User;
use Auth;
use Agent;

class RefundRequestController extends Controller
{
    private $base_url;
    private $app_key;
    protected $device;
    public function __construct()
    {
        $bkash_app_key = env('BKASH_CHECKOUT_APP_KEY'); // bKash Merchant API APP KEY
        $bkash_base_url = 'https://checkout.sandbox.bka.sh/v1.2.0-beta'; // For Live Production URL: https://checkout.pay.bka.sh/v1.2.0-beta

        $this->app_key = $bkash_app_key;
        $this->base_url = $bkash_base_url;
        if (!Agent::isDesktop()) {
            $this->device = 'frontend.mobile.pages';
        }
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Store Customer Refund Request
    public function request_store(Request $request, $id)
    {
        $order_detail = OrderDetail::where('id', $id)->first();
        $refund = new RefundRequest;
        $refund->user_id = Auth::user()->id;
        $refund->order_id = $order_detail->order_id;
        $refund->order_detail_id = $order_detail->id;
        $refund->seller_id = $order_detail->seller_id;
        $refund->seller_approval = 0;
        $refund->reason = $request->reason;
        $refund->admin_approval = 0;
        $refund->admin_seen = 0;
        $refund->refund_amount = $order_detail->price + $order_detail->tax;
        $refund->refund_status = 0;
        if ($refund->save()) {
            flash( translate("Refund Request has been sent successfully") )->success();
            return redirect()->route('purchase_history.index');
        }
        else {
            flash( translate("Something went wrong") )->error();
            return back();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendor_index()
    {
        if(Agent::isMobile()){
            $refunds = RefundRequest::where('seller_id', Auth::user()->id)->latest()->paginate(10);
            if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff') {
                return view('refund_request.frontend.recieved_refund_request.index', compact('refunds'));
            }
            else {
                return view($this->device.'.seller.recieved_refund_request', compact('refunds'));
            }

        }else{
            $refunds = RefundRequest::where('seller_id', Auth::user()->id)->latest()->paginate(10);
            if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff') {
                return view('refund_request.frontend.recieved_refund_request.index', compact('refunds'));
            }
            else {
                return view('refund_request.frontend.recieved_refund_request.index', compact('refunds'));
            }

        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer_index()
    {
        if(Agent::isMobile()){
            $refunds = RefundRequest::where('user_id', Auth::user()->id)->latest()->paginate(10);
            return view($this->device. '.customer.refund_request', compact('refunds'));

        }
        else{


        $refunds = RefundRequest::where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('refund_request.frontend.refund_request.index', compact('refunds'));
    }
    }

    //Set the Refund configuration
    public function refund_config()
    {
        return view('refund_request.config');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function refund_time_update(Request $request)
    {
        $business_settings = BusinessSetting::where('type', $request->type)->first();
        if ($business_settings != null) {
            $business_settings->value = $request->value;
            $business_settings->save();
        }
        else {
            $business_settings = new BusinessSetting;
            $business_settings->type = $request->type;
            $business_settings->value = $request->value;
            $business_settings->save();
        }
        flash( translate("Refund Request sending time has been updated successfully") )->success();
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function refund_sticker_update(Request $request)
    {
        $business_settings = BusinessSetting::where('type', $request->type)->first();
        if ($business_settings != null) {
            $business_settings->value = $request->logo;
            $business_settings->save();
        }
        else {
            $business_settings = new BusinessSetting;
            $business_settings->type = $request->type;
            $business_settings->value = $request->logo;
            $business_settings->save();
        }
        flash( translate("Refund Sticker has been updated successfully"))->success();
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_index()
    {
        $refunds = RefundRequest::where('refund_status', 0)->latest()->paginate(15);
        return view('refund_request.index', compact('refunds'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paid_index()
    {
        $refunds = RefundRequest::where('refund_status', 1)->latest()->paginate(15);
        return view('refund_request.paid_refund', compact('refunds'));
    }

    public function rejected_index()
    {
        $refunds = RefundRequest::where('refund_status', 2)->latest()->paginate(15);
        return view('refund_request.rejected_refund', compact('refunds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function request_approval_vendor(Request $request)
    {
        $refund = RefundRequest::findOrFail($request->el);
        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff') {
            $refund->seller_approval = 1;
            $refund->admin_approval = 1;
        }
        else {
            $refund->seller_approval = 1;
        }

        if ($refund->save()) {
            return 1;
        }
        else {
            return 0;
        }
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function refund_pay(Request $request)
    {

        $refundID=$request->el;
        $refundBk=RefundRequest::where('id',$refundID)->first();
        $order=json_decode($refundBk->order->payment_details);

    if($refundBk->order->payment_type == "bkash" &&  $refundBk->order->payment_status == "paid"){
        (new BkashController())->getToken();
        $token = session()->get('bkash_token');

        $paymentID=$order->paymentID;
        $trxID=$order->trxID;
        $amount=$order->amount;
        $sku=rand(1111,9999);
        $reason="No Choice";

        $post_fields = [
            'paymentID' => $paymentID ,
            'amount' => $amount,
            'trxID' => $trxID,
            'sku' => $sku,
            'reason' => $reason,
        ];

        $refund_response = $this->refundCurl($token, $post_fields);



        $refund = RefundRequest::findOrFail($request->el);

        if ($refund->seller_approval == 1) {
            $seller = Seller::where('user_id', $refund->seller_id)->first();
            if ($seller != null) {
                $seller->admin_to_pay -= $refund->refund_amount;
            }
            $seller->save();
        }
        $wallet = new Wallet;
        $wallet->user_id = $refund->user_id;
        $wallet->amount = $refund->refund_amount;
        $wallet->payment_method = 'Refund';
        $wallet->payment_details = 'Product Money Refund';
        $wallet->save();
        $user = User::findOrFail($refund->user_id);
        $user->balance += $refund->refund_amount;
        $user->save();
        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff') {
            $refund->admin_approval = 1;
            $refund->refund_status = 1;
        }
        if ($refund->save()) {
            return $refund_response;
        }
        else {
            return 0;
        }


    }
    else{
        $refund = RefundRequest::findOrFail($request->el);
        if ($refund->seller_approval == 1) {
            $seller = Seller::where('user_id', $refund->seller_id)->first();
            if ($seller != null) {
                $seller->admin_to_pay -= $refund->refund_amount;
            }
            $seller->save();
        }
        $wallet = new Wallet;
        $wallet->user_id = $refund->user_id;
        $wallet->amount = $refund->refund_amount;
        $wallet->payment_method = 'Refund';
        $wallet->payment_details = 'Product Money Refund';
        $wallet->save();
        $user = User::findOrFail($refund->user_id);
        $user->balance += $refund->refund_amount;
        $user->save();
        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff') {
            $refund->admin_approval = 1;
            $refund->refund_status = 1;
        }
        if ($refund->save()) {
            return 1;
        }
        else {
            return 0;
        }
    }
    }

    public function reject_refund_request(Request $request){
      $refund = RefundRequest::findOrFail($request->refund_id);
      if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff') {
          $refund->admin_approval = 2;
          $refund->refund_status  = 2;
          $refund->reject_reason  = $request->reject_reason;
      }
      else{
          $refund->seller_approval = 2;
          $refund->reject_reason  = $request->reject_reason;
      }

      if ($refund->save()) {
          flash(translate('Refund request rejected successfully.'))->success();
          return back();
      }
      else {
          return back();
      }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function refund_request_send_page($id)
    {
        $order_detail = OrderDetail::findOrFail($id);
        if ($order_detail->product != null && $order_detail->product->refundable == 1) {
            return view('refund_request.frontend.refund_request.create', compact('order_detail'));
        }
        else {
            return back();
        }
    }

    /**
     * Show the form for view the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Shows the refund reason
    public function reason_view($id)
    {
        $refund = RefundRequest::findOrFail($id);
        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff') {
            if ($refund->orderDetail != null) {
                $refund->admin_seen = 1;
                $refund->save();
                return view('refund_request.reason', compact('refund'));
            }
        }
        else {
            return view('refund_request.frontend.refund_request.reason', compact('refund'));
        }
    }

    public function reject_reason_view($id)
    {
        $refund = RefundRequest::findOrFail($id);
        return $refund->reject_reason;
    }

    public function refund_report()
    {
        $refunds = RefundRequest::where('refund_status', 1)->latest()->paginate(15);
        return view('refund_request.refund_report', compact('refunds'));
    }
    //     public function refund_paytest(Request $request)
//     {

//         // (new BkashController())->getToken();

//         // $token = session()->get('bkash_token');
//          $token = "eyJraWQiOiJmalhJQmwxclFUXC9hM215MG9ScXpEdVZZWk5KXC9qRTNJOFBaeGZUY3hlamc9IiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiJiM2Q4OGVkZC0xNzc2LTRhMjEtYWZlMi0zN2FkZTk3NzEyZDMiLCJhdWQiOiI2NmEwdGZpYTZvc2tkYjRhMDRyY24wNjNhOSIsImV2ZW50X2lkIjoiZjNhZGNlMjYtODNmNi00ZDBhLWEwOTUtYjFjZGJiNjM2M2JmIiwidG9rZW5fdXNlIjoiaWQiLCJhdXRoX3RpbWUiOjE2NDcyNDQ5MDYsImlzcyI6Imh0dHBzOlwvXC9jb2duaXRvLWlkcC5hcC1zb3V0aGVhc3QtMS5hbWF6b25hd3MuY29tXC9hcC1zb3V0aGVhc3QtMV9rZjVCU05vUGUiLCJjb2duaXRvOnVzZXJuYW1lIjoic2FuZGJveFRlc3RVc2VyIiwiZXhwIjoxNjQ3MjQ4NTA2LCJpYXQiOjE2NDcyNDQ5MDZ9.WIXn_BXvPyuKmonTKl-VLOZjud0KQXCJsViYn64KuYGxnPt0NdTbKtEYIwEAXwgAJdPH4VLkONhA4yshmSFAG-w-aIWd5QyakeqA0Fm6ehLurJJHQ0-LRodLh0JinoCWinVTDb5AYNzJzy7vYZk3cPbUBLiefbyIGU7Mko_HWJVoyg-3KODgYVnUosTWez38jQEY_0QEgksCcnklxPLj5i5HDQaKDViwCL_64_6-Vs3_KG7E36jAiPG7Ls74s7QUb8-2Fbp4Qg-GXV6J6HvT-DrntmotUAmOtcp8oozXMYFKPGBVWQ2Lm-Klel3LyufVzeWr6XVXvLEqKMN08hYa5g";

//         // $this->validate($request, [
//         //     'payment_id' => 'required',
//         //     'amount' => 'required',
//         //     'trx_id' => 'required',
//         //     'sku' => 'required|max:255',
//         //     'reason' => 'required|max:255'
//         // ]);

//         // $post_fields = [
//         //     'paymentID' => $request->payment_id,
//         //     'amount' => $request->amount,
//         //     'trxID' => $request->trx_id,
//         //     'sku' => $request->sku,
//         //     'reason' => $request->reason,
//         // ];

//             $post_fields = [
//             'paymentID' => "LLW6W7I1647244908183",
//             'amount' => 53,
//             'trxID' => "9CE706KM59",
//             'sku' => "dde3ss98",
//             'reason' => "jfkjeieeewue",
//         ];

//         $refund_response = $this->refundCurl($token, $post_fields);

//         // $myfile = fopen("refund.txt", "w") or die("Unable to open file!");
//         // $txt = implode(' ',$refund_response);
//         // fwrite($myfile, $txt);
//         // fclose($myfile);
//         //end log file





//         if (array_key_exists('transactionStatus', $refund_response) && ($refund_response['transactionStatus'] === 'Completed')) {

//             // IF REFUND PAYMENT SUCCESS THEN YOU CAN APPLY YOUR CONDITION HERE

//             // THEN YOU CAN REDIRECT TO YOUR ROUTE
//             return $refund_response;

//             return back()->with('successMsg', 'bKash Fund has been Refunded Successfully');
//         }

//         return back()->with('error', $refund_response['message']);
//     }



    public function refundCurl($token, $post_fields)
    {
        $url = curl_init("$this->base_url/checkout/payment/refund");
        $header = array(
            'Content-Type:application/json',
            "authorization:$token",
            "x-app-key:$this->app_key"
        );

        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_POSTFIELDS, json_encode($post_fields));
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        $resultdata = curl_exec($url);
        curl_close($url);

        return json_decode($resultdata, true);
    }

}
