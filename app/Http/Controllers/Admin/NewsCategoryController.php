<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Models\News;
use Session, Redirect;

class NewsCategoryController extends Controller
{
    private $category;

    public function __construct() {
        $this->category = new NewsCategory;
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

        return view('admin.news_category.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_default = $this->category->firstOrCreate(['name'=>'Default', 'slug'=>'default']);

        return view('admin.news_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|unique:news_category']);
        $category = $this->category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        Session::flash('success', trans('admin/general.success.create'));

        return Redirect::route('admin.news.category');
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

        return view('admin.news_category.edit', compact(['category']));
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
            $request->validate(['name'=>'required|unique:news_category']);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        Session::flash('success', trans('admin/general.success.edit'));

        return Redirect::route('admin.news.category');
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
        
        News::where('news_categoryid', $category->id)->update(['news_categoryid'=>$category_default->id]);
        $category->delete();

        Session::flash('success', trans('admin/general.success.remove'));

        return Redirect::route('admin.news.category');
    }
}
