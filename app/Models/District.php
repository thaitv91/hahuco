<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "map_districts";
    
    protected $fillable = [
        'city_id', 'name', 'slug','lat', 'long'
    ];

    public function getCity(){
    	 return $this->belongsTo('App\Models\City','city_id');
    }

    public function getNetwork(){
         return $this->hasMany('App\Models\Network','district_id');  
    }
}
