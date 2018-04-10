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

class NetworkController extends Controller
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
        $data = Network::all();
        $data_district  = '';
        $data_city = '';
        $this->viewData = array(
            'data' => $data,
            'data_district'  => $data_district ,
            'data_city'     => $data_city
        );
        return view ( 'admin.network.index', $this->viewData );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $region = Region::all();
        $district = District::all();
    
        $this->viewData = array(
            'region'  => $region
        );
        return view ( 'admin.network.create', $this->viewData );
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
                'name'             =>'required',
                'lat'              =>'required',
                'long'             =>'required',
                'address'          =>'required',
                'district_id'      =>'required',
                'region_id'        =>'required',
                'city_id'          =>'required',
                'type'             =>'required',
                'content'          =>'required',
                ];

            $messages = [
                'name.required'             =>'Please enter the name!!',
                'lat.required'              =>'Please enter the lat!!',
                'long.required'             =>'Please enter the long!!',
                'long.required'             =>'Please enter the address!!',
                'district_id.required'      =>'Please choose one district!!',
                'region_id.required'        =>'Please choose one city!!',
                'city_id.required'          =>'Please choose one region!!',
                'type.required'             =>'Please choose one type!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);

            if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
            DB::beginTransaction();
            $data['slug'] = str_slug( $data['name'] ); 
            $network = Network::create($data);
            DB::commit();
            Session::flash('success','Success!');
            return redirect(route('admin.network.index'));
                
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
        
        $data = Network::find( $id ); 
        $region = Region::all();
        $city = City::where('region_id', $data['region_id'])->get();
        $district = District::where('city_id', $data['city_id'])->get();
        $this->viewData = array(
            'district'      => $district,
            'city'          => $city,
            'region'        => $region,
            'data'          => $data,
        );
        return view ( 'admin.network.edit', $this->viewData );
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
                'lat'              =>'required',
                'long'             =>'required',
                'address'          =>'required',
                'district_id'      =>'required',
                'region_id'        =>'required',
                'city_id'          =>'required',
                'type'             =>'required',
                'content'          =>'required',
                ];

            $messages = [
                'name.required'             =>'Please enter the name!!',
                'lat.required'              =>'Please enter the lat!!',
                'long.required'             =>'Please enter the long!!',
                'address.required'          =>'Please enter the address!!',
                'district_id.required'      =>'Please choose one district!!',
                'region_id.required'        =>'Please choose one city!!',
                'city_id.required'          =>'Please choose one region!!',
                'type.required'             =>'Please choose one type!!',
                'name.unique'               =>'Name has already been taken!!',
            ];

            $validator = Validator::make( $request->all(), $rules, $messages);

            if ( $validator->fails() ){
                return redirect()->back()->withInput($data)->withErrors($validator);
            }else{
            DB::beginTransaction();
            $data['slug'] = str_slug( $data['name'] ); 
            $network = Network::where('id', $id)->first();
            if ($network->name != $request->name)
                $request->validate(['name' => 'unique:map_networks'], 
                                    ['name.unique' => 'Name has already been taken']
                                );
            $network->update($data);
            DB::commit();
            Session::flash('success','Success!');
            return redirect(route('admin.network.index'));
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
            Network::find( $id )->delete();
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
            return route('admin.network.delete',['id'=>$id]);
        }
        return -1;
    }

    public function changeRegion(Request $request)
    {   
        $data_city = City::where('region_id' , $request['region_id'])->get()->toArray();
        // dd($data_city);
        $this->viewData = array(
                'data_city' => $data_city,
        );
        
        return $this->viewData;
    }

    public function changeCity(Request $request)
    {   
       
        $data_district = District::where('city_id' , $request['city_id'])->get()->toArray();
        $this->viewData = array(
                'data_district' => $data_district,
        );
        return $this->viewData;
    }
}
