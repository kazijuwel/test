<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $message = new Message;
        $message->conversation_id = $request->conversation_id;
        $message->user_id = Auth::user()->id;
        $message->message = $request->message;
        if($request->button == 'forward_customer') {
            $message->customer_view = 1;          
        }
        elseif($request->button == 'forward_seller') {
            $message->seller_view = 1; 
                        
        }
        $message->save();
        $conversation = $message->conversation;
        if ($conversation->sender_id == Auth::user()->id) {
            $conversation->receiver_viewed ="1";
        }
        elseif($conversation->receiver_id == Auth::user()->id) {
            $conversation->sender_viewed ="1";
        }
        $conversation->save();
        
        return back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // echo '<pre>'; print_r($request->all()); exit();

        $message_id = Message::where('id', $request->id)->first();

        $conversation_id = $request->conversation_id;

        $requestData['message'] = $request->message;

        if($request->button == 'forward_customer') {
            $requestData['customer_view'] = 1;            
        }
        elseif($request->button == 'forward_seller') {
            $requestData['seller_view'] = 1;
        }

        if($message_id->update($requestData)){
            $conversation = $message_id->conversation;
            $conversation->is_approved = 1;
            $conversation->save();

            flash(translate('Message Forward successfully'))->success();
            return back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
