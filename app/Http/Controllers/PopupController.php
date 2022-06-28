<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Models\Popup;
use App\ProductTranslation;
use App\ProductStock;
use App\Category;
use App\Language;
use App\Faq;
use App\DelivryMethod;
use Auth;
use App\SubSubCategory;
use Session;
use ImageOptimizer;
use DB;
use Combinations;

use Illuminate\Support\Str;
use Artisan;
use Illuminate\Support\Facades\Log;

class PopupController extends Controller
{
    public function __construct()
    {
        $this->middleware('onlyview');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function all_popups(Request $request)
    {

        $popups = Popup::where('type',1)->orderBy('created_at', 'desc');

        $popups = $popups->paginate(15);
// dd($popups);
        return view('backend.popup.index', compact('popups'));
    }

    public function all_survey_popup(Request $request)
    {

        $popups = Popup::where('type',2)->orderBy('created_at', 'desc');

        $popups = $popups->paginate(15);
// dd($popups);
        return view('backend.popup.all_survey_popup_index', compact('popups'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.popup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images'), $imageName);

    $popup = new Popup;
    $popup->popup_type = $request->popup_type;
    $popup->description = $request->description;
    $popup->showing_time = $request->showing_time;
    $popup->image = $imageName;
    $popup->type = 1;
    $popup->status = 0;
    $popup->link = $request->link;
    $popup->insert_date =  date('Y-m-d');
    $popup->added_by = $request->added_by;
    if($popup->save()){
        flash(translate('Pop-Up has been save successfully'))->success();
        return redirect()->route('popup.index');
    }else{
        flash(translate('Something went wrong'))->error();
        return redirect()->route('popup.create');
    }
    }


    public function survey_popup_store(Request $request)
    {

    $popup = new Popup;
    $popup->name = $request->name;
    $popup->email = $request->email;
    $popup->mobile = $request->mobile;
    $popup->comment = $request->comment;
    $popup->type = 2;
    $popup->status = 1;
    $popup->insert_date =  date('Y-m-d');
    $popup->added_by = "customer";
    if($popup->save()){
        flash(translate('Survey has been save successfully'))->success();
        return redirect()->route('home');
    }else{
        flash(translate('Something went wrong'))->error();
        return redirect()->route('home');
    }
    }


    public function update(Request $request)
    {

        if(!empty($request->image)){
        $popup = Popup::findOrFail($request->id);
        $image_path = public_path('images/').$popup->image;  // Value is not URL but directory file path
        \File::delete($image_path);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        }else{
            $popup = Popup::findOrFail($request->id);
            $imageName = $popup->image;
        }



    $popup = Popup::find($request->id);
    $popup->popup_type = $request->popup_type;
    $popup->description = $request->description;
    $popup->showing_time = $request->showing_time;
    $popup->image = $imageName;
    $popup->type = 1;
    //$popup->status = 1;
    $popup->link = $request->link;
    $popup->insert_date =  date('Y-m-d');
    $popup->added_by = $request->added_by;
    if($popup->save()){
        flash(translate('Pop-Up has been update successfully'))->success();
        return redirect()->route('popup.edit', ['id'=>$request->id] );
    }else{
        flash(translate('Something went wrong'))->error();
        return redirect()->route('popup.edit', ['id'=>$request->id] );
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request, $id)
     {
        $popup = Popup::findOrFail($id);
        return view('backend.popup.edit', compact('popup'));
     }

     public function survey_popup_view(Request $request, $id)
     {
        $popup = Popup::findOrFail($id);
        return view('backend.popup.survey_view', compact('popup'));
     }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $popup = Popup::findOrFail($id);
        $image_path = public_path('images/').$popup->image;  // Value is not URL but directory file path
        \File::delete($image_path);

        if(Popup::destroy($id)){
            flash(translate('Popup has been deleted successfully'))->success();
            return redirect()->route('popup.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }
    public function destroy_survey($id)
    {

        if(Popup::destroy($id)){
            flash(translate('Survey has been deleted successfully'))->success();
            return redirect()->route('survey_popup.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    public function updatePublished(Request $request)
    {
        Popup::where('type', 1)->where('popup_type', $request->popup_type)->update(['status' => 0]);

        $popup = Popup::findOrFail($request->id);
        $popup->status = $request->status;

        $popup->save();
        return 1;
    }


}
