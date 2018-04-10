<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "map_regions";
    
    protected $fillable = [
        'name', 'slug','lat', 'long'
    ];

    public function getCity(){
         return $this->hasMany('App\Models\City','region_id');  
    }

    public function getNetwork(){
         return $this->hasMany('App\Models\Network','region_id');  
    }
}
