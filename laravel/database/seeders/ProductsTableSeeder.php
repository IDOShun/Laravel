<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear table
        DB::table('products')->truncate();

        $products = [
            [
                'name' => 'Spring T-Shirt',
                'description' => 'This is a Spring T-Shirt. By ChatGPT',
                'image' => 'spring-tshirt.jpg',
                'SKU' => 'SP21-SH-M-BK-001',
            ],
            [
                'name' => 'Summer Jacket',
                'description' => 'This is a Summer Jacket. It is perfect for keeping you cool on hot days. By ChatGPT',
                'image' => 'summer-jacket.jpg',
                'SKU' => 'SU22-JK-M-BL-002',
            ],
            [
                'name' => 'Fall Dress',
                'description' => '',
                'image' => 'fall-dress.jpg',
                'SKU' => 'FL23-DR-S-RD-003',
            ],
            [
                'name' => 'Winter Coat',
                'description' => 'This is a warm and cozy Winter Coat. By ChatGPT',
                'image' => 'winter-coat.jpg',
                'SKU' => 'WT21-JK-L-GR-004',
            ],
            [
                'name' => 'Spring Pants',
                'description' => 'These are comfortable and stylish Spring Pants. By ChatGPT',
                'image' => 'spring-pants.jpg',
                'SKU' => 'SP22-PT-L-BK-005',
            ],
        ];

        //register
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
