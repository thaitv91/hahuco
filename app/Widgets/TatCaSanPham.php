<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class TatCaSanPham extends AbstractWidget
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
		$products = \App\Models\Product::simplePaginate(8);
        return view('widgets.tat_ca_san_pham', [
            'config' => $this->config,
	        'products' => $products
        ]);
    }
}
