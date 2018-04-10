<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Session, Redirect;

class PartnerController extends Controller
{
    private $partner;
    private $image;

    public function __construct() {
        $this->middleware('admin');
        $this->partner = new Partner;
        $this->image = new ImageFileController;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Partner';
        $partners = $this->partner->get();

        return view('admin.partner.index', compact(['title', 'partners']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Partner | Create';
        return view('admin.partner.create', compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|unique:partner']);
        $partner = $this->partner;
        $partner->name = $request->name;
        if ($request->thumbnail) {
            $partner->thumbnail = $this->image->uploadImage('images/product_partner', $request->thumbnail);
        }

        $partner->save();

        Session::flash('success', trans('admin/general.success.create'));

        return Redirect::route('admin.partner');
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
        $title = 'Partner | Edit';
        $partner = $this->partner->where('id', $id)->firstOrFail();

        return view('admin.partner.edit', compact(['title', 'partner']));
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
        $partner = $this->partner->where('id', $id)->firstOrFail();
        if ($partner->name != $request->name)
            $request->validate(['name'=>'required|unique:partner']);
        $partner->name = $request->name;
        if ($request->thumbnail) {
            $partner->thumbnail = $this->image->uploadImage('images/product_partner', $request->thumbnail);
        }

        $partner->save();

        Session::flash('success', trans('admin/general.success.edit'));

        return Redirect::route('admin.partner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->partner->where('id', $id)->delete();

        Session::flash('success', trans('admin/general.success.remove'));

        return Redirect::route('admin.partner');
    }

    public function reorder() {
        $title = 'Partner | Reorder';
        $partners = Partner::all();

        return view('admin.partner.reorder', compact(['title', 'partners']));
    }

    public function updateOrder (Request $request) {
        foreach ($request->order as $key => $value) {
            Partner::where('id', $value)->update(['order' => $key + 1]);
        }
    }
}
