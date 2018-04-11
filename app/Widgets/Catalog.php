<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Catalog extends AbstractWidget
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
        //
	    $catalogs = \App\Models\RecruitmentResume::simplePaginate(5);
        return view('widgets.catalog', [
            'config' => $this->config,
	        'catalogs' => $catalogs
        ]);
    }
}
