<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/checkin', 'AttendanceController@checkin');
    Route::get('/checkin', 'AttendanceController@user_checkin');
});


Route::post('/login', 'UserController@login');