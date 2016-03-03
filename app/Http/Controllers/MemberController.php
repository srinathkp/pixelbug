<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function GetCreate(){
    	return view('pages.addmember');
    }

    //Function to store a member
    public function PostCreate(Request $request){
    	$file = $request->file('profile_pic');
    	//Yaaay!!
    	Storage::disk('local')->put('members/'.$request->name.'.jpg', File::get($file));
    }

}
