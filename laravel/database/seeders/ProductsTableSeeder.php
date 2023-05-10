<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        // DB::table('products')->truncate();
        // $uuid = (string) Str::uuid();

        $products = [
            [
                'name' => 'Spring T-Shirt',
                'description' => 'This is a Spring T-Shirt. By ChatGPT',
                'SKU' => 'SP21-SH-M-BK-001',
                // 'uuid' => (string) Str::uuid(),
            ],
            [
                'name' => 'Summer Jacket',
                'description' => 'This is a Summer Jacket. It is perfect for keeping you cool on hot days. By ChatGPT',
                'SKU' => 'SU22-JK-M-BL-002',
                // 'uuid' => (string) Str::uuid(),
            ],
            [
                'name' => 'Fall Dress',
                'SKU' => 'FL23-DR-S-RD-003',
                // 'uuid' => (string) Str::uuid(),
            ],
            [
                'name' => 'Winter Coat',
                'description' => 'This is a warm and cozy Winter Coat. By ChatGPT',
                'SKU' => 'WT21-JK-L-GR-004',
                // 'uuid' => (string) Str::uuid(),
            ],
            [
                'name' => 'Spring Pants',
                'description' => 'These are comfortable and stylish Spring Pants. By ChatGPT',
                'SKU' => 'SP22-PT-L-BK-005',
                // 'uuid' => (string) Str::uuid(),
            ],
        ];

        //register
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
