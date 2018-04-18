<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\ProductTerm;

class DanhMucSanPham extends AbstractWidget
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

        return view('widgets.danh_muc_san_pham', [
            'config' => $this->config,
            'terms' => $terms
        ]);
    }
}
