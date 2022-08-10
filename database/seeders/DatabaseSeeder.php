<?php

namespace Database\Seeders;

use App\Models\Order_variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UsersTableSeeder::class);
        $this->call(ShippingChargeTableSeeder::class);
        $this->call(TaxTableSeeder::class);
        $this->call(InquiryTableSeeder::class);
        $this->call(UserAddressTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(TransactionTableSeeder::class);
        $this->call(SizeTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductMediaTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(AdvertisementTableSeeder::class);
        $this->call(CategoryProductTableSeeder::class);
        $this->call(OrderProductTableSeeder::class);
    }
}
