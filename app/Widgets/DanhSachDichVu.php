<?php

namespace App\Widgets;

use App\Models\DichVu;
use Arrilot\Widgets\AbstractWidget;

class DanhSachDichVu extends AbstractWidget
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
	    $dichvu = DichVu::simplePaginate(5);

        return view('widgets.danh_sach_dich_vu', [
            'config' => $this->config,
	        'dichvu' => $dichvu
        ]);
    }
}
