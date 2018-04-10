<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\IndemnityProvince;

class IndemnityCarProfile extends AbstractWidget
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

        return view('widgets.indemnity_car_profile', [
            'config' => $this->config,
            'provinces' => $provinces
        ]);
    }
}
