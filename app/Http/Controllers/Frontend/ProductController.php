<?php

namespace App\Http\Controllers\Frontend;

use App\Events\ViewProductHandler;
use App\Models\ProductTerm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory as Category;
use App\Models\ProductTerm as Term;
use App\Models\Product;
use App\Models\ProductContact as Contact;
use Spatie\Tags\Tag;
use SEO;

class ProductController extends Controller
{

	public function index() {
		$categories = Category::where('slug', '=', 'bao-hiem-ca-nhan')->first();
		$terms = Term::all();
        return view('frontend.sanpham', compact(['categories', 'terms']));
	}

	public function show($product_slug) {
		$product = Product::where('slug', $product_slug)->firstOrFail();
		$title = "Sản phẩm: " . $product->title;

		//seoable
		$seoable = $product->setSeoable();
		$term = ProductTerm::where('id','=', $product->product_term_id)->first();
		event( new ViewProductHandler($product));
		$tags = $product->tags;
		return view('frontend.chitietsanpham', compact(['product', 'title', 'tags', 'term']));
    }

	public function term($term_slug) {
		$term = Term::where('slug', $term_slug)->firstOrFail();
		$title = "Danh mục sản phẩm: " . $term->name;
		return view('frontend.danhsachsanpham', compact(['term', 'title']));
	}


    public function tags($slug) {
	    $locale = app()->getLocale();
		$tag = Tag::where("slug->{$locale}", '=', $slug)->first();
		$tag_name = $tag->name;

		$products = Product::withAnyTags($tag_name)->get();

		$data = [
			'title' => 'Sản phẩm Tags: ' . $tag_name,
			'products' => $products,
			'tag_name' => $tag_name
		];

		return view('frontend.sptags', $data);
    }

    public function showMoreProducts($term_id) {
        $term = Term::where('id', $term_id)->firstOrFail();
        $showedProducts = $term->getProducts();
        $ignoreIds = array();
        
        foreach ($showedProducts as $key => $product)
            array_push($ignoreIds, $product->id);

        $products = Product::where('product_term_id', $term_id)->whereNotIn('id', $ignoreIds)->paginate(8);

        return [
                    'html'  =>  view('widgets.ajax_show_more_product', compact(['term', 'products']))->render(),
                    'next_page_url' =>  $products->nextPageUrl()
                ];
    }

    public function storeContact(Request $request) {
        $request->validate([
            'name'      =>  'required',
            'email'     =>  'required | email',
            'phone'     =>  'required',
            'content'   =>  'required'
        ]);

        $contact = new Contact;
        $contact->product_id = $request->product_id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->content = $request->content;
        $contact->status = 0;
        $contact->save();

        \Session::flash('success', 'Your contact was sent successfully');

        return \Redirect::back();
    }
}
