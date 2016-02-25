<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StorageController extends Controller
{
    public function index(){
    	return view('upload');
    }

    public function storeImage(){

   		$file = Input::file('image');
    	
    	$file_property['file'] = $file->getRealPath();
		$file_property['name'] =$file->getClientOriginalName();
		$file_property['extension'] =$file->getClientOriginalExtension();
		$file_property['size'] =$file->getSize();
		$file_property['mime'] =$file->getMimeType();

		
    }
}
