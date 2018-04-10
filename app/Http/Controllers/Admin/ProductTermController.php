<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductTerm;
use App\Models\ProductCategory;
use App\Models\Product;
use Session, Redirect;

class ProductTermController extends Controller
{
    private $term;
    private $image;

    public function __construct() {
        $this->term = new ProductTerm;
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
        $terms = $this->term->get();

        return view('admin.product_term.index', compact(['terms']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $category = new ProductCategory;
        // $category_default = $category->firstOrCreate(['name'=>'Default', 'slug'=>'default']);
        $term_default = $this->term->firstOrCreate(['name'=>'Default', 'slug'=>'default']);
        
        return view('admin.product_term.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $term = $this->term;
        $term->name = $request->name;
        $term->description = $request->description;
        if ($request->thumbnail) {
            $term->thumbnail = $this->image->uploadImage('images/product_term', $request->thumbnail);
        }

        $term->save();

        Session::flash('success', trans('admin/general.success.create'));

        return Redirect::route('admin.product.term');
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
        $term = $this->term->where('slug', $slug)->firstOrFail();

        return view('admin.product_term.edit', compact(['term']));
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
        $term = $this->term->where('slug', $slug)->firstOrFail();
        $term->slug = null;
        if ($request->name != $term->name) 
            $request->validate(['name'=>'required']);
        $term->name = $request->name;
        $term->description = $request->description;
        if ($request->thumbnail) {
            $term->thumbnail = $this->image->uploadImage('images/product_term', $request->thumbnail);
        }
        $term->save();

        Session::flash('success', trans('admin/general.success.edit'));

        return Redirect::route('admin.product.term.edit', ['slug' => $term->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $term = $this->term->where('slug', $slug)->firstOrFail();
        $term_default = $this->term->where('slug', 'default')->first();
        Product::where('product_term_id', $term->id)->update(['product_term_id'=>$term_default->id]);
        $term->delete();

        Session::flash('success', trans('admin/general.success.remove'));

        return Redirect::route('admin.product.term');
    }

    public function listProduct($term_slug) {
        $term = ProductTerm::where('slug', $term_slug)->firstOrFail();
        $products = Product::where('product_term_id', $term->id)->get();

        return view('admin.product.index', compact(['products']));
    }
}
