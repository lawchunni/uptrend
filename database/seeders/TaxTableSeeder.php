<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxes')->insert([
            'province' => 'Alberta',
            'province_short' => 'AB',
            'gst' => 0.05,
            'pst' => 0,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'British Columbia',
            'province_short' => 'BC',
            'gst' => 0.05,
            'pst' => 0.07,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'Manitoba',
            'province_short' => 'MB',
            'gst' => 0.05,
            'pst' => 0.07,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'New Brunswick',
            'province_short' => 'NB',
            'gst' => 0,
            'pst' => 0,
            'hst' => 0.15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'Newfoundland and Labrador',
            'province_short' => 'NL',
            'gst' => 0,
            'pst' => 0,
            'hst' => 0.15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'Northwest Territories',
            'province_short' => 'NT',
            'gst' => 0.05,
            'pst' => 0,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'Nova Scotia',
            'province_short' => 'NS',
            'gst' => 0,
            'pst' => 0,
            'hst' => 0.15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'Nunavut',
            'province_short' => 'NU',
            'gst' => 0.05,
            'pst' => 0,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'Ontario',
            'province_short' => 'ON',
            'gst' => 0,
            'pst' => 0,
            'hst' => 0.13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'Prince Edward Island',
            'province_short' => 'PE',
            'gst' => 0,
            'pst' => 0,
            'hst' => 0.15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'Quebec',
            'province_short' => 'QC',
            'gst' => 0.05,
            'pst' => 0.09975,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'Saskatchewan',
            'province_short' => 'SK',
            'gst' => 0.05,
            'pst' => 0.06,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'Yukon',
            'province_short' => 'YT',
            'gst' => 0.05,
            'pst' => 0,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
