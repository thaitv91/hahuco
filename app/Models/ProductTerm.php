<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductTerm extends Model
{
    protected $table = 'product_term';
    protected $guarded = array();
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category() {
    	return $this->belongsTo('App\Models\ProductCategory', 'product_category_id');
    }

    public function products() {
        return $this->hasMany('App\Models\Product', 'product_term_id');
    }

    public function getProducts($count = 8) {
        return $this->hasMany('App\Models\Product', 'product_term_id')->limit($count)->get();
    }
}
