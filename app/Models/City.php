<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "map_cities";
    
    protected $fillable = [
        'region_id', 'name', 'slug','lat', 'long'
    ];

    public function getRegion(){
    	 return $this->belongsTo('App\Models\Region','region_id');
    }

    public function getDistrict(){
         return $this->hasMany('App\Models\District','city_id');  
    }

    public function getNetwork(){
         return $this->hasMany('App\Models\Network','city_id');  
    }
}
