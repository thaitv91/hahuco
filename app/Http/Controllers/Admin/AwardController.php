<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Award;
use Redirect, Session, Auth;

class AwardController extends Controller
{
    private $image;

    public function __construct() {
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
        $title = 'Award';
        $awards = Award::orderBy('order', 'asc')->get();

        return view('admin.award.index', compact(['title', 'awards']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Award | Create';
        return view('admin.award.create', compact(['title']));
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
            'name'  =>  'required',
            'image' =>  'required | image'
        ]);

        $award = new Award;
        $award->name = $request->name;
        $award->image = $this->image->uploadImage('images/award', $request->image);
        $award->order = 999;
        $award->tooltip = $request->tooltip;
        $award->save();

        Session::flash('success', trans('admin/general.success.create'));

        return Redirect::route('admin.award');
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
        $title = 'Award | Edit';
        $award = Award::where('slug', $slug)->firstOrFail();

        return view('admin.award.edit', compact(['title', 'award']));
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
        $request->validate([
            'name'  =>  'required',
            'image' =>  'image'
        ]);

        $award = Award::where('slug', $slug)->firstOrFail();
        $award->slug = null;
        $award->name = $request->name;
        $award->tooltip = $request->tooltip;

        if ($request->image) {
            $award->image = $this->image->uploadImage('images/award', $request->image);
        }
        
        $award->save();
        
        Session::flash('success', trans('admin/general.success.edit'));

        return Redirect::route('admin.award.edit', ['slug' => $award->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if (Auth::user()->isAdmin()) {
            $award = Award::where('slug', $slug)->delete();

            Session::flash('success', trans('admin/general.success.remove'));
        } else {
            Session::flash('error', trans('admin/general.error'));
        }

        return Redirect::route('admin.award');
    }

    public function updateOrder(Request $request) {
        foreach ($request->order as $key => $value) {
            Award::where('id', $value)->update(['order' => $key]);
        }
    }
}
