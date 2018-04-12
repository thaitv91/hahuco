<?php

namespace App\Http\Controllers\Frontend;

use App\Models\DichVu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Tags\Tag;
use SEO;

class DichvuController extends Controller
{
	public function show($id) {

		$dichvu = DichVu::where('slug', '=', $id)->first();

		//seoable
		$seoable = $dichvu->setSeoable();

		$tags = $dichvu->tags;

		$data = [
			'title' => 'Dịch vụ: ' . $dichvu->name,
			'dichvu' => $dichvu,
			'tags' => $tags
		];

		return view('frontend.chitietdichvu', $data);

	}

	public function tags($slug) {
		$locale = app()->getLocale();
		$tag = Tag::where("slug->{$locale}", '=', $slug)->first();
		$tag_name = $tag->name;

		$dichvu = DichVu::withAnyTags($tag_name)->get();

		$data = [
			'title' => 'Dịch Vụ Tags: ' . $tag_name,
			'dichvu' => $dichvu,
			'tag_name' => $tag_name
		];

		return view('frontend.dvtags', $data);
	}
}
