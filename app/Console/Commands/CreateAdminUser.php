<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CreateAdminUser extends Command
{
    protected $signature = 'make:admin';
    protected $description = 'Create an admin user';

    public function handle()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@library.com',
            'password' => bcrypt('AdminPassword123!')
        ]);
        
        $this->info('Admin user created successfully!');
        $this->info('Email: admin@library.com');
        $this->info('Password: AdminPassword123!');
    }
}