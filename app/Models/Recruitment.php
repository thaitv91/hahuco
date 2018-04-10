<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $guarded = array();

    public function job() {
    	return $this->belongsTo('App\Models\RecruitmentJob', 'job_id');
    }

    public function place() {
    	return $this->belongsTo('App\Models\RecruitmentPlace', 'place_id');
    }

    public function relatedJob($count = 5) {
    	return $this->hasMany('App\Models\Recruitment', 'job_id', 'job_id')
    				->where('id', '<>', $this->id)
    				->orderBy('created_at', 'desc')
    				->limit($count);
    }

    public function relatedPlace($count = 5) {
        return $this->hasMany('App\Models\Recruitment', 'place_id', 'place_id')
                    ->where('id', '<>', $this->id)
                    ->orderBy('created_at', 'desc')
                    ->limit($count);
    }
}
