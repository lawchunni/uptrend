<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShippingChargeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_charges')->insert([
            'continent' => 'North America',
            'country' => 'Canada',
            'charge' => 5.99,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('shipping_charges')->insert([
            'continent' => 'Overseas',
            'country' => 'Overseas',
            'charge' => 29.99,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
