<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['name','location','rent','area','bed','bath','purpose','type','description','image',];

    function amenities(){
        return $this->hasOne('App\Amenities');
    }
    public function message()
    {
        return $this->hasMany('App\Message','_id')->orderBy('updated_at','desc');
    }
}
