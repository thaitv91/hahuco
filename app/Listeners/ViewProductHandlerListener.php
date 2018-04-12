<?php

namespace App\Listeners;

use App\Events\ViewProductHandler;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ViewProductHandlerListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ViewProductHandler  $event
     * @return void
     */
    public function handle(ViewProductHandler $event)
    {
        $prodcut = $event->product;

        $prodcut->increment('view_count');
    }
}
