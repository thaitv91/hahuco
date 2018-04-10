<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\News as NewsModel;
use App\Models\NewsCategory as Category;

class News extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'count' =>  6,
        'cate_slug' => '',
        'title' => '',
        'addon_class' => '',
        'section_class' => 'news',
        'readmore' => 0,
    ];
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        if ($this->config['title'] == '') 
            $this->config['title'] = trans('frontend/home.news');

        $news = new NewsModel;
        if ($this->config['cate_slug'] == '')
            $news = $news->OrderBy('created_at', 'desc')->limit($this->config['count'])->get();
        else {
            $cate = Category::where('slug', $this->config['cate_slug'])->first();
            
            if (!isset($cate))
                $news = array();
            else
                $news = $cate->news($this->config['count']);
        }

        return view('widgets.news', [
            'config' => $this->config,
            'news' => $news,
	        'section_class' => $this->config['section_class']
        ]);
    }
}
