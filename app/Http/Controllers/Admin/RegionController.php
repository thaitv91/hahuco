<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;
use Validator;
use App\Models\Region;
use App\Models\City;
use App\Models\Network;
use App\Models\District;

class RegionController extends Controller
{   

    public function __construct() {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Region::all();
       
        $this->viewData = array(
            'data' => $data
        );
        return view ( 'admin.region.index', $this->viewData );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ( 'admin.region.create' );
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
                'name'             =>'required|unique:map_regions',
                'lat'             =>'required',
                'long'             =>'required',
                ];

            $messages = [
                'name.required'          =>'Please enter the name!!',
                'lat.required'          =>'Please enter the lat!!',
                'long.required'          =>'Please enter the long!!',
                'name.unique'           =>'Name has already been taken!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);

            if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
            DB::beginTransaction();
            $data['slug'] = str_slug( $data['name'] ); 
            $region = Region::create($data);
            DB::commit();
            Session::flash('success','Success!');
            return redirect(route('admin.region.index'));
                
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
        $data = Region::find( $id ); 
        
        $this->viewData = array(
            'data'           => $data,
        );
        return view ( 'admin.region.edit', $this->viewData );
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
            $region = Region::where('id', $id)->first();
            if ($region->name != $request->name)
                $request->validate(['name' => 'unique:map_regions'], 
                                    ['name.unique' => 'Name has already been taken']
                                );
            $region->update($data);
            DB::commit();
            Session::flash('success','Success!');
            return redirect(route('admin.region.index'));
                
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
            $network = Network::where('region_id', $id)->get();
            if( count($network) >0){
                foreach ($network as $key => $db_network) {
                    Network::find( $db_network['id'] )->delete();
                }
            }
            $city = City::where('region_id', $id)->get();
            if( count($city) >0){
                foreach ($city as $key => $db_city) {
                    City::find( $db_city['id'] )->delete();
                }
            }
            Region::find( $id )->delete();
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
            return route('admin.region.delete',['id'=>$id]);
        }
        return -1;
    }


    public function listCity($id)
    {
        $data = City::where('region_id', $id)->get(); 
        $data_region = Region::find($id);
        $this->viewData = array(
            'data'           => $data,
            'data_region'    => $data_region
        );
        return view ( 'admin.city.index', $this->viewData );
    }
}
