<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id' => 1,
            'gst' => 1.15,
            'pst' => 1.36,
            'hst' => 0,
            'sub_total' => 42.36,
            'shipping_charge' => 5,
            'total' => 51.69,
            'order_status' => 'pending',
            'shipping_address' => '85 Good Ave, Calgary, Alberta, Canada, E4G 9C7',
            'billing_address' => '85 Good Ave, Calgary, Alberta, Canada, E4G 9C7',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('orders')->insert([
            'user_id' => 1,
            'gst' => 9.58,
            'pst' => 7.64,
            'hst' => 0,
            'sub_total' => 162.38,
            'shipping_charge' => 9.63,
            'total' => 209.12,
            'order_status' => 'confirmed',
            'shipping_address' => '135 Nice Street, Lansord, British Columbia, Canada, D7X 8Y3',
            'billing_address' => '135 Nice Street, Lansord, British Columbia, Canada, D7X 8Y3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('orders')->insert([
            'user_id' => 1,
            'gst' => 9.58,
            'pst' => 7.64,
            'hst' => 0,
            'sub_total' => 162.38,
            'shipping_charge' => 9.63,
            'total' => 209.12,
            'order_status' => 'confirmed',
            'shipping_address' => '135 Nice Street, Lansord, British Columbia, Canada, D7X 8Y3',
            'billing_address' => '135 Nice Street, Lansord, British Columbia, Canada, D7X 8Y3',
            'created_at' =>  Carbon::parse('2022-01-01'),
            'updated_at' => now()
        ]);
        DB::table('orders')->insert([
            'user_id' => 1,
            'gst' => 9.58,
            'pst' => 7.64,
            'hst' => 0,
            'sub_total' => 162.38,
            'shipping_charge' => 9.63,
            'total' => 209.12,
            'order_status' => 'confirmed',
            'shipping_address' => '135 Nice Street, Lansord, British Columbia, Canada, D7X 8Y3',
            'billing_address' => '135 Nice Street, Lansord, British Columbia, Canada, D7X 8Y3',
            'created_at' =>  Carbon::parse('2022-05-01'),
            'updated_at' => now()
        ]);
    }
}
