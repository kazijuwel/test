<?php

namespace App\Http\Controllers;

use App\DelivryMethod;
use App\MinDeliveryCharge;
use Illuminate\Http\Request;
use Carbon;

class DelivryMethodController extends Controller
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

    public function minimumDeliveryCharge(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // exit();
        $delivery_charge_id = MinDeliveryCharge::where('id', 1)->first();

        $requestData['minimum_charge'] = $request->minimum_charge;
        $requestData['outside_minimum_charge'] = $request->outside_minimum_charge;

        if($delivery_charge_id->update($requestData)){
            flash(translate('Information Saved successfully'))->success();
            return back();

        }
    }


    public function index()
    {
        $delivery_method_list = DelivryMethod::where('level', 1)->get();
        $delivery_method_list_urgency = DelivryMethod::where('level', 0)->get();
        $delivery_method_list_paginate = DelivryMethod::whereNotIn('id', array(1, 2, 9, 10))->paginate(25);
        $min_charge = MinDeliveryCharge::where('id', 1)->first();

        return view('backend.delivery_method.index', compact('delivery_method_list', 'delivery_method_list_paginate', 'delivery_method_list_urgency','min_charge'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $date = Carbon\Carbon::now();
        // echo '<pre>'; print_r($date); exit();
        $level = $request->level;
        if($level == 0){
         $requestData['title'] = $request->title;
         $requestData['level'] = 0;
         $requestData['parent_id'] = 0;
         $requestData['created_by'] = $request->created_by;
        }elseif ($level == 1){

            $requestData['title'] = $request->title;
            $requestData['level'] = 1;
            $requestData['parent_id'] = $request->urgency;
            $requestData['urgency'] = $request->urgency;
            $requestData['delivery_date'] = $request->delivery_date;
            $requestData['delivery_payment_type'] = $request->delivery_payment_type;
            $requestData['created_by'] = $request->created_by;

        }elseif ($level == 2){
            $requestData['title'] = $request->title;
            $requestData['level'] = 2;
            $requestData['parent_id'] = $request->parent_id;
            $requestData['urgency'] = $request->urgency;
            $requestData['type'] = $request->type;
            $requestData['delivery_charge'] = $request->delivery_charge;
            $requestData['created_by'] = $request->created_by;

        }else{
            flash(translate('Please correct the format and try again'))->error();
            return back();
        }

        // insert data
        if( DelivryMethod::create($requestData)){
            flash(translate('Information Saved successfully'))->success();
            return back();
        }else{
            flash(translate('Please correct the format and try again'))->error();
            return back();
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DelivryMethod  $delivryMethod
     * @return \Illuminate\Http\Response
     */
    public function show(DelivryMethod $delivryMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DelivryMethod  $delivryMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(DelivryMethod $delivryMethod, $id)
    {
        //
        $delivery_method_info = DelivryMethod::where('id', $id)->first();
        $delivery_method_list = DelivryMethod::all();
        $delivery_method_list_paginate = DelivryMethod::paginate(4);
        $min_charge = MinDeliveryCharge::where('id', 1)->first();
        $edit = 1;
        return view('backend.delivery_method.index', compact('delivery_method_info', 'delivery_method_list_paginate', 'delivery_method_list', 'edit','min_charge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DelivryMethod  $delivryMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->input('id');
        DelivryMethod::where('id', $id)->update($request->all());
        flash(translate('Information Saved successfully'))->success();
        return back();
    }

    public function update_delivery_method(Request $request)
    {
        //
        $id = $request->input('id');
        $delivery_method_configuration = new DelivryMethod;
        $delivery_method_configuration = $request->only(['title', 'parent_id', 'type', 'delivery_date', 'delivery_charge', 'created_by']);
        DelivryMethod::where('id', $id)->update($delivery_method_configuration);
        flash(translate('Information Updated successfully'))->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DelivryMethod  $delivryMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(DelivryMethod $delivryMethod, $id)
    {
        //
    }
    public function delete(DelivryMethod $delivryMethod, $id)
    {
        //
        DelivryMethod::where('id', $id)->delete();
        flash(translate('Information Deleted successfully'))->success();
        return redirect()->route('delivery_method_configuration.index');
    }
}
