<?php

namespace App\Console\Commands;

use App\Role;
use App\RoleUser;
use App\User;
use Illuminate\Console\Command;

class UserRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:role {email} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Asigna rol a usuario';

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
        $role = $this->argument('role');

        $user = User::where('email', $email)->first();
        $roleItem = Role::where('name', $role)->first();

        RoleUser::where('user_id', $user->id)->delete();

        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => $roleItem->id
        ]);
    }
}
