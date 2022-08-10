<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            'name' => 'women',
            'image' => 'gender/women.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('genders')->insert([
            'name' => 'men',
            'image' =>  'gender/men.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('genders')->insert([
            'name' => 'girls',
            'image' => 'gender/girls.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('genders')->insert([
            'name' => 'boys',
            'image' => 'gender/boys.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
