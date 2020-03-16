<?php

namespace App\Console\Commands;

use App\Mail\RegisterUser;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailRegister extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:mail {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends mail to registered user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        $user = User::where('email', $email)->first();

        Mail::to($email)->send(new RegisterUser($user, $password, false));
    }
}
