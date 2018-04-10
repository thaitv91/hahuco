<?php

namespace PackagePage\Pages\Models;

use Illuminate\Database\Eloquent\Model;

class PageCategory extends Model
{
    protected $table = "page_category";
    
    protected $fillable = [
        'name','slug'
    ];

    public function pages(){
    	return $this->hasOne('PackagePage\Pages\Models\Pages','page_categoryid');
    }
}
