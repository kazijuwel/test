<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdContainer;
use App\Models\AdItem;
use File;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('onlyview');
    }

    public function allcontianers(){
        $adContainers=AdContainer::paginate(30);
        return view('backend.advertisement.index',['adContainers'=> $adContainers]);
    }
    public function advertisement_containers()
    {
        return view('backend.advertisement.create');
    }
    public function advertisement_container_edit($id){
        $adContainers=AdContainer::find($id);
        return view('backend.advertisement.edit',['ad'=>$adContainers]);
    }
    public function advertisement_containers_post(Request $request)
    {
        $request->validate([
            'device' => 'required',
            'place' => 'required',
            'page' => 'required',
            'position' => 'required',
            'container_item_count' => 'required',
            'active' => 'required',
        ]);
        $ad=new AdContainer;
        $ad->device=$request->device;
        $ad->place=$request->place;
        $ad->page=$request->page;
        $ad->position=$request->position;
        $ad->container_item_count=$request->container_item_count;
        $ad->active=$request->active;
        $ad->description=$request->description;
        $ad->addedby_id=auth()->id();
        $ad->save();
        flash(translate('Adveristment Created Successfully'))->success();
        return back();
    }
    public function advertisement_containers_post_update(Request $request)
    {
        $request->validate([
            'device' => 'required',
            'place' => 'required',
            'page' => 'required',
            'position' => 'required',
            'container_item_count' => 'required',
            'active' => 'required',
        ]);
        $ad=AdContainer::find($request->containerId);
        $ad->device=$request->device;
        $ad->place=$request->place;
        $ad->page=$request->page;
        $ad->position=$request->position;
        $ad->container_item_count=$request->container_item_count;
        $ad->active=$request->active;
        $ad->addedby_id=auth()->id();
        $ad->description=$request->description;
        $ad->save();
        flash(translate('Adveristment Updated Successfully'))->success();
        return back();
    }

    public function advertisement_items(Request $request){
        $adContainers=AdContainer::get();
        return view('backend.advertisement.aditems.create',compact('adContainers'));
    }
    public function advertisementItemsPost(Request $request){

        $request->validate([
            'addcontainer' => 'required',
            'url' => 'required',
            'image' => 'required',
            'started_at_date' => 'required',
            'ended_at_date' => 'required',
            'active' => 'required',
            'image' => 'required',
        ]);
        $ad=new AdItem;
        $ad->container_id=$request->addcontainer;
        $ad->url=$request->url;
        $ad->started_at=$request->started_at_date." ". $request->started_at_time;
        $ad->ended_at=$request->ended_at_date." ". $request->ended_at_time;
        $ad->active=$request->active;
        $ad->addedby_id=auth()->id();
        if ($request->hasFile('image')) {
            // $old_file = 'tourPackage/' . $tourPackage->feature_img;
            // if (Storage::disk('public')->exists($old_file)) {
            //     Storage::disk('public')->delete($old_file);
            // }
            $file = $request->image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = 'ad'.time() . $ext;
            $request->image->move(public_path('uploads/advertisment/'), $imageName);
            $ad->image_name = $imageName;
        }
        $ad->save();

        flash(translate('Adveristment Created Successfully'))->success();
        return back();
    }
    public function allAddItems(Request $request){
        $aditems=AdItem::get();
        return view('backend.advertisement.aditems.index',compact('aditems'));
    }
    public function advertisement_items_edit($id){
        $adContainers=AdContainer::get();
        $aditem=AdItem::find($id);

        return view('backend.advertisement.aditems.edit',['adContainers'=>$adContainers,'aditem'=>$aditem]);
    }
    public function advertisementItemPostupdate(Request $request){

        $request->validate([
            'addcontainer' => 'required',
            'url' => 'required',
            'started_at_date' => 'required',
            'ended_at_date' => 'required',
            'active' => 'required',

        ]);
        $ad=AdItem::find($request->itemId);
        $ad->container_id=$request->addcontainer;
        $ad->url=$request->url;
        $ad->started_at=$request->started_at_date." ". $request->started_at_time;
        $ad->ended_at=$request->ended_at_date." ". $request->ended_at_time;
        $ad->active=$request->active;
        $ad->addedby_id=auth()->id();
        if ($request->hasFile('image')) {
            // $old_file = 'uploads/advertisment/' . $ad->image_name;
            // // if (Storage::disk('public/')->exists($old_file)) {
            // //     Storage::disk('public/')->delete($old_file);
            // // }
            if( File::exists(public_path('uploads/advertisment/'.$ad->image_name)) ) {
                File::delete(public_path('uploads/advertisment/'.$ad->image_name));
            }
            $file = $request->image;
            $ext = "." . $file->getClientOriginalExtension();
            $imageName = 'ad'.time() . $ext;
            $request->image->move(public_path('uploads/advertisment/'), $imageName);
            $ad->image_name = $imageName;
        }
        $ad->save();

        flash(translate('Adveristment Updated Successfully'))->success();
        return back();
    }
    public function advertisementItemDelete($id){
        $ad=AdItem::find($id);
        if( File::exists(public_path('uploads/advertisment/'.$ad->image_name)) ) {
            File::delete(public_path('uploads/advertisment/'.$ad->image_name));
        }
        $ad->delete();
        flash(translate('Adveristment Item Deleted Successfully'))->success();
        return back();
    }
    public function advertisementContainerDelete(Request $request,$id)
    {
        $ad = AdContainer::find($id);
        $ad->adItems()->delete();
        $ad->delete();
        flash(translate('Adveristment container  Deleted Successfully'))->success();
        return back();
    }
    public function advertisementContainerItemsView($id){
        $adContainer=AdContainer::find($id);
        return view('backend.advertisement.containeritems',compact('adContainer'));
    }
}
