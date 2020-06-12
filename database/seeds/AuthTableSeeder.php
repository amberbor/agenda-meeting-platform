<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;

class AuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'role_id' => 1,
                'name' => 'Erald Greca',
                'username' => 'admin',
                'email' => 'eraldgreca1999@gmail.com',
                'phone' => '+355695410553',
                'address' => 'Tiranë',
                'description' => 'This is description',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role_id' => 2,
                'name' => 'Erald Greca',
                'username' => 'egreca',
                'email' => 'info@erald.al',
                'phone' => '+355695410553',
                'address' => 'Tiranë',
                'description' => 'This is description',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        Role::insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'slug' => 'admin',
                'guard' => 'web',
                'type' => 'back',
                'permissions' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'Client',
                'slug' => 'client',
                'guard' => 'web',
                'type' => 'front',
                'permissions' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
