<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Classic White Shirt',
                'price' => 29.99,
                'description' => 'A timeless white shirt made from premium cotton.',
                'categoryID' => 1,
                'remainProduct' => 5,
                'product_photo' => 'pictures/Classic White Shirt.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Blue Denim Shirt',
                'price' => 39.99,
                'description' => 'A rugged denim shirt, perfect for casual wear.',
                'categortID' => 4,
                'remainProduct' => 5,
                'product_photo' => 'pictures/Blue Denim Shirt.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Black Slim Fit Shirt',
                'price' => 34.99,
                'description' => 'A modern black shirt with a slim fit design.',
                'categortID' => 5,
                'remainProduct' => 5,
                'product_photo' => 'pictures/Black Slim Fit Shirt.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Floral Summer Shirt',
                'price' => 24.99,
                'description' => 'A vibrant floral shirt, ideal for summer outings.',
                'categortID' => 3,
                'remainProduct' => 5,
                'product_photo' => 'pictures/Floral Summer Shirt.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Checked Casual Shirt',
                'price' => 27.99,
                'description' => 'A classic checked shirt for everyday comfort.',
                'categortID' => 1,
                'remainProduct' => 5,
                'product_photo' => 'pictures/Checked Casual Shirt.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Striped Office Shirt',
                'price' => 32.99,
                'description' => 'A smart striped shirt perfect for the office.',
                'categortID' => 6,
                'remainProduct' => 5,
                'product_photo' => 'pictures/Striped Office Shirt.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Casual Linen Shirt',
                'price' => 35.50,
                'description' => 'A light and breathable linen shirt, great for casual days.',
                'categortID' => 1,
                'remainProduct' => 5,
                'product_photo' => 'pictures/Casual Linen Shirt.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Graphic Tee',
                'price' => 19.99,
                'description' => 'A fun graphic tee for relaxed weekends.',
                'categortID' => 7,
                'remainProduct' => 5,
                'product_photo' => 'pictures/Graphic Tee.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Plaid Flannel Shirt',
                'price' => 29.50,
                'description' => 'A warm plaid flannel shirt for colder weather.',
                'categortID' => 1,
                'remainProduct' => 5,
                'product_photo' => 'pictures/Plaid Flannel Shirt.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Short Sleeve Polo Shirt',
                'price' => 22.99,
                'description' => 'A comfortable short sleeve polo, perfect for casual or sporty wear.',
                'categortID' => 2,
                'remainProduct' => 5,
                'product_photo' => 'pictures/Short Sleeve Polo Shirt.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ]);
    }
}
