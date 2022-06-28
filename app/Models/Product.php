<?php

namespace App\Models;

use App\DeliveryMan;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string $added_by
 * @property int $user_id
 * @property int $category_id
 * @property int $brand_id
 * @property string|null $photos
 * @property string|null $thumbnail_img
 * @property string|null $featured_img
 * @property string|null $flash_deal_img
 * @property string|null $video_provider
 * @property string|null $video_link
 * @property string|null $tags
 * @property string|null $description
 * @property float $unit_price
 * @property float $purchase_price
 * @property string|null $choice_options
 * @property string|null $colors
 * @property string $variations
 * @property int $todays_deal
 * @property int $published
 * @property int $featured
 * @property int $current_stock
 * @property string|null $unit
 * @property float|null $discount
 * @property string|null $discount_type
 * @property float|null $tax
 * @property string|null $tax_type
 * @property string $shipping_type
 * @property float|null $shipping_cost
 * @property int $num_of_sale
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_img
 * @property string|null $pdf
 * @property string $slug
 * @property float $rating
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Brand $brand
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereChoiceOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCurrentStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereFeaturedImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereFlashDealImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereMetaImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereNumOfSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePurchasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereShippingCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereShippingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSubsubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereTaxType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereThumbnailImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereTodaysDeal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereVariations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereVideoLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereVideoProvider($value)
 * @mixin \Eloquent
 */

class Product extends Model
{
    protected $fillable = ['current_stock', 'variations', 'num_of_sale'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('published', function (Builder $builder) {
            $builder->where('published', 1);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }
    // public function brands()
    // {
    //     return $this->belongsToMany(Brand::class,'products','brand_id','category_id');
    // }
    public function orderItems()
    {
       return $this->hasMany(OrderDetail::class,'product_id')->where('delivery_status','!=','pending')->where('delivery_status','!=','canchelled');
    }
    public function totalQuantity($start,$end)
    {
        //this method

       return  $this->orderItems()->whereBetween('created_at',[$start, $end])->sum('quantity');
    }

    public function insideDhaka($start,$end)
    {
       $items= $this->orderItems()->whereBetween('created_at',[$start, $end])->get();

       $insideDhakaQty =0;
       foreach ($items as  $item) {
        if ($item->order) {
            if (json_decode($item->order->shipping_address)->city == 'Dhaka') {
                $insideDhakaQty += $item->quantity;
            }
        }

        }
        return $insideDhakaQty;
    }

    public function outSideDhaka($start,$end)
    {
       $items= $this->orderItems()->whereBetween('created_at',[$start, $end])->get();

       $outSideDhaka =0;
       foreach ($items as $key => $item) {
        if ($item->order) {
        if (json_decode($item->order->shipping_address)->city != 'Dhaka') {
                $outSideDhaka += $item->quantity;
            }
        }
    }
        return $outSideDhaka;
    }
    public function deliveryMan($start,$end)
    {
       $items= $this->orderItems()->whereBetween('created_at',[$start, $end])->get();

       $deleveryMan=[];
                    foreach ($items as $key => $item) {
                        // $deleveryMan=[];
                            // foreach ($item->order()->groupBy('deliveryman_id')->get() as $key => $order) {
                            //     $deleveryMan=$order->id
                            // // if ($order->deliveryman_id) {
                            // //         $delevery_mane_name = DeliveryMan::where('user_id',$order->deliveryman_id)->first();
                            // //         $deleveryMan[$delevery_mane_name->name] = $order->orderItems->whereBetween('created_at',[$start, $end])->sum('quantity');
                            // //    }
                            //     }

                    }
        return $deleveryMan ;
    }

    // public function totalQuantity($start,$end)
    // {
    //     $this->orderItems()->whereBetween('created_at',[$start, $end])->sum('quanitty');
    // }
    public function belaobelaOwn($start,$end)
    {
       $items= $this->orderItems()
       ->whereBetween('created_at',[$start, $end])
       ->whereHas('order', function($q){
        $q->whereHas('deliveryMan',function($qq){
            $qq->where('is_company',false);
        });

       })->sum('quantity');
return $items;
       $result = false;
    //    foreach ($items as $key => $item) {
    //     if ($item->order) {
    //     if ($item->order->deliveryman_id) {
    //         $result = true;
    //         }
    //     }
    // }
    //     return $result;
    }

    public function tempProducts()
    {
        return $this->hasMany(TempItemForPurchase::class,'product_id');
    }
    public function hasTemp($warehouse)
    {
       return (bool) $this->tempProducts()->where('warehouse_id',$warehouse)->where('user_id',Auth::id())->first();
    }
    public function store_stocks()
    {
        return $this->hasMany(StoreStock::class,'product_id');
    }
    public function total_stock()
    {
        return $this->store_stocks()->where('quantity','>',0)->sum('quantity');
    }

    public function warehouseWiseStock($warehouse)
    {
       return $this->store_stocks()->where('warehouse_id',$warehouse)->sum('quantity');
    }
    public function hasStock($warehouse)
    {
       return (bool) $this->store_stocks()->where('warehouse_id',$warehouse)->first();
    }
    public function total_stock_quantity()
    {
       return $this->store_stocks()->sum('quantity');
    }




}
