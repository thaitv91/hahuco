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

		return view('admin.dichvu.edit', compact(['title', 'dichvu']));
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
