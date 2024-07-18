<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence,
                'thumbnail' => $faker->imageUrl(200, 300, 'books'),
                'author' => $faker->name,
                'publisher' => $faker->company,
                'publication' => $faker->dateTime,
                'price' => $faker->randomFloat(2, 10, 100),
                'quantity' => $faker->numberBetween(1, 50),
                'category_id' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}

