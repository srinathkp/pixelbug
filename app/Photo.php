<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    

public static function getalbums_all($album_name)
{
	return self::where('album',$album_name)->orderBy('id','desc')->get();
}


}
