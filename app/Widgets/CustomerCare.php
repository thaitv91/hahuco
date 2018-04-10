<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\PageField;
use App\Models\PageCategory;

class CustomerCare extends AbstractWidget
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
        $pageCategory = PageCategory::where('slug', 'cham-soc-khach-hang')->first();
        $pages = isset($pageCategory) ? $pageCategory->pages : array();

        return view('widgets.customer_care', [
            'config'        =>  $this->config,
            'pages'    =>  $pages
        ]);
    }
}
