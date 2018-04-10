<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\IndemnityProvince;
use App\Models\Network;

class IndemnityHealthProfile extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $provinces = IndemnityProvince::all();
        $networks = Network::where( 'type', '=', 'benhvien' )->get();
        $health_facilities = array();
        
        foreach ($networks as $key => $value) {
            array_push($health_facilities, $value->name);
        }

        $health_facilities = json_encode($health_facilities);

        return view('widgets.indemnity_health_profile', [
            'config' => $this->config,
            'provinces' => $provinces,
            'health_facilities' => $health_facilities
        ]);
    }
}
