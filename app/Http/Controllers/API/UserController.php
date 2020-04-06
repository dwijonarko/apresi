<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //


    public function login(Request $request)
    {
        $data = $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'token'=>'required'
        ]);
        
        $user = User::where('username', $request->username)->first();
         
        if(!$user)return response()->json(['errors' => 'Username tidak ditemukan']);

        if (    !Hash::check($request->password, $user->password)) return response()->json(['errors' => 'Password salah']);
        
        return response()->json(['errors' => false, 'token' => $user->createToken($request->token)->plainTextToken]);
    }
}
