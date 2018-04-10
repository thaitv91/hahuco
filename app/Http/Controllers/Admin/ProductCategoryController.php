<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductTerm;
use App\Models\Product;
use Session, Redirect;

class ProductCategoryController extends Controller
{
    private $category;
    private $image;

    public function __construct() {
        $this->category = new ProductCategory;
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
        $categories = $this->category->get();

        return view('admin.product_category.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_default = $this->category->firstOrCreate(['name'=>'Default', 'slug'=>'default']);

        return view('admin.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|unique:product_category']);
        $category = $this->category;
        $category->name = $request->name;
        $category->description = $request->description;
        if ($request->thumbnail) {
            $category->thumbnail = $this->image->uploadImage('images/category', $request->thumbnail);
        }
        $category->save();

        Session::flash('success', trans('admin/general.success.create'));

        return Redirect::route('admin.product.category');
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
        $category = $this->category->where('slug', $slug)->firstOrFail();

        return view('admin.product_category.edit', compact(['category']));
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
        $category = $this->category->where('slug', $slug)->firstOrFail();
        $category->slug = null;
        if ($category->name != $request->name)
            $request->validate(['name'=>'required|unique:product_category']);
        $category->name = $request->name;
        $category->description = $request->description;
        if ($request->thumbnail) {
            $category->thumbnail = $this->image->uploadImage('images/category', $request->thumbnail);
        }
        $category->save();

        Session::flash('success', trans('admin/general.success.edit'));

        return Redirect::route('admin.product.category.edit', ['slug' => $category->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = $this->category->where('slug', $slug)->firstOrFail();
        $category_default = $this->category->where('slug', 'default')->firstOrFail();
        
        // $term = ProductTerm::where('product_category_id', $category->id);
        // $term_default = ProductTerm::where('slug', 'default')->first();

        // if ($term->exists()) {
        //     foreach ($term->get() as $key => $value) {
        //         Product::where('product_term_id', $value->id)->update(['product_term_id'=>$term_default->id]);
        //     }
        // }

        // $term->update(['product_category_id'=>$category_default->id]);
        Product::where('product_category_id', $category->id)->update(['product_category_id' => $category_default->id]);
        $category->delete();

        Session::flash('success', trans('admin/general.success.remove'));

        return Redirect::route('admin.product.category');
    }

    public function listProduct($category_slug) {
        $category = ProductCategory::where('slug', $category_slug)->firstOrFail();
        $products = Product::where('product_category_id', $category->id)->get();

        return view('admin.product.index', compact(['products']));
    }
}
