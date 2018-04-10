<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class NewsCategory extends Model
{
    protected $table = 'news_category';
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

    public function getList() {
    	$list = News::where('news_categoryid', '=', $this->id)->orderBy('created_at','DESC')->limit(4)->get();
    	return $list;
    }

	public function getAll($count = 8) {
		$list = News::where('news_categoryid', '=', $this->id)->paginate($count);
		return $list;
	}

    public function news($count = 6) {
        return $this->hasMany('App\Models\News', 'news_categoryid')->paginate($count);
    }
}
