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
Route::get('/', function () {
    return view('welcome');
});



//Member and Map related routes...

//needs to be under auth middlware
Route::post('/addmember','MemberController@PostCreate');
Route::get('/addmember','MemberController@GetCreate');
Route::get('/editmember','MemberController@GetEdit');

Route::post('/map','MemberController@PostMap');
Route::get('/map','MemberController@GetMap');


//Function to download the image from storage...
Route::get('/storage/app/members/{id}',function($id){
	$path = storage_path().'/app/members/' . $id.'.jpg';    
    return Response::download($path);
});

//PHOTOS-API CALL ROUTES
Route::post('/getalbums_recent','PhotoController@GetRecentAlbumPhotos');
Route::post('/getalbums_photos/{album_name}','PhotoController@GetAllAlbumPhotos');
Route::post('/getalbums_photos/',function()
	{
		return redirect("/getalbums_recent");
	});

//PHOTOS-CRUD
    Route::get('/addphoto','PhotoController@GetAdd' );
    Route::post('/addphoto','PhotoController@PostAdd' );

    Route::get('/editphoto/{id}','PhotoController@GetEdit' );
    Route::post('/editphoto/{id}','PhotoController@PostEdit' );

    Route::get('/deletephoto/{id}', 'PhotoController@GetDelete');

    
    Route::get('/storage/app/photos/{id}',function($id){
	$path = storage_path().'/app/photos/' . $id.'.jpg';    
    return Response::download($path);
    });


