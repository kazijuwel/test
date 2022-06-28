<?php

namespace App\Models;

use App\BobStore;
use Illuminate\Database\Eloquent\Model;

class StoreStock extends Model
{
   public function supplier()
   {
       return $this->belongsTo(Seller::class,'supplier_id');
    }
   public function product()
   {
       return $this->belongsTo(Product::class,'product_id')->withoutGlobalScopes();
    }
   public function warehouse()
   {
       return $this->belongsTo(BobStore::class,'warehouse_id');
    }
   public function purchase()
   {
       return $this->belongsTo(Purchase::class,'purchase_id');
    }
   public function purchase_item()
   {
       return $this->belongsTo(PurchasesItems::class,'purchase_item_id');
    }
}
