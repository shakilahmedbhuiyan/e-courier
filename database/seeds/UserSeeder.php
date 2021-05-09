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
            'name' => 'Test User 2',
            'email' => 'user2@test.com',
            'phone' => '01842000000',
            'address' => 'Brahmanbaria',
            'verification_code' => '12345',
            'password' => Hash::make('password'),

        ]);
    }
}
