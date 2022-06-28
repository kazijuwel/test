<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use App\Payment;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;


use Maatwebsite\Excel\Concerns\WithColumnFormatting;


class WithdrawRequestsExport implements FromCollection, WithMapping, WithHeadings
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
            return  Payment::where('user_id',$this->user_id)->whereDate('payments.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $this->date)[0])))->whereDate('payments.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $this->date)[1])))->get();
        } else if($this->date !=null){
            return  Payment::whereDate('payments.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $this->date)[0])))->whereDate('payments.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $this->date)[1])))->get();
           // dd($test);
            //return Order::whereDate('orders.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $this->date)[0])))->whereDate('orders.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $this->date)[1])))->get();
        }else if($this->user_id !=null){
            return  Payment::where('user_id',$this->user_id)->get();
           // dd($test);
            //return Order::whereDate('orders.created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $this->date)[0])))->whereDate('orders.created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $this->date)[1])))->get();
        }else{
            return Payment::all();
        }
    }

    public function headings(): array
    {
        return [
            'Seller Name',
            'Date',
            'Total Purchase Amount',
            'Amount',
            'Payment Method',
            'Txn Code',
            'Due To Seller'


        ];
    }


    public function map($Payment): array
    {
        return [
            $Payment->user->name,
            $Payment->created_at,
            $Payment->pre_due_to_seller,
            $Payment->amount,
            $Payment->payment_method,
            $Payment->txn_code,
            $Payment->cur_due_to_seller,

           // Date::dateTimeToExcel($Payment->created_at),
           // Carbon::createFromTimestamp($Payment->created_at)->format('d-m-Y'),

        ];
    }


}
