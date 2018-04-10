<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;
use Validator;
use App\Models\Configure;

class ConfigureController extends Controller
{
    private $logo;
    public function __construct() {
        $this->logo = new ImageFileController;
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
        $data = Configure::all();
       
        $this->viewData = array(
            'data' => $data
        );
        return view ( 'admin.configure.index', $this->viewData );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ( 'admin.configure.create' );
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
        $folder = 'image/configure';
        if($request->hasFile('logo')) {
            $logo = $data['logo'];
            $logo_name = $this->logo->uploadImage($folder, $logo);
            $data['logo']= $logo_name;
        }

        if($request->hasFile('promotion_image')) {
            $image = $data['promotion_image'];
            $promotion_image = $this->image->uploadImage($folder, $image);
            $data['promotion_image']= $promotion_image;
        }
        $configure = Configure::create($data);
        Session::flash('success','Success!');
        return redirect(route('admin.configure.index'));   
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
        $data = Configure::find($id);
        $this->viewData = array(
            'data' => $data
        );
        return view ( 'admin.configure.edit', $this->viewData );
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

        if(!$request->hasFile('logo') && !$request->hasFile('promotion_image') ){

            $configure = Configure::where('id', $id)->first();

            $configure->update($data);

            Session::flash( 'success', 'Sửa thành công !!!!!');

	        return redirect()->back();
        }else{
            $folder = 'image/configure';
			if($request->hasFile('logo')) {
				$logo = $data['logo'];
				$logo_name = $this->logo->uploadImage($folder, $logo);
				$data['logo']= $logo_name;
			}

	        if($request->hasFile('promotion_image')) {
		        $image = $data['promotion_image'];
		        $promotion_image = $this->image->uploadImage($folder, $image);
		        $data['promotion_image']= $promotion_image;
	        }
			
            $configure = Configure::where('id', $id)->first();

            $configure->update($data);

            Session::flash( 'success', 'Sửa thành công !!!!!');

            return redirect()->back();
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
            Configure::find( $id )->delete();
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
            return route('admin.configure.delete',['id'=>$id]);
        }
        return -1;
    }
}
