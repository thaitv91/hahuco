<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\UserMeta;
use Session;
use Redirect;
use Validator;
use Storage;
use Carbon\Carbon;
use Hash;

class VideoController extends Controller {
	public function __construct() {
		$this->image = new ImageFileController;
		$this->middleware('admin');
	}

	public function index(){
		$videos = Video::all();
		$title = "Quản lý Video";
		return view('admin.video.index',compact('videos', 'title'));
	}

	public function create()
	{
		$title = 'Video | Tạo mới';

		return view('admin.video.create', compact(['title']));
	}

	public function store(Request $request)
	{
		$request->validate(
			[
				'video'=>'required',
			    'title'   =>  'required',
			    'thumbnail'   =>  'required',
			]
		);

		$data = $request->all();
		$video = new Video();
		$video->video = $request->video;
		$video->title = $request->title;

		if ($data['thumbnail']) {
			$video->thumbnail = $this->image->uploadImage('hahuco/uploads/video', $data['thumbnail']);
		}
		$video->save();

		// tags save()
//		$tags = explode(",", $request->tags);
//		$dichvu->attachTags($tags);

		// Seo
//		$title = $request->seoable_title ? $request->seoable_title : $dichvu->name;
//		$key = $request->keyword ? $request->keyword : '';
//		$description = $request->seoable_description ? $request->seoable_description : '';
//		$dichvu->attachSeoAble($title, $key, $description);

		Session::flash('success', trans('admin/general.success.create'));

		return Redirect::back();
	}

	public function edit($id)
	{
		$title = 'Video | Chỉnh sửa';
		$video = Video::where('id', $id)->firstOrFail();
		return view('admin.video.edit', compact(['title', 'video']));
	}

	public function update(Request $request, $id)
	{
		$request->validate(
			[
				'video'=>'required',
				'title'   =>  'required'
			]
		);
		$data = $request->all();
		$video = Video::where('id', $id)->firstOrFail();
		$video->video = $request->video;
		$video->title = $request->title;

		if (isset($data['thumbnail']) ) {
			$video->thumbnail = $this->image->uploadImage('hahuco/uploads/video', $data['thumbnail']);
		}
		$video->save();

		Session::flash('success', trans('admin/general.success.edit'));

		return Redirect::back();
	}

	public function destroy(Request $request)
	{
		$data = $request->all();
		$id = $data['id'];
		$video = Video::where('id', $id)->firstOrFail();

		$video->delete();
		Session::flash('success', trans('admin/general.success.remove'));
		return Redirect::back();
	}
}
?>