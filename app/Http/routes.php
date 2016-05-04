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

//DEFAULT
Route::get('/','PagesController@index');


//Member and Map related routes...

//needs to be under auth middlware


Route::post('/map','MemberController@PostMap');
Route::get('/map','MemberController@GetMap');


//Function to download the image from storage...
Route::get('/storage/app/members/{id}',function($id){
	$path = storage_path().'/app/members/' . $id.'.jpg';    
    return Response::download($path);
});

//PHOTOS-API CALL ROUTES

Route::get('/getalbums_recent','PhotoController@RecentAlbumPhotos');
Route::post('/getalbums_recent','PhotoController@GetRecentAlbumPhotos');
Route::get('/getalbums_photos/{album_name}','PhotoController@AllAlbumPhotos');
Route::post('/getalbums_photos/{album_name}','PhotoController@GetAllAlbumPhotos');
Route::post('/getalbums_photos/',function()
	{
		return redirect("/getalbums_recent");
	});

//PHOTOS-CRUD
    

    
Route::get('/storage/app/photos/{id}.jpg',function($id){
	$path = storage_path().'/app/photos/' . $id.'.jpg';    
    return Response::download($path);
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


Route::group(['middleware' => 'auth'], function () {
    Route::post('/addmember','MemberController@PostCreate');
    Route::get('/addmember','MemberController@GetCreate');
    Route::get('/editmember','MemberController@GetEdit');
    Route::get('/editmember/{id}','MemberController@GetMemberEdit');
    Route::post('/editmember/{id}','MemberController@PostMemberEdit');
    Route::get('/addphoto','PhotoController@GetAdd' );
    Route::post('/addphoto','PhotoController@PostAdd' );
    Route::get('/editphoto/{id}','PhotoController@GetEdit' );
    Route::post('/editphoto/{id}','PhotoController@PostEdit' );
    //Route::post('/deletephoto/{id}', 'PhotoController@PostDelete');
    Route::get('/deletephoto/{id}','PhotoController@GetDelete'); 
});
