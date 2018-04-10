<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Partner as PartnerModel;

class Partner extends AbstractWidget
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
        $partners = PartnerModel::orderBy('order', 'ASC')->get();

        return view('widgets.partner', [
            'config' => $this->config,
            'partners' => $partners
        ]);
    }
}
