<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;

class News extends Model
{
    protected $table = 'news';
    protected $guarded = array();
    use Sluggable;
    use Searchable;

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

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'content' => $this->content,
            'excerpt'   =>  $this->excerpt
        ];
    }

    public function category() {
        return $this->belongsTo('App\Models\NewsCategory', 'news_categoryid');
    }

    public function relatedPosts($count = 5) {

        return $this->hasMany('App\Models\News', 'news_categoryid', 'news_categoryid')
                    ->where('id', '<>', $this->id)
                    ->limit($count);
    }
}
