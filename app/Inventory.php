<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;
class Inventory extends Model
{
    protected $fillable=['serial'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function store()
    {
        return $this->belongsTo(BobStore::class, 'store_id');
    }

    public function inventoryItems()
    {
        return $this->hasMany(Inventory::class, 'order_id', 'order_id');
    }

    public function purchaseVouchar()
    {
        return $this->belongsTo(Vouchar::class, 'purchase_vouchar_id');
    }
    public function purchase(){
        return $this->belongsTo(OrderDetail::class, 'order_item_id');
    }


 











    public function productItem($id)
    {
        return $this->where('order_id',$id)->where('','purchase')->get();

    }
    public function sellerName()
    {
        return $this->belongsTo(User::class,'seller_id');
    }
    public function customerName()
    {
        return $this->belongsTo(User::class,'customer_id');
    }
    public function Amount1()
    {
        return $this->belongsTo(Voucher::class,'purchase_vouchar_id');
    }
    public function Amount2()
    {
        return $this->belongsTo(Voucher::class,'sale_voucher_id');
    }
    public function Inquentity($id){
      $inq=$this->where('order_id',$id)->where('type','purchase')->get();
     return $inq->count('purchase_quentity');
    }
    public function Outquentity($id)
    {
    $out=$this->where('order_id',$id)->where('type','sales')->get();
    return $out->count('sale_quentity');
    }



    // public function productItems($id){

    //     return $this->where('order_id',$id)->get();

    // }
    // public function productPurchaseQuentity($orderId,$orderItem){
    //     $quentity=$this->where('order_id',$orderId)->where('order_item_id',$orderItem)->first();
    //    return $qty=  $quentity->purchase_quentity;

    // }
    // public function productSalesQuentity($type,$orderId,$orderItem){
    //     $quentity=$this->where('order_id',$orderId)->where('type',$type)->where('order_item_id',$orderItem)->first();
    //    return $qty=  $quentity->sale_quentity;

    // }


}
