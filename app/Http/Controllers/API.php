<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Member;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class API extends Controller
{
    public function create(Request $request)
    {
        //return $request;
        $member = new Member;
    	$member->member_name = $request->name;
    	$member->member_city = $request->city;
    	$member->member_pincode = $request->pincode;
    	$member->member_contact = $request->contact;
    	$member->member_email = $request->email;
    	$member->save();
    	
    }
}
