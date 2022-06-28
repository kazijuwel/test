<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AddressCollection;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addresses($id)
    {
        return new AddressCollection(Address::where('user_id', $id)->get());
    }

    public function createShippingAddress(Request $request)
    {
        $address = new Address;
        $address->user_id = $request->user_id;
        $address->address = $request->address;
        $address->country = $request->country;
        $address->city = $request->city;
        $address->postal_code = $request->postal_code;
        $address->phone = $request->phone;
        $address->save();

        return response()->json([
            'message' => 'Shipping information has been added successfully'
        ]);
    }

    public function deleteShippingAddress($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return response()->json([
            'message' => 'Shipping information has been added deleted'
        ]);
    }

    public function set_default($id){
      
        foreach (Auth::user()->addresses as $key => $address) {
            $address->set_default = 0;
            $address->save();
        }
        $address = Address::findOrFail($id);
        $address->set_default = 1;
        $address->save();

        return response()->json([
            'message' => 'Shipping Address Set Default has been added successfully'
        ]);
    }
}
