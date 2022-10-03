<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        User::query()->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@sportsmvp.com',
                'password' => Hash::make('password'),
            ], [
                'name' => 'Sanket Kumbhare',
                'email' => 'sanket@gmail.com',
                'password' => Hash::make('password'),
            ], [
                'name' => 'Mayur Zanzane',
                'email' => 'mayur@gmail.com',
                'password' => Hash::make('password'),
            ], [
                'name' => 'Rahul Sulegaonkar',
                'email' => 'rahul@gmail.com',
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
