<?php

namespace PackagePage\Pages\Http;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;
use Validator;
use PackagePage\Pages\Models\PageCategory;
use PackagePage\Pages\Models\Pages;
use Illuminate\Http\Request;

class PageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PageCategory::all();
        $this->viewData = array(
            'title' =>  'Page Manager | Page Category ',
            'data' => $data
        );
        return view ( 'pages::admin.pageCategory.index', $this->viewData );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Page Manager | Page Category | Create';
        return view( 'pages::admin.pageCategory.create', compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request ->all();
        try {
            $rules = [
                'name'             =>'required|unique:page_category',
                ];

            $messages = [
                'name.required'          =>'Please enter the name!!',
                'name.unique'           =>'Name has already been taken!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);

            if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
            DB::beginTransaction();
            $data['slug'] = str_slug( $data['name'] ); 
            $pageCategory = PageCategory::create($data);
            DB::commit();
            Session::flash('success','Success!');
            return redirect(route('admin.pageCategory.index'));
                
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
        $data = PageCategory::find( $id );
        $this->viewData = array(
            'title' =>  'Page Manager | Page Category | Edit',
            'data' => $data
        );
        return view ( 'pages::admin.pageCategory.edit', $this->viewData );
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
        $data = $request ->all();
        try {
        $rules = [
                'name'             =>'required',
                ];

            $messages = [
                'name.required'          =>'Please enter the name!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);

            if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
            DB::beginTransaction();

            $data['slug'] = str_slug( $data['name'] ); 
            $pageCategory = PageCategory::where('id', $id)->first();
            if ($pageCategory->name != $request->name)
                $request->validate(['name' => 'unique:page_category'], 
                                    ['name.unique' => 'Name has already been taken']
                                );
            $pageCategory->update($data);
            DB::commit();
            Session::flash('success','Success!');
            return redirect(route('admin.pageCategory.index'));
                
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
            $pages = Pages::where('page_categoryid', $id)->get();
            if( count($pages) >0){
                foreach ($pages as $key => $page) {
                    Pages::find( $page['id'] )->delete();
                }
            }
            PageCategory::find( $id )->delete();
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
            return route('admin.pageCategory.delete',['id'=>$id]);
        }
        return -1;
    }

    public function listPage($id) {
        $pages = Pages::where('page_categoryid', $id)->get();

        $this->viewData = array(
            'title' => 'Page Manager | Page Category | Page',
            'data'  => $pages
        );
        
        return view ( 'pages::admin.pages.index', $this->viewData );
    }

}