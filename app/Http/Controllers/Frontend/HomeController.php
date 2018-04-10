<?php

namespace App\Http\Controllers\Frontend;

use App\Models\News;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$testimonials = Testimonial::all();
		$partners = Partner::all();
		$news = News::OrderBy('created_at', 'desc')->get();
		$data = [
			'title' => 'Trang chu',
			'testimonials' => $testimonials,
			'partners' => $partners,
			'news' => $news
		];
		return view('frontend.home', $data);
	}

	public function cskhIndex() 
	{
		$testimonials = Testimonial::all();
		$data = [
			'title' => 'Trang chu',
			'testimonials' => $testimonials
		];
		return view('frontend.chamsockhachhang', $data);
	}

	public function search(Request $request) 
	{
		$keyword = $request->keyword;
		$results = array();
		$result_News = News::search($keyword)->paginate(12);
		$result_Products = Product::search($keyword)->paginate(12);

		return view('frontend.ketquatimkiem')->with([
			'keyword'			=>	$keyword,
			'result_News'		=>	$result_News,
			'result_Products'	=>	$result_Products
		]);
	}

	public function searchNews($keyword = '') {
		$result_News = News::search($keyword)->paginate(12);

		return [
			'html' =>	view('frontend.ajax_search_news_loadmore', compact(['result_News']))->render(),
			'next_page_url' => $result_News->nextPageUrl()
		];
	}

	public function searchProducts($keyword = '') {

		$result_Products = Product::search($keyword)->paginate(12);
		return [
			'html' => view('frontend.ajax_search_product_loadmore', compact('result_Products'))->render(),
			'next_page_url' => $result_Products->nextPageUrl()
		];
	}
}
