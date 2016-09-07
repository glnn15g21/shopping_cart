<?php

use Illuminate\Database\Seeder;
use App\Products;
class productsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('products')->insert([
            'imagePath' => 'http://img.timeinc.net/time/2007/harry_potter/hp_books/sorce_stone.jpg',
            'price' => 300,
            'description' => '1There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
            'title' => 'Harry potter 5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

         DB::table('products')->insert([
            'imagePath' => 'http://www.abebooks.com/images/books/harry-potter/deathly-hallows.jpg',
            'price' => 30,
            'description' => '25There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
            'title' => 'Harry potter 5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
         DB::table('products')->insert([
            'imagePath' => 'http://www.abebooks.com/images/books/harry-potter/sorcerers-stone.jpg',
            'price' => 39,
            'description' => '35There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
            'title' => 'Harry potter 5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
         DB::table('products')->insert([
            'imagePath' => 'http://www.abebooks.com/images/books/harry-potter/philosophers-stone.jpg',
            'price' => 37,
            'description' => '45There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
            'title' => 'Harry potter 5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
         DB::table('products')->insert([
            'imagePath' => 'http://www.abebooks.com/images/books/harry-potter/philosophers-stone.jpg',
            'price' => 36,
            'description' => '55There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
            'title' => 'Harry potter 5',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

    }
}
