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
            'token'=>'required',
            
        ]);

        $image_front='front_'.$request->user_id.'_'.time();
        $image_back='back_'.$request->user_id.'_'.time();

        $input = $request->all();
        $input['image_front']=$this->upload_attachments($request->image_front,$image_front);    
        $input['image_back']=$this->upload_attachments($request->image_back,$image_back);    
        $locAttendance = \App\Models\LocAttendance::create($input);
         
        return response()->json(['status' => 'success', 'data' => $locAttendance]);
    }

    public function user_checkin(Request $request){
            $user_id= $request->user()->id;
            $attendances = \App\Models\LocAttendance::where('user_id',$user_id)->with('user')->orderBy('id','desc')->take(5)->get();
            return response($attendances);
    }

    protected function upload_attachments($user_image,$name){
        $image = preg_replace('/^data:image\/\w+;base64,/', '', $user_image);
        $extension = explode(';', $user_image)[0];
        $extension = explode('/', $extension)[1]; // png or jpg etc
        $imageName = ('uploads/attachments/').$name.'.'.$extension;
        \File::put( $imageName, base64_decode($image));
        return $imageName;
    }
}
