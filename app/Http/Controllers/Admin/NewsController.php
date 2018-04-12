<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Session, Redirect;

class NewsController extends Controller
{
    private $news;
    private $image;

    public function __construct() {
        $this->news = new News;
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
        $title = 'News';
        $news = $this->news->orderBy('created_at', 'DESC')->get();

        return view('admin.news.index', compact(['title', 'news']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'News | Create';
        $category_default = NewsCategory::firstOrCreate(['name'=>'Default', 'slug'=>'default']);
        $category = new NewsCategory; 
        $categories = $category->get(['id', 'name']);

        return view('admin.news.create', compact(['title', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//dd($request->excerpt);
        $request->validate(['name'=>'required',
                            'excerpt'   =>  'required',
                            'content'   =>  'required'
                        ]);
        $news = $this->news;
        $news->name = $request->name;
        $news->news_categoryid = $request->category;
	    $news->excerpt = $request->excerpt;
        $news->content = $request->content;
        if ($request->thumbnail) {
            $news->thumbnail = $this->image->uploadImage('images/news', $request->thumbnail);
        }
        $news->save();

	    // tags save()
	    $tags = explode(",", $request->tags);
	    $news->attachTags($tags);

	    // Seo
	    $title = $request->seoable_title ? $request->seoable_title : $news->title;
	    $key = $request->keyword ? $request->keyword : '';
	    $description = $request->seoable_description ? $request->seoable_description : '';
	    $news->attachSeoAble($title, $key, $description);

        Session::flash('success', trans('admin/general.success.create'));

        return Redirect::route('admin.news');
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
        $title = 'News | Edit';
        $news = $this->news->where('slug', $slug)->firstOrFail();
        $category = new NewsCategory; 
        $categories = $category->get(['id', 'name']);

	    // tags
	    $tags = $news->tags;
	    $str_tags = "";
	    foreach ($tags as $tag) {
		    $str_tags .= $tag->name . ",";
	    }

	    // seoable
	    $seoable = $news->getSeoable();
	    $seoable_title = $seoable ? $seoable->seoable_title : '';
	    $keyword = $seoable ? $seoable->keyword : '';
	    $seoable_description = $seoable ? $seoable->seoable_description : '';

        return view('admin.news.edit', compact(['title', 'news', 'categories', 'str_tags', 'seoable_description', 'keyword', 'seoable_title']));
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
        $request->validate(['name'=>'required',
                            'excerpt'   =>  'required',
                            'content'   =>  'required'
                        ]);
        
        $news = $this->news->where('slug', $slug)->firstOrFail();
        $news->slug = null;
        $news->news_categoryid = $request->category;
        $news->name = $request->name;
        $news->excerpt = $request->excerpt;
        $news->content = $request->content;
        if ($request->thumbnail) {
            $news->thumbnail = $this->image->uploadImage('images/news', $request->thumbnail);
        }
        $news->save();

	    // tags
	    $tags = explode(",", $request->tags);
	    $news->syncTags($tags);

	    // seoable
	    $title = $request->seoable_title ? $request->seoable_title : $news->title;
	    $key = $request->keyword ? $request->keyword : '';
	    $description = $request->seoable_description ? $request->seoable_description : '';
	    $news->updateSeoAble($title, $key, $description);

        Session::flash('success', trans('admin/general.success.edit'));

        return Redirect::route('admin.news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $news = $this->news->where('slug', $slug)->firstOrFail();
        $news->delete();

        Session::flash('success', trans('admin/general.success.remove'));

        return Redirect::route('admin.news');
    }
}
