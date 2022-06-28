<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
use App\Models\StoreStock;

class Product extends Model
{
    protected $fillable = [
        'name','added_by', 'user_id', 'category_id', 'brand_id', 'video_provider', 'video_link', 'unit_price',
        'purchase_price', 'unit', 'slug', 'colors', 'choice_options', 'variations', 'current_stock','delivery_price_type','delivery_price','total_kg','total_cft'
      ];

    public function getTranslation($field = '', $lang = false){
      $lang = $lang == false ? App::getLocale() : $lang;
      $product_translations = $this->hasMany(ProductTranslation::class)->where('lang', $lang)->first();
      return $product_translations != null ? $product_translations->$field : $this->$field;
    }

    public function product_translations(){
    	return $this->hasMany(ProductTranslation::class);
    }

    public function category(){
    	return $this->belongsTo(Category::class);
    }
    public function category_many(){
    	return $this->hasMany(Category::class);
    }

    public function brand(){
    	return $this->belongsTo(Brand::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function orderDetails(){
    return $this->hasMany(OrderDetail::class);
    }

    public function reviews(){
    return $this->hasMany(Review::class)->where('status', 1);
    }

    public function wishlists(){
    return $this->hasMany(Wishlist::class);
    }

    public function stocks(){
    return $this->hasMany(ProductStock::class);
    }

    public function product_faq() {

        return $this->hasMany('App\Faq', 'product_id', 'id');
    }

    public function product_parts_warranty() {

        return $this->hasMany('App\ProductPartsWarranty', 'product_id', 'id');
    }
    // public function totalQuantity($start,$end)
    // {
    //     dd(1);

    //     $this->orderItems()->whereBetween('created_at',[$start, $end])->sum('quanitty');
    // }
    public function store_stocks()
    {
        return $this->hasMany(StoreStock::class,'product_id');
    }
    public function total_stock()
    {
        return $this->store_stocks()->sum('quantity');
    }

    public function warehouseWiseStock($warehouse)
    {
       return $this->store_stocks()->where('warehouse_id',$warehouse)->sum('quantity');
    }
    public function hasStock($warehouse,$quantity)
    {
       return (bool) $this->store_stocks()->where('warehouse_id',$warehouse)->where('quantity','>=',$quantity)->first();
    }
    public function warehouseWiseBatch($warehouse,$quantity)
    {
       return $this->store_stocks()->where('warehouse_id',$warehouse)->where('quantity','>=',$quantity)->first();
    }


}
