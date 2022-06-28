<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use PDF;
use Auth;
use App\User;
use App\Models\OrderDetail;
use App\Models\Seller;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('onlyview');
    }

    public function test_invoice($id)
    {


        $order = Order::findOrFail($id);
       // $pdf = PDF::setOptions([
       //      'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
       //      'logOutputFile' => storage_path('logs/log.htm'),
       //      'tempDir' => storage_path('logs/')
       //  ])->loadView('backend.invoices.test_html_al', compact('order'));
       //  return $pdf->download('order-.pdf');


        ////
        $order = Order::findOrFail($id);

       return view('backend.invoices.test_invoice', compact('order'));
       // return view('backend.invoices.test_html_al', compact('order'));
    }

    public function test_report_pdf($id)
    {
        $order = Order::findOrFail($id);
        $pdf = PDF::setOptions([
                        'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
                        'logOutputFile' => storage_path('logs/log.htm'),
                        'tempDir' => storage_path('logs/')
                    ])->loadView('backend.invoices.test_pdf_report', compact('order'));
        return $pdf->download('order-'.$order->code.'.pdf');
    }

    //downloads customer invoice
    public function customer_invoice_download($id)
    {
        $order = Order::findOrFail($id);
        $pdf = PDF::setOptions([
                        'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
                        'logOutputFile' => storage_path('logs/log.htm'),
                        'tempDir' => storage_path('logs/')
                    ])->loadView('backend.invoices.customer_invoice', compact('order'));
        return $pdf->download('order-'.$order->code.'.pdf');
    }

    public function purchase_requisition_download($seller_id,$order_id)
    {
        $order = Order::findOrFail($order_id);
        $orderDetails=OrderDetail::where('order_id',$order_id)->where('seller_id',$seller_id)->get();
        $sellerData=User::where('id',$seller_id)->first();
        $pdf = PDF::setOptions([
                        'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
                        'logOutputFile' => storage_path('logs/log.htm'),
                        'tempDir' => storage_path('logs/')
                    ])->loadView('backend.invoices.purchase_requisition', compact('order','orderDetails','sellerData'));
        return $pdf->download($sellerData->name.'-'.$order->code.'.pdf');
    }

    public function purchase_order_download($seller_id,$order_id)
    {
        $orderDetails=OrderDetail::where('order_id',$order_id)->where('seller_id',$seller_id)->get();
        $order=Order::find($order_id);
        $sellerData=User::where('id',$seller_id)->first();
         $pdf = PDF::setOptions([
                        'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
                        'logOutputFile' => storage_path('logs/log.htm'),
                        'tempDir' => storage_path('logs/')
                    ])->loadView('backend.invoices.purchase_orderitems', compact('orderDetails','sellerData','order'));
    return $pdf->download($sellerData->name.'-'.$order_id.'.pdf');



        //$order = Order::findOrFail($id);

        // $orderDetails = $order->orderDetails()->groupBy("seller_id")->get();

        // // dd($sellers);

        // foreach($orderDetails as $orderDetail){
        //     $pdf = PDF::setOptions([
        //         'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
        //         'logOutputFile' => storage_path('logs/log.htm'),
        //         'tempDir' => storage_path('logs/')
        //     ])->loadView('backend.invoices.purchase_order', compact('order','orderDetail'));
        //    return $pdf->download('order-'.$order->code.'.pdf');
        // }

        // $sellers=$order->orderDetails()->pluck('seller_id');

        // foreach($order->orderDetails()->group as $orderDetail){

        // }


        // $pdf = PDF::setOptions([
        //                 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
        //                 'logOutputFile' => storage_path('logs/log.htm'),
        //                 'tempDir' => storage_path('logs/')
        //             ])->loadView('backend.invoices.purchase_order', compact('order'));
        // return $pdf->download('order-'.$order->code.'.pdf')

        // $order = Order::findOrFail($id);
        // return view('backend.invoices.purchase_orderitems', compact('order'));
        // $pdf = PDF::setOptions([
        //                 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
        //                 'logOutputFile' => storage_path('logs/log.htm'),
        //                 'tempDir' => storage_path('logs/')
        //             ])->loadView('backend.invoices.purchase_order', compact('order'));
        // return $pdf->download('order-'.$order->code.'.pdf');
    }

    //downloads seller invoice
    public function seller_invoice_download($id)
    {
        $order = Order::findOrFail($id);
        $pdf = PDF::setOptions([
                        'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
                        'logOutputFile' => storage_path('logs/log.htm'),
                        'tempDir' => storage_path('logs/')
                    ])->loadView('backend.invoices.seller_invoice', compact('order'));
        return $pdf->download('order-'.$order->code.'.pdf');
    }

    //downloads admin invoice
    public function admin_invoice_download($id)
    {
        $order = Order::findOrFail($id);
        $pdf = PDF::setOptions([
                        'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
                        'logOutputFile' => storage_path('logs/log.htm'),
                        'tempDir' => storage_path('logs/')
                    ])->loadView('backend.invoices.admin_invoice', compact('order'));
        return $pdf->download('order-'.$order->code.'.pdf');
    }
}
