<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/addmember','MemberController@PostCreate');
Route::get('/addmember','MemberController@GetCreate');

Route::post('/map','MemberController@PostMap');
Route::get('/map','MemberController@GetMap');

//Function to download the image from storage
Route::get('/storage/app/members/{id}',function($id){
	$path = storage_path().'/app/members/' . $id.'.jpg';    
    return Response::download($path);
});