<?php

namespace App;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function editedby()
    {
        return $this->belongsTo(User::class,'editedby_id');
    }
    public function addedby()
    {
        return $this->belongsTo(User::class,'addedby_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'deliveryman_id','user_id');
    }
    public function qty($start, $end, $product_id)
    {


        $quantity=null;
        if ($this->orders()->count() > 0) {
            foreach ($this->orders()->get() as $order) {
                   $quantity += $order->orderDetails()
                   ->whereBetween('created_at',[$start, $end])
                   ->where('delivery_status','!=','pending')
                   ->where('delivery_status','!=','canchelled')
                   ->where('product_id',$product_id)
                   ->sum('quantity');
                }

            }
            return $quantity;



    }
}
