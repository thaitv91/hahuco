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
use Illuminate\Support\Facades\Input;

class PageController extends Controller
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
        $data = Pages::all();
        $this->viewData = array(
            'title' => 'Page Manager | Page',
            'data'  => $data
        );
        return view ( 'pages::admin.pages.index', $this->viewData );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_category = PageCategory::all();
        $list_view = Storage::disk('views')->files();
        $this->viewData = array(
            'title'     =>  'Page Manager | Page | Create',
            'page_category' => $page_category,
            'list_view'  => $list_view
        );
        return view ( 'pages::admin.pages.create', $this->viewData );
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
        // dd($data);
        unset( $data['_token']);
        unset( $data['_method']);
        try {
            $rules = [
                'page_categoryid'        =>'required',
                'title'                  =>'required',
                ];

            $messages = [
                'page_categoryid.required'    =>'Please choose one page category!!',
                'title.required'              =>'Please enter the title!!',
                'title.unique'                =>'The title has already been taken!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);
            if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
            DB::beginTransaction();
                // If haven't file
                if(!$request->hasFile('thumbnail')){
                    $pages = Pages::create($data);       
                    DB::commit();                            
                }else{
                    $folder = 'image/page';
                    $thumbnail = $data['thumbnail'];
                    $thumbnail_name = $this->image->uploadImage($folder, $thumbnail);
                    $data['thumbnail']= $thumbnail_name;
                    $pages = Pages::create($data);

	                // Seo
	                $title = $request->seoable_title ? $request->seoable_title : $pages->title;
	                $key = $request->keyword ? $request->keyword : '';
	                $description = $request->seoable_description ? $request->seoable_description : '';
	                $pages->attachSeoAble($title, $key, $description);

                    DB::commit();  
                }
                $page_id = $pages->id;
                $template = $pages->template;
                $this->addPageField( $page_id, $template );
                Session::flash('success','Success!');
                return redirect(route('admin.pages.index'));       
            }
        } catch (Exception $e) {
            Session::flash('error','Opp! Please try again.Error!');
            DB::rollback();
        }
    }

    public function addPageField($page_id, $template ){
        $fields = TemplateField::where('template', '=', $template)->get();
        foreach ($fields as $key => $value) { 
            $data['page_id'] = $page_id;
            $data['title'] = $value['title'];
            $data['type'] = $value['type'];
            $data['content_template'] = $value['content'];
            $data['template'] = $template;
            $data['slug'] = $value['slug'];
            $new_page_fields = PageField::create($data);
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
        $page_category = PageCategory::all();
        $list_view = Storage::disk('views')->files();
        $data = Pages::find( $id );
        $field_slug = TemplateField::where('template', $data['template'])->orderBy('order', 'asc')->pluck('slug');

        if (count($field_slug)) 
            $field_slug = $field_slug->toArray();

        $fields = PageField::where('page_id', $id)->whereIn('slug', $field_slug)->get();  
      
        $fields = $fields->sortBy(function ($item, $key) use ($field_slug){
            return array_search($item->slug, $field_slug);
        });

	    // seoable
	    $seoable = $data->getSeoable();
	    $seoable_title = $seoable ? $seoable->seoable_title : '';
	    $keyword = $seoable ? $seoable->keyword : '';
	    $seoable_description = $seoable ? $seoable->seoable_description : '';

        $this->viewData = array(
            'title'         =>  'Page Manager | Page | Edit',
            'page_category'  => $page_category,
            'data'           => $data,
            'list_view'      => $list_view,
            'fields'           => $fields,
	        'seoable_title' => $seoable_title,
	        'keyword' => $keyword,
	        'seoable_description' => $seoable_description
        );

        return view ( 'pages::admin.pages.edit', $this->viewData );
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
        unset( $data['_token']);
        unset( $data['_method']);
        // foreach ($data as $key => $value) {
        //     dd($key, $value);
        // }
        $page_data = Pages::find( $id );
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
                DB::beginTransaction();
                if ($page_data->title != $request->title)
                    $request->validate(['title' => 'unique:pages'], 
                                        ['title.unique' => 'Title has already been taken']
                        );
                if(!$request->hasFile('thumbnail')){
                    $page['title'] = $data['title'];
                    $page['page_categoryid'] = $data['page_categoryid'];
                    $page['template'] = $data['template'];
                    $page['content'] = $data['content'];
                    $pages = Pages::where('id', $id)->first();

                    if($pages['template'] == $data['template']){
                        foreach ( $data as $key => $list ) {
                            if (Input::hasFile($key)) {
                                $file = $request->file($key);
                                $folder = 'image/templateField';
                                $filename = $this->image->uploadImage($folder, $file);
                                $list= $filename;
                                $datas = PageField::where('page_id', $id)->where('slug', $key)->update([ 'content' => $list , 'content_template' => $list]);
                            }else{
                                $list = is_array($data[$key]) ? json_encode($data[$key]) : $data[$key];
                                $datas = PageField::where('page_id', $id)->where('slug', $key)->update([ 'content' => $list]);
                            }
                        }
                    }else{
                        $page_fields = PageField::where('page_id', $id)->where('template', $pages['template'])->get();
                            if( count($page_fields) >0){
                                foreach ($page_fields as $key => $page_field) {
                                    PageField::find( $page_field['id'] )->delete();
                                }
                            }
                            $this->addPageField( $id, $data['template'] );

                            $new_page_fields = PageField::where('page_id', $id)->get();
                            foreach ($new_page_fields as $key => $new_page_field) {
                                foreach ( $data as $key2 => $list_data ) {
                                    if (Input::hasFile($key2)) {
                                        $file = $request->file($key2);
                                        $folder = 'image/templateField';
                                        $filename = $this->image->uploadImage($folder, $file);
                                        $list= $filename;
                                        
                                        if($key2 == $new_page_field['slug']){
                                                $datas = PageField::where('page_id', $id)->where('slug', $new_page_field['slug'])->update([ 'content' => $list , 'content_template' => $list]);
                                        }
                                    }else{
                                        $list_data = is_array($data[$key2]) ? json_encode($data[$key2]) : $data[$key2];
                                        
                                        if($key2 == $new_page_field['slug']){
                                            $data_new_page_fied = PageField::where('page_id', $id)->where('slug', $new_page_field['slug'])->update([ 'content' => $list_data]);
                                         }
                                    }
                                }
                            }
                        }
	                // Seo
	                $title = $request->seoable_title ? $request->seoable_title : $pages->title;
	                $key = $request->keyword ? $request->keyword : '';
	                $description = $request->seoable_description ? $request->seoable_description : '';
	                $pages->updateSeoAble($title, $key, $description);

                    $pages->update($page);
                    DB::commit();
                    Session::flash('success','Success!');
                    return Redirect::back();
                }else{
                    $folder = 'image/page';
                    $thumbnail = $data['thumbnail'];
                    $thumbnail_name = $this->image->uploadImage($folder, $thumbnail);
                    $page['title'] = $data['title'];
                    $page['page_categoryid'] = $data['page_categoryid'];
                    $page['template'] = $data['template'];
                    $page['content'] = $data['content'];
                    $data['thumbnail']= $thumbnail_name;
                    $pages = Pages::where('id', $id)->first();
                    if($pages['template'] == $data['template']){
                        foreach ( $data as $key => $list ) {  
                            if (Input::hasFile($key)) {
                            $file = $request->file($key);
                            $folder = 'image/templateField';
                                $filename = $this->image->uploadImage($folder, $file);
                                $list= $filename;
                                $datas = PageField::where('page_id', $id)->where('slug', $key)->update([ 'content' => $list , 'content_template' => $list]);
                            }else{
                                // $list = $data[$key];
                                $list = is_array($data[$key]) ? json_encode($data[$key]) : $data[$key];
                                $datas = PageField::where('page_id', $id)->where('slug', $key)->update([ 'content' => $list]);
                            }
                        }
                    }else{
                        $page_fields = PageField::where('page_id', $id)->where('template', $pages['template'])->get();
                        if( count($page_fields) >0){
                            foreach ($page_fields as $key => $page_field) {
                                PageField::find( $page_field['id'] )->delete();
                            }
                        }
                        $this->addPageField( $id, $data['template'] );
                    }

	                // Seo
	                $title = $request->seoable_title ? $request->seoable_title : $pages->title;
	                $key = $request->keyword ? $request->keyword : '';
	                $description = $request->seoable_description ? $request->seoable_description : '';
	                $pages->updateSeoAble($title, $key, $description);

                    $pages->update($data);
                    DB::commit();
                    Session::flash( 'success', 'Update success !!!!!');
                    return redirect(route('admin.pages.index'));
                }  
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
            Pages::find( $id )->delete();
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
            return route('admin.pages.delete',['id'=>$id]);
        }
        return -1;
    }


    public function editPage($id)
    {   
        $page = Pages::find( $id );
        $fields = PageField::where('page_id', $id)->where('template', $page['template'])->get();
        $this->viewData = array(
            'fields'           => $fields,
        );
        return view ( 'pages::admin.pages.editPage', $this->viewData );
    }

    public function updatePage(Request $request, $id){
        $data = $request ->all();
        unset( $data['_token']);
        unset( $data['_method']);
        foreach ( $data as $key => $list ) {  
            if (Input::hasFile($key)) {
                $file = $request->file($key);
                $folder = 'image/templateField';
                    $filename = $this->image->uploadImage($folder, $file);
                    $list= $filename;
                    $datas = PageField::where('page_id', $id)->where('slug', $key)->update([ 'content' => $list , 'content_template' => $list]);
            }else{
                $list = $data[$key];
                $datas = PageField::where('page_id', $id)->where('slug', $key)->update([ 'content' => $list]);
            }
        
        }
        Session::flash('success','Success!');
        return redirect(route('admin.pages.index'));
    }

    // Ajax change Select Template

    public function changeTemplate(Request $request) {
        $data = $request->all();
        $page = Pages::find($data['id']);
        if( $data['data_select'] == $page['template']){
            $fields_page = PageField::where( 'page_id', $data['id'])->where('template', $data['data_select'])->orderBy('order', 'asc')->get();
            $fields = NULL;
            $this->viewData = array(
                'fields_page' => $fields_page,
                'fields' => $fields
            );
        }else{
            $fields = TemplateField::where('template', '=', $data['data_select'])->orderBy('order', 'asc')->get();
            $this->viewData = array(
                'fields' => $fields
            );
        }
        return view ('pages::admin.pages.ajax',  $this->viewData);
    }


    public function changeTemplate2(Request $request){
        $data = $request->all();
        $page = Pages::find($data['id']);
        if( $data['data_select'] == $page['template'] ){
            $fields_page = PageField::where('page_id', $data['id'])->where('template' , $data['data_select'])->get();
            $fields = NULL;
            $this->viewData =array(
                'fields_page' => $fields_page,
                'fields' => $fields
            );

        }else{
            $fields = TemplateField::where('template', $data['data_select'])->get();
            
        }

    }

}