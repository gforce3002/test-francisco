<?php

namespace App\Mail;

use App\Configuration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password, $web)
    {
        $this->user = $user;
        $this->password = $password;
        $this->web = $web;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.register', [
            'user' => $this->user,
            'password' => $this->password,
            'web' => $this->web
        ])->subject('Bienvenido a ' . env('APP_NAME'));
    }

    private $user;
    private $password;
    private $web;
}
