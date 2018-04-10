<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = "pages";
    
    protected $fillable = [
        'page_categoryid','title', 'slug', 'thumbnail', 'template'
    ];
    public function pageCategory(){
    	return $this->belongsTo('App\Models\PageCategory','page_categoryid');
    }
}
