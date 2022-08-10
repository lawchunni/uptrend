<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InquiryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inquiries')->insert([
            'name' => 'Some Body',
            'email' => 'some@email.com',
            'phone' => '123-123-4789',
            'message' => 'This is a message.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
