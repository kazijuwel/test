<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\OrderDetail;
class VoucherItem extends Model
{
    public function getqty(){
        return $this->belongsTo(OrderDetail::class,'orderitem_id');

    }

    public function voucher(){
        return $this->belongsTo(Voucher::class,'voucher_id');
    }
    public function chartofAccountName(){
        return $this->belongsTo(Voucher::class,'voucher_id');
    }
    public function transectionBalance($report,$start,$end){
        // $time= now()->parse($this->created_at)format("H:i:s");
        // $created= \Carbon\Carbon::parse($this->created_at)->format('Y-m-d');
        // return $created;
        // $date = new DateTime($start);
        // return $start =  $start." ".$time;

        if($start>$end){
            return $this->whereBetween('created_at',[$start,$end])->get();
        }
        elseif($start==$end){

            return $this->whereDate('created_at',$start)->get();
        }else{
            return $this->whereBetween('created_at',[$start,$end])->get();
        }




       // return $this->where('created_at', '>=',$start)->where('created_at','=<',$end)->get();

    }
    public function hasVoucher(){
        return $this->belogsTo(Voucher::class,'voucher_id');
    }
    public function operningBalance($id,$start)
    {
       $data= $this->where('chartof_account_id',$id)->whereDate('created_at','<',$start)->get();
       $debit= $data->sum('debit');
       $credit= $data->sum('credit');
       return $debit- $credit;
    }
    public function orderitem()
    {
        return $this->belongsTo(OrderDetail::class,'orderitem_id');
    }
    public function seller()
    {
        return $this->belongsTo(user::class,'seller_id');
    }
    public function customer(){
        return $this->belongsTo(user::class,'user_id');
    }
}
