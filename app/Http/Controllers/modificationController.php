<?php

namespace App\Http\Controllers;

use App\BobStore;
use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Order;
use App\Product;
use App\Seller;
use App\Payment;
use App\Models\OrderDetail;
use App\Models\Activitylog;
use App\Models\Purchase;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class modificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('onlyview');
    }
    public function orderCustomerDetails($id)
    {
        $user = User::find($id);
        return view('modification.customerShow', compact('user'));
    }
    public function salecustomerinvoice($id)
    {
        $userId = $id;
        $customerDetails = User::where('id', $userId)->first();
        $orderId = Order::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(30);
        return view('backend.account.salecustomerinvoice', compact('customerDetails', 'orderId'));
    }

    public function adminCustomerVeiw($id)
    {

        //    $userId=Customer::where('id',$id)->pluck('user_id');
        $userId = $id;
        $customerDetails = User::where('id', $userId)->first();
        $orderId = Order::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(30);
        //$order=Order::where('user_id',$userId)->paginate(30);
        return view('modification.adminCustomerDetails', compact('customerDetails', 'orderId'));
    }
    public function adminsellerview($id)
    {
        $seller = Seller::where('user_id', $id)->first();
        $userId = $seller->user_id;
        $orderId = Order::where('user_id', $userId)->paginate(30);

        $sellerProduct = Product::where('user_id', $userId)->count();
        $totalorder = Order::where('user_id', $userId)->count();

        $soldAmount = Order::where('user_id', $userId)->where('delivery_date', '<>', null)->where('payment_status', 'paid')->sum('grand_total');

        $paidByAdmin = Payment::where('seller_id', $seller->id)->sum('amount');


        return view('modification.adminsellerview', compact('seller', 'orderId', 'sellerProduct', 'totalorder', 'sellerProduct', 'soldAmount', 'paidByAdmin'));
    }





    public function adminsellerProduct($id)
    {
        $products = Product::where('user_id', $id)->paginate(30);
        return view('modification.adminsellerProduct', compact('products'));
    }




    public function adminorderstatuschange(Request $request)
    {
        $order = Order::where('id', $request->orderId)->first();
        $orderDetails = OrderDetail::find($request->orderDetailsId);
        $status = $request->status;

        //By Mananf
        if ($request->status == $orderDetails->delivery_status) {
            return Response()->json([
                'status' => false,
                'msg' => "This Item status already ${$status}"
            ]);
        }

        //By Mananf

        // $order=Order::where('id',$orderId)->update(array('editedby_id' => Auth::id() ));



        if ($order && $orderDetails) {
            if ($orderDetails->delivery_status == 'cancel' && $request->status != 'cancel') {
                $totalorderItemsCancelPrice = $orderDetails->price + $orderDetails->tax + $orderDetails->shipping_cost + $orderDetails->commision;
                $order->grand_total = $order->grand_total + $totalorderItemsCancelPrice;
                $order->save();
            } elseif ($orderDetails->delivery_status != 'cancel' && $request->status == 'cancel') {
                $totalorderItemsCancelPrice = $orderDetails->price + $orderDetails->tax + $orderDetails->shipping_cost + $orderDetails->commision;
                $order->grand_total = $order->grand_total - $totalorderItemsCancelPrice;
                $order->save();
            }
        }




        //send Sms
        // if ($order->user && $order->user->phone) {
        //     if ($request->status == 'cancel') {
        //         $message = "Your order has been $request->status";
        //     } else {
        //         $message = "Your order is on $request->status.You will get it soon";
        //     }

        //     sendSMS($order->user->phone, env('APP_NAME'), $message . env('APP_NAME'));
        // }


        //activity log
        $a_log = new Activitylog;
        $a_log->user_id = Auth::id();
        $a_log->loggable_id = $order->id;
        $a_log->orderdetails_id = $orderDetails->id;
        $a_log->loggable_type = Order::class;
        $a_log->description = "Updated $status from $orderDetails->delivery_status";
        $a_log->save();

        $updateOrderItemStatus = OrderDetail::where('id', $orderDetails->id)->update(array('delivery_status' => $status, 'editedby_id' => Auth::id()));


        //By Mananf
        if ($this->isOrderStatusSame($order, $status)) {
            $order->order_status = $status;
            $order->save();
        }

        return Response()->json([
            'status' => true,
            'grand_total' => $order->grand_total
        ]);
        //By Mananf
    }
    //By Mananf
    public function isOrderStatusSame($order, $status)
    {
        if ($order->orderDetails()->count() == $order->orderDetails()->where('delivery_status', $status)->count()) {
            return true;
        } else {
            return false;
        }
    }

    public function orderStatusUpdate(Request $request)
    {
        # code...
    }
    //By Mananf

    public function adminActivitylogs(Request $request)
    {
        // $date = $request->date;
        // $sort_search = null;

        // $orders = Order::orderBy('code', 'desc');

        // if ($request->has('search')){
        //     $sort_search = $request->search;
        //     $orders = $orders->where('code', 'like', '%'.$sort_search.'%');
        // }
        // if ($date != null) {
        //     $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        // }
        // $orders = $orders->paginate(15);
        //return view('backend.sales.activitylogs',compact('orders','date'));


        $date = $request->date;
        $sort_search = null;

        $orders = Activitylog::orderBy('id', 'desc');

        if ($request->has('search')) {
            $sort_search = $request->search;

            $orders->whereHas('order', function ($query) use ($sort_search) {
                return $query->where('code', '=', $sort_search);
            });


            // $orders = $orders->where('loggable_id', 'like', '%'.$sort_search.'%')
            //  $orders = $orders->where('loggable_id', 'like', '%'.$sort_search.'%');

        }
        if ($date != null) {
            $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }
        $orders = $orders->paginate(15);
        return view('backend.sales.activitylogs', compact('orders', 'date'));
    }
    public function editedbydeteils($id)
    {
        $user = User::where('id', $id)->first();
        return view('backend.sales.editedbydetails', compact('user'));
    }
    public function editedbyordershow($id)
    {
        $order = Order::findOrFail($id);
        return view('backend.sales.editedbyordershow', compact('order'));
    }
    public function changeOrderIdAdmin(Request $request)
    {
        $request->validate(
            [
                'code' => 'required|unique:orders|max:20',
            ],
            [
                'code.required' => "OrderId Required",
                'code.unique' => "OrderId allready Exit.Please unique Order-Id"
            ]
        );

        $id = $request->orderid;
        $code = $request->code;
        $order = Order::where("id", $id)->first();
        $order->code = $code;
        $order->save();
        return back();
        //return response(["message"=>"Updated Successfuly"]);
    }
    public function orderidshowAdmin($id)
    {
        $orderId = Order::where('id', $id)->first();
        return $orderId;
    }


    // public function categoryWiseProduct($id){
    //     $selectedCategory=$id;
    //     $orders=Order::whereHas('OrderDetails',function($query) use($selectedCategory){
    //         $query->whereHas('products',function($q)use($selectedCategory){
    //             $q->where('category_id',$selectedCategory);
    //         });
    //     })->get();

    // }
}
