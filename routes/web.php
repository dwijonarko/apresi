<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return redirect('/home');
});


Auth::routes();
Route::get('/register', function() {
    return redirect('/login');
});
Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index');
	Route::group(['middleware' => 'can:update-profile,id'], function() {
	    Route::get('profile/users/{id}','UserController@show')->name('profile.show');
		Route::get('profile/users/{id}/edit','UserController@edit')->name('profile.edit');
		Route::match(['put', 'patch'],'profile/users/{id}','UserController@update')->name('profile.update');
    });

	Route::group(['middleware' => 'can:isAdmin'], function() {
		Route::resource('users', 'UserController');
	    Route::resource('roles', 'RoleController');
    });
});




Route::resource('locAttendances', 'LocAttendanceController');

Route::resource('locAttendances', 'LocAttendanceController');