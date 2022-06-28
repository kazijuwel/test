<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
  public function user(){
  	return $this->belongsTo(User::class);
  }

  public function payments(){
  	return $this->hasMany(Payment::class);
  }

  public function orderSellerAmount(){
  	return $this->hasMany(OrderDetail::class,'seller_id');
  }
  public function amount(){
  	return $this->orderSellerAmount()->where("delivery_status","delivered")->sum('price');
  }

  public function due()
  {
      return $this->admin_to_pay - $this->paid_amount;
  }
  public function total_products()
  {
      return $this->user->products->count();
  }
  public function payment_history()
  {
      return $this->hasMany(SupplierPayment::class,'supplier_id');
  }

//   public function sellerDeliveryProductCount(){
//     return $this->hasMany(OrderDetail::class,'seller_id');
// }
  // public function hasConfirmed()
  // {
  //     return $this->orderDetails()->where('delivery_status','confirmed');
  // }
}
