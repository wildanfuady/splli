<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'administrator@gmail.com',
            'password' => Hash::make('admin123'),
            'password_show' => 'admin123',
            'role' => 'admin',
            'image' => 'logo.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        // DB::table('users')->insert([
        //     'name' => 'Wildan Fuady',
        //     'email' => 'wildanfuady@gmail.com',
        //     'password' => Hash::make('admin123'),
        //     'role' => 'pakar',
        //     'created_at' => \Carbon\Carbon::now(),
        //     'email_verified_at' => \Carbon\Carbon::now()
        // ]);
    }
}
