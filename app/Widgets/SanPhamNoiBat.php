<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class SanPhamNoiBat extends AbstractWidget
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
	    $products = \App\Models\Product::where('noi_bat', '=', 1)->limit(12)->get();
        return view('widgets.san_pham_noi_bat', [
            'config' => $this->config,
	        'products' => $products
        ]);
    }
}
