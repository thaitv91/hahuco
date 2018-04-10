<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class ContactNotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    protected $template;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $template)
    {
        $this->data = $data;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->template)
                    ->with(['data' => $this->data]);
    }
}
