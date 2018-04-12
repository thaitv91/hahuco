<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductTerm;
use App\Models\ProductCategory;
use App\Models\Product;
use Session, Redirect;
use Spatie\Tags\Tag;

class ProductController extends Controller
{
    private $product;
    private $image;

    public function __construct() {
        $this->product = new Product;
        $this->image = new ImageFileController;
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->orderBy('created_at','DESC')->get();
		$title = "Danh sách sản phẩm";
        return view('admin.product.index', compact(['products', 'title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_default = ProductCategory::firstOrCreate(['name'=>'Default', 'slug'=>'default']);
        $term_default = ProductTerm::firstOrCreate(['name'=>'Default', 'slug'=>'default']);
        $categories = ProductCategory::get(['name', 'id']);
        $terms = ProductTerm::get(['name', 'id']);
		$title = 'Tạo mới sản phẩm';
        return view('admin.product.create', compact(['title','categories', 'terms']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        	'title'=>'required',
        ]);
        $product = $this->product;
        $product->product_category_id = $request->category;
        $product->product_term_id = $request->term;
        $product->title = $request->title;
        $product->mo_ta_san_pham = $request->mo_ta_san_pham;
        $product->short_description = $request->short_description;
        $product->view_count = 0;
	    if(!is_null($request->noi_bat)) {
		    $product->noi_bat = 1;
	    } else {
		    $product->noi_bat = 0;
	    }
        if ($request->thumbnail) {
            $product->thumbnail = $this->image->uploadImage('hahuco/uploads/products', $request->thumbnail);
        }

	    $product->save();

	    // tags save()
	    $tags = explode(",", $request->tags);
	    $product->attachTags($tags);

	    // Seo
	    $title = $request->seoable_title ? $request->seoable_title : $product->title;
	    $key = $request->keyword ? $request->keyword : '';
	    $description = $request->seoable_description ? $request->seoable_description : '';
	    $product->attachSeoAble($title, $key, $description);

        Session::flash('success', trans('admin/general.success.create'));
        return Redirect::route('admin.product');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = ProductCategory::get(['name', 'id']);
        $terms = ProductTerm::get(['name', 'id']);
        $product = $this->product->where('slug', $slug)->firstOrFail();

        // tags
        $tags = $product->tags;
        $str_tags = "";
        foreach ($tags as $tag) {
        	$str_tags .= $tag->name . ",";
        }

        // seoable
	    $seoable = $product->getSeoable();
        $seoable_title = $seoable ? $seoable->seoable_title : '';
        $keyword = $seoable ? $seoable->keyword : '';
	    $seoable_description = $seoable ? $seoable->seoable_description : '';

		$title = "Edit Sản Phẩm: " . $product->title;
        return view('admin.product.edit', compact(['title','product', 'categories', 'terms', 'str_tags', 'seoable_description', 'keyword', 'seoable_title']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $product = $this->product->where('slug', $slug)->firstOrFail();
        $product->product_category_id = $request->category;
        $product->product_term_id = $request->term;
        $product->slug = null;
        if ($product->title != $request->title)
            $request->validate(['title'=>'required']);
        $product->title = $request->title;
        $product->mo_ta_san_pham = $request->mo_ta_san_pham;
        $product->short_description = $request->short_description;
        if(!is_null($product->noi_bat)) {
	        $product->noi_bat = 1;
        } else {
	        $product->noi_bat = 0;
        }

        if ($request->thumbnail) {
            $product->thumbnail = $this->image->uploadImage('hahuco/uploads/products', $request->thumbnail);
        }

        // tags
	    $tags = explode(",", $request->tags);
        $product->syncTags($tags);

	    // seoable
	    $title = $request->seoable_title ? $request->seoable_title : $product->title;
	    $key = $request->keyword ? $request->keyword : '';
	    $description = $request->seoable_description ? $request->seoable_description : '';
	    $product->updateSeoAble($title, $key, $description);
        $product->save();

        Session::flash('success', trans('admin/general.success.edit'));
        
        return Redirect::route('admin.product.edit', ['slug' => $product->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $this->product->where('slug', $slug)->delete();
        
        Session::flash('success', trans('admin/general.success.remove'));

        return Redirect::route('admin.product');
    }
}
