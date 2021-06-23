<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
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
        $product = new Product();
        $product->name = 'Product 001';
        $product->description = 'Product Code 001';
        $product->price = 1.5;
        $product->view_count = 0;
        $product->save();

        $product = new Product();
        $product->name = 'Product 002';
        $product->description = 'Product Code 002';
        $product->price = 2.5;
        $product->view_count = 0;
        $product->save();

        $product = new Product();
        $product->name = 'Product 003';
        $product->description = 'Product Code 003';
        $product->price = 3.7;
        $product->view_count = 0;
        $product->save();

        $product = new Product();
        $product->name = 'Product 004';
        $product->description = 'Product Code 004';
        $product->price = 4.8;
        $product->view_count = 0;
        $product->save();
    }
}
