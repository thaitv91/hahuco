<?php

namespace PackagePage\Pages\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;
use Validator;
use PackagePage\Pages\Models\TemplateField;
use PackagePage\Pages\Models\Pages;
use PackagePage\Pages\Models\PageField;
use Storage;
use PackagePage\Pages\Http\ImageFileController;
use File;
class TemplateFieldController extends Controller
{	
    private $image;
	public function __construct() {
        $this->middleware('admin');
        $this->image = new ImageFileController;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TemplateField::all();
        $this->viewData = array(
            'title' => 'Page Manager | Template Field',
            'data'  => $data
        );
        return view ( 'pages::admin.templateField.index', $this->viewData );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_category = TemplateField::all();
        $list_view = Storage::disk('views')->files();
        $this->viewData = array(
            'title'     =>  'Page Manager | Template Field | Create',
            'page_category' => $page_category,
            'list_view'  => $list_view
        );
        return view ( 'pages::admin.templateField.create', $this->viewData );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if($data['type'] == 'select' || $data['type'] == 'radio' || $data['type'] == 'submit' || $data['type'] == 'checkbox'){
            $content = $data['content'];
            $path = $request->file('content')->move('json', time() . '_' .$content->getClientOriginalName());
            $data['content'] = file_get_contents($path);  
        }
        if($data['type'] =='object'){
            if($data['model_name'] == NULL){
                Session::flash('error', 'Please choose one model!!');
                return redirect()->back()->withInput($data);   
            }
            $data['content'] = array(
                'model_name' => $data['model_name'],
                'order_by' => $data['order_by'],
                'limit'   => $data['limit']
            );
            $data['content'] = json_encode($data['content']);
        }

        if ($data['type'] == 'widget') {
            $data['content'] = $data['widget_name'];
        }

        if($data['type'] == 'file'){
            $folder = 'image/configure';
            $img = $data['content'];
            $img_name = $this->image->uploadImage($folder, $img);
            $data['content']= $img_name;
        }
        try {   
            $rules = [
                'title'                  =>'required',
                'type'                   =>'required',
                ];

            $messages = [
                'title.required'              =>'Please enter the title!!',
                'type.required'               =>'Please choose one type!!',
        
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);
            if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
            DB::beginTransaction();
            $data['slug'] = $data['template'].'-'.str_slug( $data['title'] );
            $templateField = TemplateField::create($data);
            $pages = Pages::where('template', $templateField['template'])->get();
                        if($pages){
                            foreach ($pages as $key => $page) {
                                // dd($page->id);
                                $field_page['page_id'] = $page->id;
                                $field_page['title'] = $templateField['title'];
                                $field_page['content_template'] = $templateField['content'];
                                $field_page['template'] = $templateField['template'];
                                $field_page['type'] = $templateField['type'];
                                $field_page['slug'] = $templateField['slug'];
                                $page_field = PageField::create($field_page);
                            }
                        }
                
            DB::commit();
            Session::flash('success','Success!');
            return redirect(route('admin.templateField.index'));
            }
        } catch (Exception $e) {
            Session::flash('error','Opp! Please try again.Error!');
            DB::rollback();
        }
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
    public function edit($id)
    {
        $list_view = Storage::disk('views')->files();
        $data = TemplateField::find( $id );
        if($data['type'] == 'object'){
            $data_content = json_decode($data['content']);
            $models = $this->getModels();
            $modelName = 'App\Models\\'.$data_content->model_name;
            $model = new $modelName;
            $table = $model->getTable();
            $columns = \DB::getSchemaBuilder()->getColumnListing($table);

            $this->viewData = array(
            'title'          => 'Page Manager | Page Template | Edit',
            'data'           => $data,
            'list_view'      => $list_view,
            'data_content'   => $data_content,
            'models'         => $models,
            'columns'        => $columns
            );
        } else {
            $this->viewData = array(
                'title'          => 'Page Manager | Page Template | Edit',
                'data'           => $data,
                'list_view'      => $list_view,
                'widgets'        => $data['type'] == 'widget' ? $this->getWidgets() : [] 
            );
        }

        return view ( 'pages::admin.templateField.edit', $this->viewData );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $data = $request->all();
        $field = TemplateField::find($id);
        // dd($field);
        try {
            $rules = [
                'title'                  =>'required',
                ];
            $messages = [
                'title.required'              =>'Please enter the title!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);

            if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
                $data['slug'] = $data['template'].'-'.str_slug( $data['title'] );
                if ($field->title != $request->title)
                $request->validate(['title' => 'unique:template_fields'], 
                                    ['title.unique' => 'Title has already been taken']
                                ); 
                if( $data['type'] == 'select' && $request->hasFile('content')){
                    $content = $data['content'];
                    $path = $request->file('content')->move('json', $content->getClientOriginalName());
                    $data['content'] = file_get_contents($path);  
                }elseif ($data['type'] == 'file' && $request->hasFile('content')) {
                    $folder = 'image/configure';
                    $img = $data['content'];
                    $img_name = $this->image->uploadImage($folder, $img);
                    $data['content']= $img_name;
                }elseif($data['type'] == 'object'){
                    $data['content'] = array(
                        'model_name' => $data['model_name'],
                        'order_by' => $data['order_by'],
                        'limit'   => $data['limit']
                    );
                    $data['content'] = json_encode($data['content']);
                } elseif ($data['type'] == 'widget') {
                    $data['content'] = $data['widget_name'];
                }
                DB::beginTransaction();
                $pages = TemplateField::where('id', $id)->first();
                $pages->update($data);
                $page_fields = PageField::where('template', $field['template'])->where('slug', $field['slug'])->get();
                if( count($page_fields) >0){
                    foreach ($page_fields as $key => $page_field) {
                        PageField::find( $page_field['id'] )->delete();
                    }
                }
                $page_fields = PageField::where('template', $data['template'])->where('slug', $field['slug'])->get();

                if(count($page_fields) > 0){
                    foreach ($page_fields as $key => $page_field) {
                        $field_page['title'] = $data['title'];
                        $field_page['content_template'] = $data['content'];
                        $field_page['template'] = $data['template'];
                        $field_page['type'] = $data['type'];
                        $field_page['slug'] = $data['slug'];
                        $page_field = PageField::where('template', $data['template'])->where('slug', $field['slug'])->update($field_page);
                    }
                }else{
                    $pages = Pages::where('template', $data['template'])->get();
                    // dd($pages);
                    if(count($page_fields) == 0){
                        if($pages){
                            foreach ($pages as $key => $page) {
                                // dd($page->id);
                                $field_page['page_id'] = $page->id;
                                $field_page['title'] = $data['title'];
                                $field_page['content_template'] = $data['content'];
                                $field_page['template'] = $data['template'];
                                $field_page['type'] = $data['type'];
                                $field_page['slug'] = $data['slug'];
                                $page_field = PageField::create($field_page);
                            }
                        }
                    }
                }
                DB::commit();
                Session::flash('success','Success!');
                return redirect(route('admin.templateField.index'));

            }
        } catch (Exception $e) {
            Session::flash('error','Opp! Please try again.Error!');
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {

            $template_field = TemplateField::find( $id );
            $page_fields = PageField::where('template', $template_field['template'])->where('slug', $template_field['slug'])->get();
            if( count($page_fields) >0){
                foreach ($page_fields as $key => $page_field) {
                    PageField::find( $page_field['id'] )->delete();
                }
            }
            TemplateField::find($id)->delete();
            DB::commit();
            Session::flash('success','Success');
            return Redirect::back();

        } catch(\Exception $e) {
            \Log::info( $e->getMessage() );
            DB::rollback();
            Session::flash('error','Error');
            return Redirect::back();
        }
    }

    public function getUrlDelete(Request $request) {
        $id = $request->id;
        if (isset($id)) {
            return route('admin.templateField.delete',['id'=>$id]);
        }
        return -1;
    }

    public function getModels() {
        $path = app_path() . "/Models";
        $modelNames = [];
        $fileNames = scandir($path);

        foreach ($fileNames as $fileName) {
            if ($fileName === '.' or $fileName === '..') continue;
                $modelNames[] = substr($fileName,0,-4);
        }

        return $modelNames;
    }

    public function getColumns(Request $request) {
        $modelName = 'App\Models\\'.$request->modelName;
        $model = new $modelName;
        $table = $model->getTable();
        $columns = \DB::getSchemaBuilder()->getColumnListing($table);

        return $columns;
    }

    public function getWidgets() {
        $path = app_path() . "/Widgets";
        $widgetNames = [];
        $fileNames = scandir($path);

        foreach ($fileNames as $fileName) {
            if ($fileName === '.' or $fileName === '..') continue;
                $widgetNames[] = substr($fileName,0,-4);
        }

        return $widgetNames;
    }

}