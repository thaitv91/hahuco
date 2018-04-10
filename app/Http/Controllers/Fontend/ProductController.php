<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($category_slug, $term_slug, $product_slug) {
    	$product = Product::where('slug', $product_slug)->firstOrFail();

    	dd($product);
    }
}
