<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VoucherItem;
use App\Models\Order;
class Voucher  extends Model
{
    public function voucherItems(){
        return $this->hasMany(VoucherItem::class);
    }
    public function customerName(){
        return $this->belongsTo(Order::class,'order_id');
    }

}
