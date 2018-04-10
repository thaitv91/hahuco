<?php

namespace PackagePage\Pages\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;
use Validator;
use PackagePage\Pages\Models\TemplateField;
use PackagePage\Pages\Models\PageField;
use PackagePage\Pages\Models\Pages;
use PackagePage\Pages\Http\ImageFileController;
use Storage;
use Illuminate\Support\Facades\Input;

class TemplateController extends Controller
{	
	private $template_field;
    private $image;
	public function __construct() {
        $this->middleware('admin');
        $this->template_field = new TemplateField;
        $this->image = new ImageFileController;
    }
    public function index(){
    	$list_view = Storage::disk('views')->files();
        $this->viewData = array(
            'title'     =>  'Page Manager | Template',
            'list_view'  => $list_view
        );
        return view ( 'pages::admin.template.index', $this->viewData );
    }

   	public function edit($template){
   		$fields = TemplateField::where('template', '=', $template)->orderBy('order', 'asc')->get();
         $data = array(
            'title'  => 'Page Manager | Template | Edit',
            'fields' => $fields
        );
        return view ('pages::admin.template.edit', $data);
   	}

   	 public function update(Request $request, $template)
    {
        $data = $request->all();
        unset( $data['_token']);
        unset( $data['_method']);
        
        foreach ( $data as $key => $list ) {  
            if (Input::hasFile($key)) {
                $file = $request->file($key);
                $folder = 'image/templateField';
                    $filename = $this->image->uploadImage($folder, $file);
                    $list= $filename;
            }
            $datas = TemplateField::where('slug', $key)->update([ 'content' => $list]);
        }  

        Session::flash('success','Success!');
        return redirect(route('admin.template.index'));
    }

    public function listPage($template=null) {
        $pages = Pages::where('template', $template)->get();

        $this->viewData = array(
            'title' =>  'Page Manager | Template | Page',
            'data'  => $pages
        );
        return view ( 'pages::admin.pages.index', $this->viewData );
    }

    public function listField($template=null) {
        $fields = TemplateField::where('template', $template)->orderBy('order', 'asc')->get();

        $this->viewData = array(
            'title' => 'Page Manager | Template | Field',
            'data'  => $fields,
            'template' => $template
        );
        return view ( 'pages::admin.templateField.index', $this->viewData );
    }

    public function updateOrder(Request $request) {
        foreach ($request->order as $key => $value) {
            TemplateField::where('slug', $value)->update(['order' => $key]);
        }
    }
}