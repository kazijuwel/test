<?php

namespace App\Http\Controllers;

use App\DeliveryMan;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Facades\Agent;

class DeliveryManController extends Controller
{

    protected $device;
    public function __construct()
    {
        if (!Agent::isDesktop()) {
            $this->device = 'frontend.mobile.pages.deliveryman';
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
        $deliveryMen=DeliveryMan::paginate(15);
        return view('backend.deliveryman.index',compact('deliveryMen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::get();
       return view('backend.deliveryman.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dv= new DeliveryMan;
        $dv->name=$request->name;
        $dv->user_id=$request->user_id;
        $dv->mobile_1=$request->mobile_1;
        $dv->mobile_2=$request->mobile_2;
        $dv->email_1=$request->email_1;
        $dv->email_2=$request->email_2;
        $dv->area=$request->area;
        $dv->addedby_id=Auth::id();
        $dv->active=1;

        if($request->is_delivery_company){
            $dv->is_company =true;
        }

        $dv->save();
        flash('Delivery Man Created Successfuly')->success();
        return redirect()->route('deliveryMan.index');
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
        $deliveryMan=DeliveryMan::find($id);
        $users=User::get();
        return view('backend.deliveryman.edit',compact('users','deliveryMan'));
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
        $dv= DeliveryMan::find($id);
        $dv->name=$request->name;
        $dv->user_id=$request->user_id;
        $dv->mobile_1=$request->mobile_1;
        $dv->mobile_2=$request->mobile_2;
        $dv->email_1=$request->email_1;
        $dv->email_2=$request->email_2;
        $dv->area=$request->area;
        $dv->addedby_id=Auth::id();
        $dv->active=$request->status;

        if($request->is_delivery_company){
            $dv->is_company =true;
        }else{
            $dv->is_company =false;
        }
        $dv->save();
        flash('Delivery Man Created Successfuly')->success();
        return redirect()->route('deliveryMan.index');
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

    public function dashboard(){
        if(Agent::isMobile()){
            return view( $this->device.'/index');
        }else{
            return view('frontend.deliveryman.index');
        }
    }
    public function assign_delivery_man(Request $request)
    {
        if($request->ajax()){
            $order=Order::where('id',$request->orderId)->first();

            if($order){
                $order->deliveryman_id = $request->delManId;
                $order->save();
                $deliveryMan= DeliveryMan::where('user_id',$request->delManId)->first();

                return Response()->json([
                    'success'=>true,
                    'deliveryManName' => $deliveryMan->name,
                    ]);


            }

        }
    }

    public function pending_orders(){
        $orders=Order::wherehas('orderDetails',function($query){
            $query->where('delivery_status','pending');
        })->where('deliveryman_id',Auth::id())->orderby('id','desc')->paginate(5);
        if(Agent::isMobile()){
            return view($this->device.'/pending_orders',compact('orders'));
        }else{
            return view('frontend.deliveryman.pending_orders',compact('orders'));
        }
    }
    public function delivery_orders(){
        $orders=Order::wherehas('orderDetails',function($query){
            $query->where('delivery_status','delivered');
        })->where('deliveryman_id',Auth::id())->orderby('id','desc')->paginate(5);

        if(Agent::isMobile()){
            return view($this->device.'/delivery_orders',compact('orders'));
        }else{
            return view('frontend.deliveryman.delivery_orders',compact('orders'));
        }

    }
    public function ondelivery_orders(){
        $orders=Order::wherehas('orderDetails',function($query){
            $query->where('delivery_status','on_delivery');
        })->where('deliveryman_id',Auth::id())->orderby('id','desc')->paginate(5);

        if(Agent::isMobile()){
            return view($this->device.'/ondelivery_orders',compact('orders'));
        }else{
            return view('frontend.deliveryman.ondelivery_orders',compact('orders'));
        }
    }
    public function confirmed_orders(){
        $orders=Order::wherehas('orderDetails',function($query){
            $query->where('delivery_status','confirmed');
        })->where('deliveryman_id',Auth::id())->orderby('id','desc')->paginate(5);

        if(Agent::isMobile()){
            return view($this->device.'/confirmed_orders',compact('orders'));
        }else{
            return view('frontend.deliveryman.confirmed_orders',compact('orders'));
        }

    }
    public function cancel_orders(){
        $orders=Order::wherehas('orderDetails',function($query){
            $query->where('delivery_status','cancel');
        })->where('deliveryman_id',Auth::id())->orderby('id','desc')->paginate(5);

        if(Agent::isMobile()){
            return view($this->device.'/cancel_orders',compact('orders'));
        }else{
            return view('frontend.deliveryman.cancel_orders',compact('orders'));
        }
    }
    public function daily_order_summery(Request $request)
    {
        $companys=DeliveryMan::where('is_company',1)->get();
        // if(!$request->start_date || !$request->end_date){
        //     $today = Carbon::now()->format('Y-m-d');
        //     $orderItems=OrderDetail::whereDate('created_at',$today)->get();


        //  }else{
            $startDate = $request->start_date;
            $endDate=$request->end_date;
            $productIds=OrderDetail::whereBetween('created_at',[$startDate, $endDate])->groupBy('product_id')->pluck('product_id');
            $products=Product::whereIn('id',$productIds)->paginate(100);



        //  }

        return view('backend.deliveryman.daily_order_summery',compact('companys','products','startDate','endDate'));
    }
}
