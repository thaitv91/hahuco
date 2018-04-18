<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Session, Redirect;

class TestimonialController extends Controller
{
     private $testimonial;
    private $image;

    public function __construct() {
        $this->testimonial = new Testimonial;
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
        $testimonials = $this->testimonial->get();
		$title = "Khách hàng đánh giá";
        return view('admin.testimonial.index', compact(['testimonials', 'title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$title = "Tạo nội dung Testimonial";
        return view('admin.testimonial.create',compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|unique:testimonial']);
        $testimonial = $this->testimonial;
        $testimonial->name = $request->name;
        $testimonial->job = $request->job;
        $testimonial->content = $request->content;
        if ($request->thumbnail) {
            $testimonial->thumbnail = $this->image->uploadImage('images/testimonial', $request->thumbnail);
        }

        $testimonial->save();

        Session::flash('success', trans('admin/general.success.create'));

        return Redirect::route('admin.testimonial');
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
        $testimonial = $this->testimonial->where('id', $id)->firstOrFail();
        $title = "Edit nội dung Testimonial";

        return view('admin.testimonial.edit', compact(['testimonial', 'title']));
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
        $testimonial = $this->testimonial->where('id', $id)->firstOrFail();
        if ($request->name != $testimonial->name) 
            $request->validate(['name'=>'required|unique:testimonial']);
        $testimonial->name = $request->name;
        $testimonial->job = $request->job;
        $testimonial->content = $request->content;
        if ($request->thumbnail) {
            $testimonial->thumbnail = $this->image->uploadImage('images/testimonial', $request->thumbnail);
        }
        $testimonial->save();

        Session::flash('success', trans('admin/general.success.edit'));

        return Redirect::route('admin.testimonial');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = $this->testimonial->where('id', $id)->firstOrFail();
        $testimonial->delete();

        Session::flash('success', trans('admin/general.success.remove'));

        return Redirect::route('admin.testimonial');
    }
}
