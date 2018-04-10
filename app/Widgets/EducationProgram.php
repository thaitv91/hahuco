<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\News as NewsModel;
use App\Models\NewsCategory as Category;

class EducationProgram extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = ['count' => 6, 'cate_slug' => 'chuong-trinh-dao-tao', 'readmore' => false];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $news = new NewsModel;
        $cate = Category::where('slug', $this->config['cate_slug'])->first();

        if (!isset($cate))
            $news = array();
        else
            $news = $cate->news($this->config['count']);

        return view('widgets.education_program', [
            'config' => $this->config,
            'news'  =>  $news
        ]);
    }
}
