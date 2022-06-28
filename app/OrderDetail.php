<?php

namespace App;

use App\Models\StoreStock;
use Illuminate\Database\Eloquent\Model;
class OrderDetail extends Model
{
    // protected $guarded = [];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function seller()
    {
        return $this->belongsTo(User::class,'seller_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function pickup_point()
    {
        return $this->belongsTo(PickupPoint::class);
    }

    public function refund_request()
    {
        return $this->hasOne(RefundRequest::class);
    }
    public function couponBalance()
    {
        return $this->belongsTo(Order::class);
    }
    public function stock()
    {
        return $this->belongsTo(StoreStock::class,'store_stock_id');
    }

}
