<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageCategory extends Model
{
    protected $table = "page_category";
    
    protected $fillable = [
        'name','slug'
    ];

    // public function pages(){
    // 	return $this->hasOne('App\Models\Pages','page_categoryid');
    // }

    public function pages() {
    	return $this->hasMany('App\Models\Pages', 'page_categoryid');
    }
}
