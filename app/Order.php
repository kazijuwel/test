<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function advancePayment(){
        return $this->hasMany(AdvancePayment::class,'order_id');
    }

    public function paymentDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function refund_requests()
    {
        return $this->hasMany(RefundRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pickup_point()
    {
        return $this->belongsTo(PickupPoint::class);
    }
    public function editedby()
    {
        return $this->belongsTo(User::class,'editedby_id');
    }
    public function orderDetailsStatus()
    {
        if($this->orderDetails()->where('delivery_status','pending')->first())
        {
            return "Pending";
        }
        elseif($this->orderDetails()->where('delivery_status','confirmed')->first())
        {
            return "Confirmed";

        }elseif($this->orderDetails()->where('delivery_status','delivered')->first()){

            return "Delivered";
        }
        elseif($this->orderDetails()->where('delivery_status','cancel')->first())
        {
            return "Cancel";
        }


    }
    public function deliveryman(){

        return $this->belongsTo(DeliveryMan::class,'deliveryman_id');
    }
    public function warehouse()
    {
        return $this->belongsTo(BobStore::class, 'warehouse_id');
    }

}
