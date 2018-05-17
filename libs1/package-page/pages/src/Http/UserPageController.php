<?php

namespace PackagePage\Pages\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PackagePage\Pages\Http\ImageFileController;
use Carbon\Carbon;
use DB;
use Session;
use Redirect;
use Validator;
use PackagePage\Pages\Models\PageCategory;
use PackagePage\Pages\Models\Pages;
use PackagePage\Pages\Models\PageField;
use PackagePage\Pages\Models\TemplateField;
use Storage;
use SEO;

class UserPageController extends Controller
{	
	public function index($slug = ''){
		$slug = $slug ? $slug : 'homepage';
		$data = Pages::where( 'slug', $slug )->firstOrFail();
		$data->setSeoable();

		$template = $data->template;
		$html_template = 'template.'.$template;

		$fields = PageField::where('page_id', '=', $data->id)->get();

		$this->viewData = array(
			'title' => $data->title,
			'html_template' => $html_template,
			'fields' => $fields,
			'page' => $data
		);
		return view ( 'pages::page', $this->viewData);
	}
	public function field($slug){
		$fields = TemplateField::where('slug', '=', $slug)->first();
		$data_content = json_decode($fields['content']);
		// dd($data_content);
		$model = 'App\Models\\'.$data_content->model_name;
		if($data_content->order_by == null && $data_content->limit ==null){
			$data = $model::all();
		}elseif($data_content->order_by != null && $data_content->limit ==null){
			$data = $model::orderBy($data_content->order_by)->get();
		}elseif ($data_content->order_by == null && $data_content->limit !=null) {
			$data = $model::paginate($data_content->limit);
		}elseif ($data_content->order_by != null && $data_content->limit !=null) {
			$data = $model::orderBy($data_content->order_by)->paginate($data_content->limit);
		}
		dd($data);
	}
}