<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndemnityProvince extends Model
{
    protected $guarded = array();

    public function districts() {

    	return $this->hasMany('App\Models\IndemnityDistrict', 'province_code', 'code');
    }
}
