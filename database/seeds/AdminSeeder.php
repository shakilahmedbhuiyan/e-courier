<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'System Admin',
            'email' => 'admin@test.com',
            'phone' => '01751069457',
            'address' => 'Brahmanbaria',
            'verification_code' => '12345',
            'password' => Hash::make('password'),

        ]);
    }
}
