<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Region;
use App\Models\District;
use App\Models\City;
use App\Models\Network as NetworkModel;
use PackagePage\Pages\Models\Pages;

class Network extends AbstractWidget
{
	protected $config = [
		'type' => 'all'
	];
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $data_mien = Region::all();
        $data_mb = Region::where('slug', 'mien-bac')->first();
	    // check page map value
	    if( $this->config['type'] != 'all') {
		    $data_network = NetworkModel::where('type', '=', $this->config['type'])->get();
	    } else {
		    $data_network = NetworkModel::all();
	    }

        $lat = $data_mb->lat;
        $long = $data_mb->long;
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
        	'config'	=>	$this->config,
            'data_mien' => $data_mien,
            'data_maker'    => $data_maker,
            'lat'           => $lat,
            'long'          => $long,
            'data_network'  => $data_network
        );

        return view('widgets.network', [
        	'config'	=>	$this->config,
            'data_mien' => $data_mien,
            'data_maker'    => $data_maker,
            'lat'           => $lat,
            'long'          => $long,
            'data_network'  => $data_network
        ]);
    }
}