<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function checkin(Request $request){
        $data = $request->validate([
            'user_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'type' => 'required',
            'token'=>'required'
        ]);
        
        $input = $request->all();
    
        $locAttendance = \App\Models\LocAttendance::create($input);
         
        return response()->json(['status' => 'success', 'data' => $locAttendance]);
    }

    public function user_checkin(Request $request){
            $user_id= $request->user()->id;
            $attendances = \App\Models\LocAttendance::where('user_id',$user_id)->with('user')->get();
            return response($attendances);
    }
}
