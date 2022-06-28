<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserCollection;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function info($id)
    {
        return new UserCollection(User::where('id', $id)->get());
    }

    public function updateName(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->update([
            'name' => $request->name
        ]);
        return response()->json([
            'message' => 'Profile information has been updated successfully'
        ]);
    }
    public function userList(){
       $all_user = new UserCollection(User::all());
       return  $all_user;
    }
}
