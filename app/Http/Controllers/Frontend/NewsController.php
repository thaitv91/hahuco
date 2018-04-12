<?php

namespace App\Http\Controllers\Frontend;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Spatie\Tags\Tag;
use SEO;

class NewsController extends Controller
{
    public function show( $id) {
	    $new = News::where('slug', $id)->firstOrFail();
	    $title = "Tin tức: " . $new->name;

	    //seoable
	    $seoable = $new->setSeoable();

	    // tag
	    $tags = $new->tags;

	    return view('frontend.chitiettintuc', compact(['new', 'title', 'tags']));
    }

	public function tags($slug) {
		$locale = app()->getLocale();
		$tag = Tag::where("slug->{$locale}", '=', $slug)->first();
		$tag_name = $tag->name;

		$news = News::withAnyTags($tag_name)->get();

		$data = [
			'title' => 'Sản phẩm Tags: ' . $tag_name,
			'news' => $news,
			'tag_name' => $tag_name
		];

		return view('frontend.tintuctags', $data);
	}

    public function listNews() {
    	$outCate = ['default', 'chuong-trinh-dao-tao'];
    	$categories = NewsCategory::whereNotIn('slug', $outCate)->get();
    	$data = [
    		'title' => "Tin tức",
		    'categories' => $categories
	    ];
		return view('frontend.news', $data);
    }

    public function listNewsOfCategory(Request $request, $category_slug) {
	    $category = NewsCategory::where('slug', '=', $category_slug)->first();
        $listNews = $category->getAll();
	    $data = [
		    'title' => "Tin tức",
		    'category' => $category,
            'listNews' =>  $listNews,
	    ];

        if ($request->ajax()) {
            return array(
                'html' => view('frontend.ajax_news_loadmore', $data)->render(),
                'nextPageUrl' => $listNews->nextPageUrl()
            );
        }

	    return view('frontend.news_category', $data);
    }
}
