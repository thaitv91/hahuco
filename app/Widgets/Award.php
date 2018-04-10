<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Award as AwardModel;

class Award extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = ['section_class' => 'awards'];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $awards = AwardModel::orderBy('order', 'asc')->get(['image', 'tooltip']);

        return view('widgets.award', [
            'config'    =>  $this->config,
            'awards'    =>  $awards
        ]);
    }
}
