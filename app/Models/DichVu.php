<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;
use Spatie\Tags\HasTags;

class DichVu extends Model
{
	protected $table = 'dichvu';

	use Sluggable;
	use Searchable;
	use HasTags;
	use \App\Http\Traits\Seoables;

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
			'name'                     => $this->name,
			'slug'                      => $this->slug,
			'excerpt'            =>  $this->excerpt,
			'content'        =>  $this->content
		];
	}
}
