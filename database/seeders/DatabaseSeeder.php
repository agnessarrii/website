<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data = array(
            [
                'name' => 'Admin',
                'username' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'User',
                'username' => 'User',
                'email' => 'user@user.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('password'),
                'role' => 'user',
            ],
            [
                'name' => 'Rental',
                'username' => 'Rental',
                'email' => 'rental@rental.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('password'),
                'role' => 'rental',
            ],
        );
        foreach($data AS $d){
            User::create([
                'name' => $d['name'],
                'username' => $d['username'],
                'email' => $d['email'],
                'email_verified_at' => $d['email_verified_at'],
                'password' => $d['password'],
                'role' => $d['role']
            ]);
        }
    }
}