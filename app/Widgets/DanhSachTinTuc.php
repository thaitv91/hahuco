<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\News;

class DanhSachTinTuc extends AbstractWidget
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
		$news = News::paginate(10);
        return view('widgets.danh_sach_tin_tuc', [
            'config' => $this->config,
	        'news' => $news
        ]);
    }
}
