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
    protected $config = [
    	'term_id' => ''
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
	    if ($this->config['term_id'] == '') {
		    $products = \App\Models\Product::simplePaginate(8);
	    } else {
		    $products = \App\Models\Product::where('product_term_id', '=', $this->config['term_id'])->simplePaginate(8);
	    }
        return view('widgets.tat_ca_san_pham', [
            'config' => $this->config,
	        'products' => $products
        ]);
    }
}
