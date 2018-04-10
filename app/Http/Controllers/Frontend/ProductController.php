<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory as Category;
use App\Models\ProductTerm as Term;
use App\Models\Product;
use App\Models\ProductContact as Contact;

class ProductController extends Controller
{
	public function index() {
		$categories = Category::where('slug', '=', 'bao-hiem-ca-nhan')->first();
		$terms = Term::all();
        return view('frontend.sanpham', compact(['categories', 'terms']));
	}

    public function show($product_slug) {
        $product = Product::where('slug', $product_slug)->firstOrFail();
        $data = [
        	"title" => "Sản phẩm: " . $product->title,
	        "product" => $product
        ];
        return view('frontend.chitietsanpham', $data);
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
