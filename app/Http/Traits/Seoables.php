<?php

namespace App\Http\Traits;

use InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use SEO;

trait Seoables
{
	// thêm mới SEO - khi create mới 1 bài viết
	public function attachSeoAble($title, $keyword, $description)
	{
		$seoable = new \App\Models\Seoables();
		$seoable->seoable_id = $this->id;
		$seoable->seoable_type = $this->getMorphClass();
		$seoable->keyword = $keyword;
		$seoable->seoable_description = $description;
		$seoable->seoable_title = $title;

		$seoable->save();
	}


	public function updateSeoAble($title, $keyword, $description)
	{
		$seoable = $this->getSeoable();
		if(!$seoable) {
			$seoable = new \App\Models\Seoables();
		}
		$seoable->seoable_id = $this->id;
		$seoable->seoable_type = $this->getMorphClass();
		$seoable->keyword = $keyword;
		$seoable->seoable_description = $description;
		$seoable->seoable_title = $title;

		$seoable->save();
	}

	// Get Seoable của 1 bai viet
	public function getSeoable() {
		$seoable = \App\Models\Seoables::where('seoable_type', '=', $this->getMorphClass())
			->where('seoable_id', '=', $this->id)
			->first();

		return $seoable;
	}

	// Get Seoable của 1 bai viet
	public function setSeoable($image = '') {
		$seoable = \App\Models\Seoables::where('seoable_type', '=', $this->getMorphClass())
		                               ->where('seoable_id', '=', $this->id)
		                               ->first();
		$image = $image == '' ? $this->thumbnail : $image;
		if(isset($this->title)) {
			$title = $this->title;
		} else {
			$title = $this->name;
		}
		$seotitle = $seoable ? $seoable->seoable_title : $title;
		$seodes = $seoable ? $seoable->seoable_description : $this->excerpt;

		SEO::setTitle($seotitle);
		SEO::setDescription($seodes);
		SEO::opengraph()->addProperty('type', 'content');
		SEO::opengraph()->addProperty('description', $seodes);
		SEO::opengraph()->addImage( env('APP_URL') . '/'. $image);
	}
}
