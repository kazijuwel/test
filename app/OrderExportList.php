<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use App\Order;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;


use Maatwebsite\Excel\Concerns\WithColumnFormatting;


class OrderExportList implements FromCollection, WithMapping, WithHeadings
{
    protected $date;
    protected $user_id;
    function __construct($date,$user_id) {
        $this->date = $date;
        $this->user_id = $user_id;
    }
    public function collection()
    {


        // return Payment::where('seller_id', Auth::user()->seller->id)->paginate(9);
        //return Payment::all();

        if($this->date != null and $this->user_id != null){
            //$test =  OrderDetail::where('seller_id',$this->user_id)->whereDate('order_details.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $this->date)[0])))->whereDate('order_details.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $this->date)[1])))->get();
          // dd($test);
             return  OrderDetail::where('seller_id',$this->user_id)->whereDate('order_details.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $this->date)[0])))->whereDate('order_details.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $this->date)[1])))->get();
        } else if($this->date !=null){
            return  OrderDetail::whereDate('order_details.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $this->date)[0])))->whereDate('order_details.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $this->date)[1])))->get();
            // dd($test);
            //return Order::whereDate('orders.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $this->date)[0])))->whereDate('orders.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $this->date)[1])))->get();
        }else if($this->user_id !=null){
            return  OrderDetail::where('seller_id',$this->user_id)->get();
            // dd($test);
            //return Order::whereDate('orders.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $this->date)[0])))->whereDate('orders.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $this->date)[1])))->get();
        }else{
           // return Order::where('id',30)->get();
            return OrderDetail::get();
        }
    }

    public function headings(): array
    {
        return [

            'Date',
            'Invoice No',
            'Product Name',
            'Seller',
            'Customer',
            'unit price',
            'purchase price',
            'Delivery Cost',
            'Quantity',
            'Total Sales Amount',
            'payment_status',
            'delivery_status',
            'Balance Amount',


        ];
    }


    public function map($orders): array
    {
        $balance_amount =$orders->order->grand_total - $orders->purchase_price - $orders->delivry_methods_charge;
        return [
            $orders->created_at,
            $orders->order->code,

            $orders->product->name,

            $orders->seller->name,

            $orders->order->user->name,
            $orders->unit_price,
            $orders->purchase_price,
            $orders->delivry_methods_charge,
            $orders->quantity,
            $orders->order->grand_total,
            $orders->payment_status,
            $orders->delivery_status,
            $balance_amount,

            // Date::dateTimeToExcel($Payment->created_at),
            // Carbon::createFromTimestamp($Payment->created_at)->format('d-m-Y'),

        ];
    }
}
