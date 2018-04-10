<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Testimonial as TestimonialModel;

class Testimonial extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = ['section_class' => 'testimonials'];
    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $testimonials = TestimonialModel::all();

        return view('widgets.testimonial', [
            'config' => $this->config,
            'testimonials' => $testimonials
        ]);
    }
}
