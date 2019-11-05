<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    protected $fillable = ['property_id','main_features','business_communication','security','other_facilities'];
}
