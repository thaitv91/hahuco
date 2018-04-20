<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Sluggable;
    use Searchable;
	use \Spatie\Tags\HasTags;
	use \App\Http\Traits\Seoables;

    protected $table = 'product';
    protected $guarded = array();

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function toSearchableArray()
    {
        return [
            'title'                     => $this->title,
            'slug'                      => $this->slug,
            'short_description'            =>  $this->short_description,
            'mo_ta_san_pham'            =>  $this->mo_ta_san_pham,
        ];
    }

    public function term() {
        return $this->belongsTo('App\Models\ProductTerm', 'product_term_id');
    }

    public function getTermSlug() {
    	$term = $this->term()->firstOrFail();
    	return $term->slug;
	}

	public function getTermID() {
		$term = $this->term()->firstOrFail();
		return $term->id;
	}

    public function category() {
        return $this->belongsTo('App\Models\ProductCategory', 'product_category_id');
    }

    public function relatedProducts($count = 4) {
        return $this->hasMany('App\Models\Product', 'product_term_id', 'product_term_id')
                    ->where('id', '<>', $this->id)
                    ->orderBy('created_at', 'desc')
                    ->limit($count);
    }
}
