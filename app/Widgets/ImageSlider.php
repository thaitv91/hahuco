<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Slider;

class ImageSlider extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
	    'slider_slug' => 'san-pham'
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
    	$slider_slug = $this->config['slider_slug'];
       $slider =  Slider::where('slug', $slider_slug)->first();
       $images = $slider->count() > 0 ? $slider->images : array();

        return view('widgets.image_slider', [
            'config' => $this->config,
            'images'    =>  $images,
        ]);
    }
}
