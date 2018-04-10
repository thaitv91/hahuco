<?php

namespace App\Widgets;

use App\Models\ProductTerm;
use Arrilot\Widgets\AbstractWidget;

class SidebarLeft extends AbstractWidget
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
        $terms = ProductTerm::where('slug', '<>', 'default')->get();

        return view('widgets.sidebar_left', [
            'config' => $this->config,
	        'terms' => $terms
        ]);
    }
}
