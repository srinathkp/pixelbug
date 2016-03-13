<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use Response;
use App\Member;
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

        $member = new Member;
        $member->member_name = $request->name;
        $member->member_city = $request->city;
        $member->member_pincode = $request->pincode;
        $member->member_contact = $request->contact;
        $member->member_email = $request->email;
        $member->save();

        $member_id = Member::latest()->pluck('id'); 
    	//Yaaay!!
    	Storage::disk('local')->put('members/'.$member_id.'.jpg', File::get($file));
        return redirect('/addmember');
    }

    public function GetMap(){
        $members = Member::all();
        //$storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
    	//return $storagePath;
        foreach ($members as $member) {
            //$member->profile_url = $storagePath.'members/'.$member->id.'.jpg';
            //return $member->profile_url;
            //$member->profile_pic = Response::download($member->profile_url);
            $location_json = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$member->member_city.','.$member->member_pincode);
            $location = json_decode($location_json,true);
            $member->map_url = 'https://maps.googleapis.com/maps/api/staticmap?center='.$location['results'][0]['geometry']['location']['lat'].' '.$location['results'][0]['geometry']['location']['lng'].'&zoom=12&size=400x500&maptype=roadmap&markers=color:blue|'.$location['results'][0]['geometry']['location']['lat'].' '.$location['results'][0]['geometry']['location']['lng'];
        }
        //return $members;
        return view('pages.mapmember',compact('members'));
    }

}
