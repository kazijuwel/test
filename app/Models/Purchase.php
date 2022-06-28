<?php

namespace App\Models;

use App\BobStore;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
   public function warehouse()
   {
    return $this->belongsTo(BobStore::class,'warehouse_id');
   }
   public function supplier()
   {
    return $this->belongsTo(Seller::class,'supplier_id');
   }
   public function items()
   {
    return $this->hasMany(PurchasesItems::class,'purchase_id');
   }
   public function total_quantity()
   {
    return $this->items()->sum('quantity');
   }
   public function purchase_price()
   {
    return $this->items()->sum('purchase_unit_price');
   }
   public function total_price()
   {
    return $this->items()->sum('total_price');
   }
}
