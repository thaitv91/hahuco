<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Slider;
use PackagePage\Pages\Models\Pages;

class BannerSlider extends AbstractWidget
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
    public function run($page)
    {
        // $page = Pages::where('slug', $page_slug)->firstOrFail();
        $slider =  Slider::where('name', $page->getContentofField('homepage-banner-slider'))->first();
        $images = $slider->count() > 0 ? $slider->images : array();

        return view('widgets.banner_slider', [
            'config'    =>  $this->config,
            'images'    =>  $images,
            'page'      =>  $page
        ]);
    }
}
