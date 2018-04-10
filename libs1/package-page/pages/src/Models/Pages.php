<?php

namespace PackagePage\Pages\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Pages extends Model
{
    use Sluggable;

    protected $table = "pages";
    
    protected $fillable = [
        'page_categoryid','title', 'slug', 'thumbnail', 'content', 'template'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function pageCategory(){
    	return $this->belongsTo('PackagePage\Pages\Models\PageCategory','page_categoryid');
    }

    public function fields() {
	    return $this->hasMany('PackagePage\Pages\Models\PageField','page_id');
    }

    public function getContentofField($field_slug) {
    	$field = PageField::where('page_id', '=', $this->id)
	                      ->where('slug', '=', $field_slug)
	                      ->first();
    	if($field) {
    		return $field->content;
	    } else {
    		return '';
	    }
    }
}