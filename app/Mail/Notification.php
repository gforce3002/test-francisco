<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    private $content;
    /**
     * Create a new message instance.
     *
     * @param String content
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Build the content.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.notification', [
          'content' => $this->content
        ]);
    }
}
