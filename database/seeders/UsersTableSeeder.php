<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Manager',
            'phone' => '123-123-1234',
            'email' => 'admin@gmail.com',
            'password' => password_hash('P@ssw0rd', PASSWORD_DEFAULT),
            'default_address_id' => 1,
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'first_name' => 'Test',
            'last_name' => 'User',
            'phone' => '321-321-4321',
            'email' => 'test@gmail.com',
            'password' => password_hash('P@ssw0rd', PASSWORD_DEFAULT),
            'default_address_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
