<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderImage;
use Redirect, Session, Image, File, DB;

class SliderController extends Controller
{
	private $image;
	private $slider;
	private $slider_image;

	public function __construct() {
		$this->image = new ImageFileController;
		$this->slider = new Slider;
		$this->slider_image = new SliderImage;
        $this->middleware('admin');
	}

	public function index() {
		$sliders = $this->slider->all();
        
        return view('admin.slider.index', compact(['sliders']));
	}

    public function create() {

    	return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  =>  'required | unique:sliders',
            'slug'  =>  'required | unique:sliders'
        ]);

        $images = $request->img_info;

        if (!isset($images) || $this->isEmptyImage($images)) {
            Session::flash('error', 'Please upload image');
            return Redirect::back();
        }

        //Create slider
        if (count($this->slider->where('name', $request->name)->first()) != 0) {
            Session::flash('error', 'Name was exists');
            return Redirect::back(); 
        }

        $slider = $this->slider->create([
            'name'  =>  $request->name,
            'slug'  =>  $request->slug
        ]);

        //Create slider image
        $this->doUploadImage($slider->id, $images);

        Session::flash('success', trans('admin/general.success.create'));

        return Redirect::route('admin.slider');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $slider = $this->slider->where('slug', $slug)->firstOrFail();
    
        return view('admin.slider.edit', compact(['slider']));
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
        $images = $request->img_info;

        if (!isset($images) || $this->isEmptyImage($images)) {
            Session::flash('error', 'Please upload image');
            return Redirect::back();
        }

        $slider = Slider::where('slug', $slug)->firstOrFail();

        $request->validate(['name'	=>	'required']);
        if ($slider->name != $request->name) 
            $request->validate(['name'  =>  'unique:sliders']);
        if ($slider->slug != $request->slug) 
        	$request->validate(['slug'	=>	'unique:sliders']);

        $slider->slug = $request->slug;
        $slider->name = $request->name;
        $slider->save();

        //Create slider image
        $this->doUploadImage($slider->id, $images);

        Session::flash('success', trans('admin/general.success.edit'));

        return Redirect::route('admin.slider.edit', ['slug' =>  $slider->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        DB::beginTransaction();

        try {
            $slider = $this->slider->where('slug', $slug)->firstOrFail();
            $this->slider_image->where('slider_id', $slider->id)->delete();
            $slider->delete();

            DB::commit();
        } catch (Exception $e) {
            Session::flash('error', 'Error');
            
            DB::rollback();

            return Redirect::back();
        }

        Session::flash('success', 'Success');

        return Redirect::back();
    }

    public function getSlug(Request $request) {
        $name = $request->name;

        return str_slug($name);
    }

    //Upload phan create new
    public function uploadImage(Request $request){
        //Khoi tao 
        $image = $request->file;
        $temp_folder = 'hahuco/images/temp/slider';

        if (!is_dir($temp_folder)) {
    		File::makeDirectory($temp_folder, 0777, true);
        }

        return $this->image->uploadImage($temp_folder, $image);
    }

    public function removeImage(Request $request){
        $id = $request->id?$request->id:-1;
        $name = $request->name;
        $real_folder = 'hahuco/images/slider/'.$id;
        $data = $this->slider_image->where('url',$real_folder.'\\'.$name)->first();
        if(! is_null($data) && $data->count() != 0)
            return json_encode($data);

        return -1;
    }

    public function doUploadImage($id,$data_img){
        //Khoi tao thu muc
        $temp_folder = 'hahuco/images/temp/slider';
        $real_folder = 'hahuco/images/slider/'.$id;
        if (!is_dir($real_folder)) {
           File::makeDirectory($real_folder, 0777, true);
        }

        //Luu anh vao server
        try {
            foreach ($data_img as $key => $value) {
                $temp = explode(",", $value);
                $is_oldImage = $temp[0];//0-newfile, 1-oldfile
                $file_name = $temp[1];

                if ($file_name != "undefined") {
                    if($is_oldImage == 0){
                        $new_image = Image::make(File::get($file_name));
                        $new_name = explode('/', $file_name);
                        $new_name = time().rand(0, 9999).$new_name[count($new_name) - 1];
                        $new_image->save($real_folder.'/'.$new_name);
                        $this->slider_image->create([
                            'slider_id'    =>  $id,
                            'url'          =>  $real_folder.'\\'.$new_name,
                            ]);
                    } else {
                        $this->slider_image->where('url',$real_folder.'\\'.$file_name)->delete();
                    }
                }
            }//end foreach

            Session::flash('success', trans('admin/general.success.create'));
        } catch (Exception $e) {
            Session::flash('error', trans('admin/general.bug_error'));

            return false;
        }

        return true;
    }

    public function getImage(Request $request){
        $id = $request->id;
        $real_folder = 'hahuco/images/slider/'.$id;
        $data = $this->slider->find($id)->images()->get();
        
        foreach ($data as $key => $value) {
            $value->path = asset(str_replace('\\', '/', $value->url));
        }

        return $data;
    }

    public function isEmptyImage($images) {
        foreach ($images as $key => $value) {
            if (strpos($value, '0,') !== false)
                return false;
        }

        return true; 
    }

    public function getSliders() {
        $sliders = Slider::get(['slug', 'name']);

        return $sliders;
    }
}
