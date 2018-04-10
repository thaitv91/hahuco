<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Sluggable;
    use Searchable;

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
            'mo_ta_san_pham'            =>  $this->mo_ta_san_pham,
            'doi_tuong_bao_hiem'        =>  $this->doi_tuong_bao_hiem,
            'pham_vi_bao_hiem'          =>  $this->pham_vi_bao_hiem,
            'doi_tuong_kh'      =>  $this->doi_tuong_kh,
            'ho_so'                     =>  $this->ho_so,
            'thong_tin'                 =>  $this->thong_tin,
            'hotline'                  =>  $this->hotline,
            'quyen_loi_bao_hiem'        =>  $this->quyen_loi_bao_hiem
        ];
    }

    public function term() {
        return $this->belongsTo('App\Models\ProductTerm', 'product_term_id');
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
