<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellerWithdrawRequest;
use Auth;
use App\Seller;
use App\Order;
use Excel;
use App\WithdrawRequestsExport;
use App\Payment;
use PDF;
use Agent;

class SellerWithdrawRequestController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(Agent::isMobile())
       {
        $seller_withdraw_requests = SellerWithdrawRequest::where('user_id', Auth::user()->seller->id)->paginate(9);
        return view($this->device.'.seller.seller_withdraw_requests', compact('seller_withdraw_requests'));

       }else{
        $seller_withdraw_requests = SellerWithdrawRequest::where('user_id', Auth::user()->seller->id)->paginate(9);
        return view('frontend.user.seller.seller_withdraw_requests.index', compact('seller_withdraw_requests'));
       }
    }

    public function request_index()
    {
        $seller_withdraw_requests = SellerWithdrawRequest::paginate(15);
        return view('backend.sellers.seller_withdraw_requests.index', compact('seller_withdraw_requests'));
    }

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
        $seller_withdraw_request = new SellerWithdrawRequest;
        $seller_withdraw_request->user_id = Auth::user()->seller->id;
        $seller_withdraw_request->amount = $request->amount;
        $seller_withdraw_request->message = $request->message;
        $seller_withdraw_request->status = '0';
        $seller_withdraw_request->viewed = '0';
        if ($seller_withdraw_request->save()) {
            flash(translate('Request has been sent successfully'))->success();
            return redirect()->route('withdraw_requests.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
        //
    }

    public function payment_modal(Request $request)
    {
        $seller = Seller::findOrFail($request->id);
        $seller_withdraw_request = SellerWithdrawRequest::where('id', $request->seller_withdraw_request_id)->first();
        return view('backend.sellers.seller_withdraw_requests.payment_modal', compact('seller', 'seller_withdraw_request'));
    }

    public function message_modal(Request $request)
    {
        $seller_withdraw_request = SellerWithdrawRequest::findOrFail($request->id);
        if (Auth::user()->user_type == 'seller') {
            return view('frontend.partials.withdraw_message_modal', compact('seller_withdraw_request'));
        }
        elseif (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'staff') {
            return view('backend.sellers.seller_withdraw_requests.withdraw_message_modal', compact('seller_withdraw_request'));
        }
    }

    public function withdraw_requests_export(Request $request){
     /* $test =  Payment::all();
      foreach ($test as $item){
          echo $item->user->name;
      }
      exit();*/
     // dd($test);
        $date = $request->date;
        $user_id = $request->user_id;



        return Excel::download(new WithdrawRequestsExport($date,$user_id), 'seller_pay.xlsx');
    }

    public function mis_report(Request $request)
    {
         $date = $request->date;
         $seller_id = $request->user_id;
         return view('backend.sellers.excel_report', compact('seller_id',  'date'));
    }
    public function sellers_due_report(Request $request){

        $date = $request->date;
        $seller_id = $request->user_id;

        if($date != null){
            $seller_due = Seller::whereDate('sellers.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->whereDate('sellers.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])))->get();
        }

       // return view('backend.invoices.seller_due_report');


        $pdf = PDF::setOptions([
            //'a4' => 'portrait',
            'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])->loadView('backend.invoices.seller_due_report',compact('seller_due'));
        return $pdf->download('seller-due-report.pdf');
    }
}
