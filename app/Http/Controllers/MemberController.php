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
        $member->member_address = $request->address;
        //$member->member_pincode = $request->pincode;
        $member->member_contact = $request->contact;
        $member->member_email = $request->email;
        $member->member_dob = $request->dob;
        $member->member_fb = $request->fb;
        $member->member_photolink = $request->photolink;
        $member->member_description = $request->description;
        $member->save();
        
        $member_id = Member::latest()->pluck('id'); 
        if($file)
            Storage::disk('local')->put('members/'.$member_id.'.jpg', File::get($file));
        else
            Storage::disk('local')->put('members/'.$member_id.'.jpg','no.png');
        return redirect('/addmember');
    }

    public function PostMap(){
        $data = [];
        $members = Member::orderBy('member_rank','ASC')->get();
                if($members){
            
            foreach ($members as $member) {
                if(!($member->member_dplink)){
                $location_json = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($member->member_address));
                //return $location_json;
                $location = json_decode($location_json,true);
                $member->map_url = 'https://maps.googleapis.com/maps/api/staticmap?center='.$location['results'][0]['geometry']['location']['lat'].' '.$location['results'][0]['geometry']['location']['lng'].'&zoom=12&size=400x500&maptype=roadmap&markers=color:red|'.$location['results'][0]['geometry']['location']['lat'].' '.$location['results'][0]['geometry']['location']['lng'];
                    Member::where('id',$member->id)->update(['member_dplink'=>$member->map_url]);
                }
                else $member->map_url = $member->member_dplink;
            }
            $data['code'] = 200;
            $data['status'] = 'success :)';
            $data['members'] = $members;
            //return view('pages.mapmember',compact('members'));
        }
        else{
            $data['code'] = 400;
            $data['status'] = 'No records found :(';
        }

        return json_encode($data);
    }

    public function GetMap(){
        return view('pages.map');
    }

    public function GetEdit(){
        return view('pages.editmap');
    }

    public function GetMemberEdit($id){
        $member = Member::where('id',$id)->first();
        $next_id = $member->id+1; 
        return view('pages.editmember',compact('member'))->with(['next_id'=>$next_id]);   
    }

    public function PostMemberEdit($id,Request $request){
        $file = $request->file('profile_pic');
        Member::where('id',$id)
              ->update([
                        'member_name' => $request->name,
                        'member_address' => $request->address,
                        //'member_pincode' => $request->pincode,
                        'member_contact' => $request->contact,
                        'member_email' => $request->email,
                        'member_dob' => $request->dob,
                        'member_fb' => $request->fb,
                        'member_photolink' => $request->photolink,
                        'member_description' => $request->description,
                        ]);
        //Storage::disk('local')->delete('members/'.$id.'.jpg');      
        Storage::disk('local')->put('members/'.$id.'.jpg', File::get($file));
        return redirect('/editmember');
    }
}
