<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use App\User;
use Auth;
use Nexmo;
use App\OtpConfiguration;
use App\BusinessSetting;
use Twilio\Rest\Client;
use Hash;
use Agent;

class OTPVerificationController extends Controller
{
    protected $device;
    public function __construct()
    {
        if (!Agent::isDesktop()) {
            $this->device = 'frontend.mobile.pages';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verification(Request $request){
     if(Agent::isMobile()){
        if (Auth::check() && Auth::user()->email_verified_at == null) {
            return view($this->device.'.user_verification');
        }
        else {
            flash('You have already verified your number')->warning();
            return redirect()->route('home');
        }

     }else{
        if (Auth::check() && Auth::user()->email_verified_at == null) {
            return view('otp_systems.frontend.user_verification');
        }
        else {
            flash('You have already verified your number')->warning();
            return redirect()->route('home');
        }
    }
}


    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function verify_phone(Request $request){
        $user = Auth::user();
        if ($user->verification_code == $request->verification_code) {
            $user->email_verified_at = date('Y-m-d h:m:s');

            if($user->save()){

            //user registration sms.....

            if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated){
            try {
                $otpController = new OTPVerificationController;
                $otpController->user_registration_sms($user);
            } catch (\Exception $e) {
            }
        }
    }

            flash('Your phone number has been verified successfully')->success();
            return redirect()->route('home');
        }
        else{
            flash('Invalid Code')->error();
            return back();
        }
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//no change
    public function resend_verificcation_code(Request $request){
        $user = Auth::user();
        $user->verification_code = rand(100000,999999);
        $user->save();

        sendSMS($user->phone, env("APP_NAME"), $user->verification_code.' is your verification code for '.env('APP_NAME'));

        return back();
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function reset_password_with_code(Request $request){
        if (($user = User::where('phone', $request->phone)->where('verification_code', $request->code)->first()) != null) {
            if($request->password == $request->password_confirmation){
                $user->password = Hash::make($request->password);
                $user->email_verified_at = date('Y-m-d h:m:s');
                $user->save();
                event(new PasswordReset($user));
                auth()->login($user, true);

                if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')
                {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('home');
            }
            else {
                flash("Password and confirm password didn't match")->warning();
                return back();
            }
        }
        else {
            flash("Verification code mismatch")->error();
            return back();
        }
    }

    /**
     * @param  User $user
     * @return void
     */


    public function contact_us_sms($user_phone){
        $contact_us_sms = BusinessSetting::where('type', 'contact_us_sms')->first()->value;
        if($user_phone != null){
            sendSMS($user_phone, env('APP_NAME'), $contact_us_sms);
        }
    }

    public function user_registration_sms($user){
        $buyer_registration_sms = BusinessSetting::where('type', 'buyer_registration_sms')->first()->value;
        if($user->phone != null){
            sendSMS($user->phone, env('APP_NAME'), $buyer_registration_sms);
        }
    }

    public function seller_approval_sms($seller){
        $seller_registration_approval = BusinessSetting::where('type', 'seller_registration_sms')->first()->value;
        if($seller->user->phone != null){
            sendSMS($seller->user->phone, env('APP_NAME'), $seller_registration_approval);
        }
    }

    public function send_code($user){
       
        sendSMS($user->phone, env('APP_NAME'), $user->verification_code.' is your verification code for '.env('APP_NAME'));
    }

    /**
     * @param  Order $order
     * @return void
     */
    public function send_order_code($order){

        foreach($order->orderDetails as $key => $orderDetail){

        if($orderDetail->product != null){

        $products_name = $orderDetail->product->getTranslation('name');

        if($orderDetail->variation != null)

        $products_name = $orderDetail->product->getTranslation('name').'('.$orderDetail->variation.')';
        }
    }
        $total_amount = single_price($order->grand_total);
        $order_confirmation = BusinessSetting::where('type', 'order_confirmation_sms')->first()->value;
        if($order->user->phone != null){
            sendSMS($order->user->phone, env('APP_NAME'), $order_confirmation);
        }
    }


    /**
     * @param  Order $order
     * @return void
     */
    public function send_delivery_status($order){
        if(json_decode($order->shipping_address)->phone != null){
            sendSMS(json_decode($order->shipping_address)->phone, env('APP_NAME'), 'Your delivery status has been updated to '.$order->orderDetails->first()->delivery_status.' for Order code : '.$order->code);
        }
    }

    /**
     * @param  Order $order
     * @return void
     */
    public function send_payment_status($order){
        $total_amount = single_price($order->grand_total);
        $payment_confirmation = BusinessSetting::where('type', 'payment_received_sms')->first()->value;
        if(json_decode($order->shipping_address)->phone != null){
            sendSMS(json_decode($order->shipping_address)->phone, env('APP_NAME'), $payment_confirmation);
        }
    }
}
