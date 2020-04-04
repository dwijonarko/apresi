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
         
        if(!$user)return response()->json(['status' => 'failed', 'data' => 'Username tidak ditemukan']);
        
        if (    !Hash::check($request->password, $user->password)) return response()->json(['status' => 'failed', 'data' => 'Password Anda Salah']);
        
        return response()->json(['status' => 'success', 'data' => $user->createToken($request->token)->plainTextToken]);
    }
}
