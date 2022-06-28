<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchasesItems extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->withoutGlobalScopes();
    }
    public function supplier()
    {
        return $this->belongsTo(Seller::class, 'supplier_id');
    }
    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
    public function warehouse()
    {
        return $this->belongsTo(Seller::class,'warehouse_id');
    }
}
