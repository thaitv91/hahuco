<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    protected $table = "map_networks";
    
    protected $fillable = [
        'region_id', 'city_id', 'district_id', 'name', 'address', 'phone', 'content', 'slug','lat', 'long', 'type' , 'scope'
    ];

    public function getRegion(){
    	 return $this->belongsTo('App\Models\Region','region_id');
    }

    public function getCity(){
    	 return $this->belongsTo('App\Models\City','city_id');
    }

    public function getDistrict(){
    	 return $this->belongsTo('App\Models\District','district_id');
    }
}
