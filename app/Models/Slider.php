<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = array();

    public function images() {
    	return $this->hasMany('App\Models\SliderImage', 'slider_id');
    }
}
