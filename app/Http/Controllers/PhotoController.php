<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;
use Storage;
use File;
use Response;


class PhotoController extends Controller
{
   
    public function GetAdd()
    {
                return view('pages.addphoto');
    }

    public function PostAdd(Request $request)
    {

$file = $request->file('photo');

        $photo = new Photo;
        $photo->photo_name = $request->photo_name;
        $photo->album = $request->album;
        $photo->save();

        $photo_id = Photo::latest()->pluck('id'); 
        //Yaaay!!
        Storage::disk('local')->put('photos/'.$photo_id.'.jpg', File::get($file));
        return redirect('/addphoto');




    }

    
  
     
    public function GetEdit($id)

    {
            $photo=Photo::find($id);

                return view('pages.editphoto')->with('photo',$photo);
         }

    public function PostEdit(Request $request,$id)
    {
            $photo=Photo::findorFail($id);
$photo->photo_name=$request->photo_name;
$photo->album=$request->album;
$photo->save();

                return view('pages.editphoto')->with('photo',$photo);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GetDelete($id)
    {   //return 1;
        Storage::delete('photos/'.$id.'.jpg');            
        $photo = Photo::find($id);
        $photo->delete();
        return redirect('/getalbums_recent');
    
    }

    public function GetRecentAlbumPhotos()
    {


$albums=Photo::distinct()->orderBy('id','desc')->take(10)->lists('album');
// echo json_encode($albums);
 
if($albums)
{

    $data['code']=200;
 $data['description']='success';
       

 $count=0;

foreach ($albums as $album) 
{

      $data['album'][$count]=Photo::getalbums_all($album)->take(1)->all();
      $count++;

}
}
else
{
    $data['code']=400;
 $data['description']='request failed';
       
}
echo json_encode($data);

    }

public function AllAlbumPhotos($album_name)
{
      $photocount=Photo::getalbums_all($album_name)->count();
      $photoid=Photo::getalbums_all($album_name)->lists('id');

return view("pages.getalbums_photos")->with('album_name',$album_name)
                                     ->with('count',$photocount)
                                     ->with('photoid',$photoid);

}

public function RecentAlbumPhotos()
{

return view("pages.getalbums_recent");

}





public function GetAllAlbumPhotos($album_name)
    {



if($album_name=="")
{

        $data['code']=401;
        $data['description']='no input';
}

else
{
      $photos=Photo::getalbums_all($album_name);


    if($photos)
    {
        $data['code']=200;
        $data['description']='success';
        $data['photos']=$photos;

    }

    else
    {

        $data['code']=400;
        $data['description']='request failed';
    }

}
      echo json_encode($data);




    }

}
