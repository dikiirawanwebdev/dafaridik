<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin DAFARIDIK',
            'email' => 'dafaridik@gmail.com',
            'password' => 'dafaridik123',
            'is_admin' => true,
        ]);
    }
}
