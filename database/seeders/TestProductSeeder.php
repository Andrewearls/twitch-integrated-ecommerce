<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Product;
use App\Store;
use App\Image;

class TestProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store = Store::first();

        Product::factory()->has(Image::factory())->count(10)->create(['store_id' => $store->id]);
    }
}
