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
use App\Models\District;
use App\Models\Network;

class DistrictController extends Controller
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
        $data = District::all();
        $data_city = '';
        $this->viewData = array(
            'data' => $data,
            'data_city' => $data_city
        );
        return view ( 'admin.district.index', $this->viewData );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = City::all();
        $this->viewData = array(
            'city'  => $city
        );
        return view ( 'admin.district.create', $this->viewData );
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
                'name'             =>'required|unique:map_districts',
                'lat'              =>'required',
                'long'             =>'required',
                'city_id'         =>'required',
                ];

            $messages = [
                'name.required'          =>'Please enter the name!!',
                'lat.required'          =>'Please enter the lat!!',
                'long.required'          =>'Please enter the long!!',
                'city_id.required'          =>'Please choose one city!!',
                'name.unique'           =>'Name has already been taken!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);

            if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
            DB::beginTransaction();
            $data['slug'] = str_slug( $data['name'] ); 
            $district = District::create($data);
            DB::commit();
            Session::flash('success','Success!');
            return redirect(route('admin.district.index'));
                
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
        $city = City::all();
        $data = District::find( $id ); 
        
        $this->viewData = array(
            'city'  => $city,
            'data'           => $data,
        );
        return view ( 'admin.district.edit', $this->viewData );
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
            $district = District::where('id', $id)->first();
            if ($district->name != $request->name)
                $request->validate(['name' => 'unique:map_districts'], 
                                    ['name.unique' => 'Name has already been taken']
                                );
            $district->update($data);
            DB::commit();
            Session::flash('success','Success!');
            return redirect(route('admin.district.index'));
                
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
            $network = Network::where('district_id', $id)->get();
            if( count($network) >0){
                foreach ($network as $key => $db_network) {
                    Network::find( $db_network['id'] )->delete();
                }
            }
            District::find( $id )->delete();
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
            return route('admin.district.delete',['id'=>$id]);
        }
        return -1;
    }

    public function listNetwork($id)
    {
        $data = Network::where( 'district_id', $id )->get();
        $data_district = District::find($id);
        $data_city = City::find($data_district->city_id);
        $this->viewData = array(
            'data'           => $data,
            'data_district'  => $data_district,
            'data_city'      => $data_city
        );
        return view ( 'admin.network.index', $this->viewData );
    }
}
