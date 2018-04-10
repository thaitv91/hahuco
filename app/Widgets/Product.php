<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\ProductTerm as Term;

class Product extends AbstractWidget
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
        $terms = Term::where('slug', '<>', 'default')->limit(5)->get();
        
        return view('widgets.product', [
            'config' => $this->config,
            'terms' =>  $terms
        ]);
    }
}
