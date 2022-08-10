<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserAddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_addresses')->insert([
            'user_id' => '1',
            'street' => '78 Good Ave',
            'city' => 'Winnipeg',
            'province' => 'Manitoba',
            'country' => 'Canada',
            'postal_code' => 'R3B 8D3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('user_addresses')->insert([
            'user_id' => '2',
            'street' => '135 Main Street',
            'city' => 'Ottawa',
            'province' => 'Ontario',
            'country' => 'Canada',
            'postal_code' => 'T4F 9H7',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('user_addresses')->insert([
            'user_id' => '2',
            'street' => '256 Nice Ave',
            'city' => 'Calgary',
            'province' => 'Alberta',
            'country' => 'Canada',
            'postal_code' => 'A7C 3S4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('user_addresses')->insert([
            'user_id' => '2',
            'street' => '37 Awesome Ave',
            'city' => 'Lansord',
            'province' => 'Nova Scotia',
            'country' => 'Canada',
            'postal_code' => 'E7X 3G4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('user_addresses')->insert([
            'user_id' => '1',
            'street' => '1354 Johnson Street',
            'city' => 'Brandon',
            'province' => 'Prince Edward Island',
            'country' => 'Canada',
            'postal_code' => 'W0Z 8K2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
