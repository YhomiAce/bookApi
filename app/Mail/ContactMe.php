<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMe extends Mailable
{
    use Queueable, SerializesModels;
    public $point;

    /**
     * Create a new point instance.
     *
     * @return void
     */
    public function __construct($point)
    {
        $this->point = $point;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('practice.contact-me')
                    ->subject('Tmail Support');
    }
}
