<?php

namespace App\Widgets;

use App\Models\PageCategory;
use App\Models\Pages;
use Arrilot\Widgets\AbstractWidget;

class DanhSachBoiThuong extends AbstractWidget
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
	    $category = PageCategory::where('slug', '=', 'boi-thuong')->first();
	    $pages = Pages::where('page_categoryid', '=', $category->id)->limit(5)->get();

        return view('widgets.danh_sach_boi_thuong', [
            'config' => $this->config,
	        'pages' => $pages
        ]);
    }
}
