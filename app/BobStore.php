<?php

namespace App;

use App\Models\StoreStock;
use App\Models\TempItemForPurchase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BobStore extends Model
{
    public function user(){
    	return $this->belongsTo(user::class,'addedby_id');
    }
    public function EditedName(){
    	return $this->belongsTo(user::class,'editedby_id');
    }

    /**
     * Get all of the inventories for the BobStore
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'store_id');
    }

    public function tempPurchaseItems()
    {
        return $this->hasMany(TempItemForPurchase::class,'warehouse_id');
    }
    public function total_purchase_price($supplier)
    {
        return $this->tempPurchaseItems()->where('supplier_id',$supplier)->where('user_id',Auth::id())->sum('total_price');
    }
    public function hasAnyItem($supplier)
    {
        return (bool) $this->tempPurchaseItems()->where('supplier_id',$supplier)->where('user_id',Auth::id())->count();
    }
    public function store_stocks()
    {
        return $this->hasMany(StoreStock::class,'warehouse_id')->where('quantity','>',0);
    }
    public function warhouse_wise_product_stock_qty($product_id)
    {
        return $this->store_stocks()->where('product_id',$product_id)->sum('quantity');
    }

}
