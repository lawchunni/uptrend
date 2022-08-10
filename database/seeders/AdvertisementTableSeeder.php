<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdvertisementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advertisements')->insert([
            'image' => 'sidebar-1.jpg',
            'title' => 'All Sale',
            'link' => '/product',
            'pages' => 'product-list',
            'area' => 'sidebar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('advertisements')->insert([
            'image' => 'sidebar-2.jpg',
            'title' => 'Limit Offer',
            'link' => '/product?category=Casual',
            'pages' => 'product-list',
            'area' => 'sidebar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('advertisements')->insert([
            'image' => 'sidebar-3.jpg',
            'title' => 'Girls Collection',
            'link' => '/girls/product',
            'pages' => 'product-list',
            'area' => 'sidebar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('advertisements')->insert([
            'image' => 'sidebar-4.jpg',
            'title' => 'Boys Collection',
            'link' => '/boys/product',
            'pages' => 'product-list',
            'area' => 'sidebar',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('advertisements')->insert([
            'image' => 'strap-1.jpg',
            'title' => 'All Sale',
            'link' => '/product',
            'pages' => 'product-detail',
            'area' => 'top',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('advertisements')->insert([
            'image' => 'strap-2.jpg',
            'title' => 'Limit Offer',
            'link' => '/product?category=Casual',
            'pages' => 'product-detail',
            'area' => 'top',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('advertisements')->insert([
            'image' => 'strap-3.jpg',
            'title' => 'Girls Collection',
            'link' => '/girls/product',
            'pages' => 'product-detail',
            'area' => 'top',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('advertisements')->insert([
            'image' => 'strap-4.jpg',
            'title' => 'Boys Collection',
            'link' => '/boys/product',
            'pages' => 'product-detail',
            'area' => 'top',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('advertisements')->insert([
            'image' => 'slider1.png',
            'title' => 'Summer Collection',
            'link' => '/product?category=Leisure',
            'pages' => 'home',
            'area' => 'slider',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('advertisements')->insert([
            'image' => 'slider2.jpg',
            'title' => 'Men Collection',
            'link' => '/men/product',
            'pages' => 'home',
            'area' => 'slider',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('advertisements')->insert([
            'image' => 'slider3.jpg',
            'title' => 'Women Collection',
            'link' => '/women/product',
            'pages' => 'home',
            'area' => 'slider',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
