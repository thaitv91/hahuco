<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class SanPhamMoi extends AbstractWidget
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
	    $products = \App\Models\Product::orderBy('created_at', 'DESC')->limit(8)->get();
        return view('widgets.san_pham_moi', [
            'config' => $this->config,
	        'products' => $products
        ]);
    }
}
