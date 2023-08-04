<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'img' => 'path/to/image1.jpg',
            'name' => 'Product 1',
            'price' => 19.99,
        ]);

        Product::create([
            'img' => 'path/to/image2.jpg',
            'name' => 'Product 2',
            'price' => 29.99,
        ]);
    }
}
