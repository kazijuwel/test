<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BobStore;
use Auth;
use App\Inventory;
use App\Product;
class InventoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('onlyview');
    }

    public function all_store_list(Request $request){

        if ($request->warehouse) {
            $stores=BobStore::where('id',$request->warehouse)->paginate(10);
        }else{
            $stores=BobStore::paginate(10);
        }

        return view('backend.inventory.all_store_list',compact('stores'));

     }
     public function bobcreatestore(Request $request){
        $bStore= new BobStore;
        $bStore->store_name= $request->store_name;
        $bStore->addedby_id= Auth::id();
        $bStore->address= $request->address;
        $bStore->active= $request->active;
        $bStore->save();
        flash(translate('Store Created Successfuly'))->success();
       return back();

     }
     public function store_delete($id)
     {
        BobStore::where('id',$id)->delete();
        flash(translate('Store Created Successfuly'))->success();
        return back();
     }
     public function store_edit($id)
     {
       $bStore =BobStore::where('id',$id)->first();
       return view('backend.inventory.store_edit',compact('bStore'));
     }
     public function store_update(Request $request){
        $bStore= BobStore::where('id',$request->storeId)->first();
        $bStore->store_name= $request->store_name;
        $bStore->addedby_id= Auth::id();
        $bStore->address= $request->address;
        $bStore->active= $request->active;
        $bStore->save();
        flash(translate('Store Updated Successfuly'))->success();
       return redirect()->route('all_store_list');
     }
     public function allinventoryshow(){
         $inventorys=Inventory::groupBy('order_id')->paginate(30);
         return view('backend.inventory.allinventoryshow',compact('inventorys'));
     }
     public function editinventory($id){
        $Inv=Inventory::where('id',$id)->first();
         $orederId=$Inv->order_id;
         $InvProducts=Inventory::where('id',$id)->groupBy('order_id')->get();
         $stores=BobStore::get();
         return view('backend.inventory.addstoreview',compact('InvProducts','stores','orederId','Inv'));
     }
     public function addstoreupdate(Request $request){
         $orederId =$request->orderId;
         $storeId=$request->storeId;
         $InvProducts=Inventory::where('order_id',$orederId)->update(['store_id' => $storeId]);
         flash(translate('Store Updated Successfuly'))->success();
         return back();
     }
     public function addproductitemupdate(Request $request){

        $produtItemId =$request->produtItemId;
        $value =$request->value;
        $fieldName=$request->fieldName;
        $type=$request->type;
        $OrderId=$request->OrderId;
        $inv=Inventory::where('order_id',$OrderId)->where('order_item_id',$produtItemId)->first();
        $inv-> $fieldName = $value;
        $inv->stock_quentity = $inv->purchase_quentity - $inv->sale_quentity;
        $inv->save();
        return "Update Successfuly";

     }

     public function storeandpurchaseupdate(Request $request){
        $produtItemId =$request->produtItemId;
        $value =$request->value;
        $fieldName=$request->fieldName;
        $type=$request->type;
        $OrderId=$request->OrderId;
        $inv=Inventory::where('order_id',$OrderId)->
        where('order_item_id',$produtItemId)->update([ $fieldName=> $value]);
        return "Update Successfuly";
     }
     public function productwisestock($id){
         $product = Product::find($id);
         $inventorys=Inventory::where('product_id',$id)
         ->paginate(50);
         $totalQty = Inventory::where('product_id', $id)->sum('stock_quentity');
         return view('backend.inventory.productwisestock',compact('inventorys','totalQty', 'product'));

     }

     public function storewiseProductStock($id){
        $store = BobStore::find($id);
        $inventorys=Inventory::where('store_id',$id)
        ->paginate(50);
        $totalQty = Inventory::where('store_id', $id)->sum('stock_quentity');
        return view('backend.inventory.storewiseProductStock',compact('inventorys','totalQty', 'store'));

    }
}
