<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Recruitment;

class RecruitmentSlide extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = ['count' => 6, 'title' => 'Thông tin tuyển dụng', 'addon_class' => '', 'section_class' => 'news', 'readmore' => 0, 'cate_slug' => 'thong-tin-tuyen-dung'];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $recruitments = Recruitment::orderBy('created_at', 'desc')->paginate($this->config['count']);

        return view('widgets.recruitment_slide', [
            'config' => $this->config,
            'recruitments' => $recruitments
        ]);
    }
}
