<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_product')->insert([
            'order_id' => 1,
            'product_id' => 1,
            'unit_price' => 7.99,
            'quantity' => 1,
            'line_price' => 7.99,
            'product_name' => 'Default Product Name',
            'size' => 'L',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('order_product')->insert([
            'order_id' => 1,
            'product_id' => 2,
            'unit_price' => 6.99,
            'quantity' => 2,
            'line_price' => 13.98,
            'product_name' => 'Default Product Name',
            'size' => 'M',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('order_product')->insert([
            'order_id' => 2,
            'product_id' => 23,
            'unit_price' => 16.99,
            'quantity' => 3,
            'line_price' => 52.38,
            'product_name' => 'Nice Product Name 123456',
            'size' => 'S',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('order_product')->insert([
            'order_id' => 2,
            'product_id' => 12,
            'unit_price' => 25.99,
            'quantity' => 1,
            'line_price' => 25.99,
            'product_name' => 'Awesome Product Name Bla bla',
            'size' => 'XL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('order_product')->insert([
            'order_id' => 2,
            'product_id' => 35,
            'unit_price' => 43.69,
            'quantity' => 2,
            'line_price' => 87.58,
            'product_name' => 'Fabulous Product Name Hahaha',
            'size' => 'XXL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('order_product')->insert([
            'order_id' => 3,
            'product_id' => 12,
            'unit_price' => 25.99,
            'quantity' => 1,
            'line_price' => 25.99,
            'product_name' => 'Awesome Product Name Bla bla',
            'size' => 'XL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('order_product')->insert([
            'order_id' => 3,
            'product_id' => 35,
            'unit_price' => 43.69,
            'quantity' => 2,
            'line_price' => 87.58,
            'product_name' => 'Fabulous Product Name Hahaha',
            'size' => 'XXL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('order_product')->insert([
            'order_id' => 4,
            'product_id' => 12,
            'unit_price' => 25.99,
            'quantity' => 1,
            'line_price' => 25.99,
            'product_name' => 'Awesome Product Name Bla bla',
            'size' => 'XL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('order_product')->insert([
            'order_id' => 4,
            'product_id' => 35,
            'unit_price' => 43.69,
            'quantity' => 2,
            'line_price' => 87.58,
            'product_name' => 'Fabulous Product Name Hahaha',
            'size' => 'XXL',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
