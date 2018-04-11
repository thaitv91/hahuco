<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class DanhSachTuyenDung extends AbstractWidget
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
		$recruitments = \App\Models\Recruitment::simplePaginate(5);
        return view('widgets.danh_sach_tuyen_dung', [
            'config' => $this->config,
	        'recruitments' => $recruitments
        ]);
    }
}
