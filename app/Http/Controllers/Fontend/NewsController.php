<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function show($news_slug) {
    	$news = News::where('slug', $news_slug)->firstOrFail();

    	dd($news);
    }
}
