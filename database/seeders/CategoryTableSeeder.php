<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'Top',
            'image' => '124132413.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Bottom',
            'image' => 'adas12225sdasd.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'One-piece',
            'image' => 'ccxdfe445644ds.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Jeans',
            'image' => 'fghvacadad.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Casual',
            'image' => 'fghvacadad.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Leisure',
            'image' => 'fghvacadad.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Sports',
            'image' => 'fghvacadad.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Featured',
            'image' => 'fghvacadad.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Co-ords',
            'image' => 'fghvacadad.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Jackets',
            'image' => 'fghvacadad.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Shorts',
            'image' => 'fghvacadad.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('categories')->insert([
            'title' => 'Shirts',
            'image' => 'fghvacadad.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
