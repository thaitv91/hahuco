<?php

namespace App\Http\Controllers\Admin;

use App\Models\DichVu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Session, Redirect;

class DichvuController extends Controller
{
	private $dichvu;
	private $image;

	public function __construct() {
		$this->dichvu = new DichVu();
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
		$title = 'Danh sách: Dịch Vụ';
		$dichvu = $this->dichvu->get();

		return view('admin.dichvu.index', compact(['title', 'dichvu']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$title = 'Dịch vụ | Tạo mới';

		return view('admin.dichvu.create', compact(['title']));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate(['name'=>'required',
		                    'excerpt'   =>  'required',
		                    'content'   =>  'required'
		]);
		$dichvu = $this->dichvu;
		$dichvu->name = $request->name;
		$dichvu->excerpt = $request->excerpt;
		$dichvu->content = $request->content;
		if ($request->thumbnail) {
			$dichvu->image = $this->image->uploadImage('hahuco/uploads/news', $request->thumbnail);
		}
		$dichvu->save();

		// tags save()
		$tags = explode(",", $request->tags);
		$dichvu->attachTags($tags);

		// Seo
		$title = $request->seoable_title ? $request->seoable_title : $dichvu->name;
		$key = $request->keyword ? $request->keyword : '';
		$description = $request->seoable_description ? $request->seoable_description : '';
		$dichvu->attachSeoAble($title, $key, $description);

		Session::flash('success', trans('admin/general.success.create'));

		return Redirect::route('admin.dichvu');
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
		$title = 'Dịch Vụ | Chỉnh sửa';
		$dichvu = $this->dichvu->where('slug', $slug)->firstOrFail();

		// tags
		$tags = $dichvu->tags;
		$str_tags = "";
		foreach ($tags as $tag) {
			$str_tags .= $tag->name . ",";
		}

		// seoable
		$seoable = $dichvu->getSeoable();
		$seoable_title = $seoable ? $seoable->seoable_title : '';
		$keyword = $seoable ? $seoable->keyword : '';
		$seoable_description = $seoable ? $seoable->seoable_description : '';

		return view('admin.dichvu.edit', compact(['title', 'dichvu', 'str_tags', 'seoable_description', 'keyword', 'seoable_title']));
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

		$dichvu = $this->dichvu->where('slug', $slug)->firstOrFail();
		$dichvu->name = $request->name;
		$dichvu->excerpt = $request->excerpt;
		$dichvu->content = $request->content;
		if ($request->thumbnail) {
			$dichvu->image = $this->image->uploadImage('hahuco/uploads/news', $request->thumbnail);
		}

		// tags
		$tags = explode(",", $request->tags);
		//dd($tags);
		$dichvu->syncTags($tags);

		// seoable
		$title = $request->seoable_title ? $request->seoable_title : $dichvu->title;
		$key = $request->keyword ? $request->keyword : '';
		$description = $request->seoable_description ? $request->seoable_description : '';
		$dichvu->updateSeoAble($title, $key, $description);

		$dichvu->save();

		Session::flash('success', trans('admin/general.success.edit'));

		return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($slug)
	{
		$dichvu = $this->dichvu->where('slug', $slug)->firstOrFail();
		$dichvu->delete();

		Session::flash('success', trans('admin/general.success.remove'));

		return Redirect::route('admin.news');
	}
}
