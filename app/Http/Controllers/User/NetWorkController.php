<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\District;
use App\Models\City;
use App\Models\Network;

class NetWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data_mien = Region::all();
        $data_mb = Region::where('slug', 'mien-bac')->first();
        $data_network = Network::all();
        $lat = $data_mb->lat;
        $long = $data_mb->long;
        $data_network = Network::all();
        $markers = array(); 
        foreach ($data_network as $key => $network) {
            if($network->type == 'giaodich'){
                $img = '/image/map/trading.png';
            }elseif ($network->type == 'chinhanh') {
                $img = '/image/map/agency.png';
            }elseif($network->type == 'gara'){
                $img = '/image/map/gara.png';
            }elseif($network->type == 'benhvien'){
                $img = '/image/map/hospital.png';
            }
            $temp = [$network->content, $network->lat, $network->long, $img, $network->name];
            array_push($markers, $temp);
        }
        $data_maker = json_encode($markers);
        $this->viewData = array(
            'data_mien' => $data_mien,
            'data_maker'    => $data_maker,
            'lat'           => $lat,
            'long'          => $long,
            'data_network'  => $data_network
        );
        return view ('user.network', $this->viewData);
    }

   
    public function changeRegion(Request $request)
    {   
        $data_city = City::where('region_id' , $request['region_id'])->get()->toArray();
        if($request['type'] == 'all') {
	        $data_network = Network::where('region_id', $request['region_id'])->get();
        } else {
	        $data_network = Network::where('region_id', $request['region_id'])->where('type', '=', $request['type'])->get();
        }
        $data_region = Region::find($request['region_id']);
        $lat = $data_region->lat;
        $long = $data_region->long;
        $markers = array(); 
        foreach ($data_network as $key => $network) {
            if($network->type == 'giaodich'){
                $img = '/image/map/trading.png';
            }elseif ($network->type == 'chinhanh') {
                $img = '/image/map/agency.png';
            }elseif($network->type == 'gara'){
                $img = '/image/map/gara.png';
            }elseif($network->type == 'benhvien'){
                $img = '/image/map/hospital.png';
            }
            $temp = [$network->content, $network->lat, $network->long, $img, $network->name, $network->address, $network->phone];
            array_push($markers, $temp);
        }
        // $data_maker = json_encode($markers);
        $this->viewData = array(
                'data_city' => $data_city,
                'markers' => $markers,
                'lat'  => $lat,
                'long' => $long
        );
        
        return $this->viewData;
    }

    
    public function changeCity(Request $request)
    {   
        $data_district = District::where('city_id' , $request['city_id'])->get()->toArray();
	    if($request['type'] == 'all') {
		    $data_network = Network::where('city_id', $request['city_id'])->get();
	    } else {
		    $data_network = Network::where('city_id', $request['city_id'])->where('type', '=', $request['type'])->get();
	    }
        $data_city = City::find($request['city_id']);
        $lat = $data_city->lat;
        $long = $data_city->long;
        $markers = array(); 
        foreach ($data_network as $key => $network) {
            if($network->type == 'giaodich'){
                $img = '/image/map/trading.png';
            }elseif ($network->type == 'chinhanh') {
                $img = '/image/map/agency.png';
            }elseif($network->type == 'gara'){
                $img = '/image/map/gara.png';
            }elseif($network->type == 'benhvien'){
                $img = '/image/map/hospital.png';
            }
            $temp = [$network->content, $network->lat, $network->long, $img, $network->name, $network->address, $network->phone];
            array_push($markers, $temp);
        }

        $this->viewData = array(
                'data_district' => $data_district,
                'markers' => $markers,
                'lat'  => $lat,
                'long' => $long
        );
        
        return $this->viewData;
    }

    public function changeDistrict(Request $request)
    {
	    if($request['type'] == 'all') {
		    $data_network = Network::where( 'district_id', $request['district_id'] )->get();
	    } else {
		    $data_network = Network::where( 'district_id', $request['district_id'] )->where('type', '=', $request['type'])->get();
	    }
        $data_district = District::find($request['district_id']);
        $lat = $data_district->lat;
        $long = $data_district->long;
        $markers = array(); 
        foreach ($data_network as $key => $network) {
            if($network->type == 'giaodich'){
                $img = '/image/map/trading.png';
            }elseif ($network->type == 'chinhanh') {
                $img = '/image/map/agency.png';
            }elseif($network->type == 'gara'){
                $img = '/image/map/gara.png';
            }elseif($network->type == 'benhvien'){
                $img = '/image/map/hospital.png';
            }
            $temp = [$network->content, $network->lat, $network->long, $img, $network->name, $network->address, $network->phone];
            array_push($markers, $temp);
        }

        $this->viewData = array(
                'markers' => $markers,
                'lat'  => $lat,
                'long' => $long
        );
        
        return $this->viewData;
    }

    public function filterData(Request $request) {

    	$type = $request['type'];
    	$region = $request['region_id'];
    	$city = $request['city_id'];
    	$district = $request['district_id'];
	    $markers = array();
	    $lat = 0;
	    $long = 0;
    	if($region == '') {
    		if($type == 'all') {
			    $data_network = Network::all();
		    } else {
			    $data_network = Network::where('type', '=', $type)->get();
		    }
		    $data_mb = Region::where('slug', 'mien-bac')->first();
		    $lat = $data_mb->lat;
		    $long = $data_mb->long;
		    foreach ($data_network as $key => $network) {
			    if($network->type == 'giaodich'){
				    $img = '/image/map/trading.png';
			    }elseif ($network->type == 'chinhanh') {
				    $img = '/image/map/agency.png';
			    }elseif($network->type == 'gara'){
				    $img = '/image/map/gara.png';
			    }elseif($network->type == 'benhvien'){
				    $img = '/image/map/hospital.png';
			    }
			    $temp = [$network->content, $network->lat, $network->long, $img, $network->name, $network->address, $network->phone];
			    array_push($markers, $temp);
		    }
	    } elseif($city == '') {
		    if($type == 'all') {
			    $data_network = Network::where( 'region_id', $region )->get();
		    } else {
			    $data_network = Network::where( 'region_id', $region )->where( 'type', '=', $type )->get();
		    }
		    $data_region = Region::find($region);
		    $lat = $data_region->lat;
		    $long = $data_region->long;
		    foreach ($data_network as $key => $network) {
			    if($network->type == 'giaodich'){
				    $img = '/image/map/trading.png';
			    }elseif ($network->type == 'chinhanh') {
				    $img = '/image/map/agency.png';
			    }elseif($network->type == 'gara'){
				    $img = '/image/map/gara.png';
			    }elseif($network->type == 'benhvien'){
				    $img = '/image/map/hospital.png';
			    }
			    $temp = [$network->content, $network->lat, $network->long, $img, $network->name, $network->address, $network->phone];
			    array_push($markers, $temp);
		    }
	    } elseif($district == '') {
		    if($type == 'all') {
			    $data_network = Network::where('city_id', $city)->get();
		    } else {
			    $data_network = Network::where( 'city_id', $city )->where( 'type', '=', $type )->get();
		    }
		    $data_city = City::find($city);
		    $lat = $data_city->lat;
		    $long = $data_city->long;

		    foreach ($data_network as $key => $network) {
			    if($network->type == 'giaodich'){
				    $img = '/image/map/trading.png';
			    }elseif ($network->type == 'chinhanh') {
				    $img = '/image/map/agency.png';
			    }elseif($network->type == 'gara'){
				    $img = '/image/map/gara.png';
			    }elseif($network->type == 'benhvien'){
				    $img = '/image/map/hospital.png';
			    }
			    $temp = [$network->content, $network->lat, $network->long, $img, $network->name, $network->address, $network->phone];
			    array_push($markers, $temp);
		    }
	    } else {
		    if($type == 'all') {
			    $data_network = Network::where('district_id', $district)->get();
		    } else {
			    $data_network = Network::where( 'district_id', $district )->where( 'type', '=', $type )->get();
		    }
		    $data_district = District::find($district);
		    $lat = $data_district->lat;
		    $long = $data_district->long;
		    foreach ($data_network as $key => $network) {
			    if($network->type == 'giaodich'){
				    $img = '/image/map/trading.png';
			    }elseif ($network->type == 'chinhanh') {
				    $img = '/image/map/agency.png';
			    }elseif($network->type == 'gara'){
				    $img = '/image/map/gara.png';
			    }elseif($network->type == 'benhvien'){
				    $img = '/image/map/hospital.png';
			    }
			    $temp = [$network->content, $network->lat, $network->long, $img, $network->name, $network->address, $network->phone];
			    array_push($markers, $temp);
		    }
	    }

	    $this->viewData = array(
		    'markers' => $markers,
		    'lat'  => $lat,
		    'long' => $long
	    );

	    return $this->viewData;
    }

    public function detailLocal(Request $request) {
    	$lat = $request['lat'];
    	$long = $request['long'];
	    $network = Network::where('lat', '=', $lat)->where('long', '=', $long)->first();
	    $markers = array();
	    if($network->type == 'giaodich'){
		    $img = '/image/map/trading.png';
	    }elseif ($network->type == 'chinhanh') {
		    $img = '/image/map/agency.png';
	    }elseif($network->type == 'gara'){
		    $img = '/image/map/gara.png';
	    }elseif($network->type == 'benhvien'){
		    $img = '/image/map/hospital.png';
	    }
	    $temp = [$network->content, $network->lat, $network->long, $img, $network->name, $network->address, $network->phone];
	    array_push($markers, $temp);

	    $this->viewData = array(
		    'markers' => $markers,
		    'lat'  => $lat,
		    'long' => $long
	    );

	    return $this->viewData;
    }

}
