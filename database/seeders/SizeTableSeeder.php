<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'name' => 'XS',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sizes')->insert([
            'name' => 'S',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sizes')->insert([
            'name' => 'M',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sizes')->insert([
            'name' => 'L',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sizes')->insert([
            'name' => 'XL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sizes')->insert([
            'name' => 'XXL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sizes')->insert([
            'name' => 'XXXL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sizes')->insert([
            'name' => 'XXXXL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
