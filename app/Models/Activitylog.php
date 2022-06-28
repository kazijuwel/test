<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Activitylog extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class,'loggable_id');
    }
    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }
    public function orderDetails()
    {
        return $this->belongsTo(OrderDetail::class,'orderdetails_id');
    }
    // public function product()
    // {
    //     return $this->belongsTo(Product::class,'orderdetails_id');
    // }
}
