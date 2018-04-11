<?php

namespace App\Http\Controllers\Frontend;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function show( $id) {
	    $news = News::where('slug', $id)->firstOrFail();
	    $title = "Tin tức: " . $news->title;
	    return view('frontend.chitiettintuc', compact(['news', 'title']));
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
