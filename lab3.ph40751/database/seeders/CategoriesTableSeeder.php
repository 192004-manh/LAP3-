<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{  

    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Truyền Cảm Hứng'],
            ['name' => 'Sách Tiếng Anh'],
            ['name' => 'Sách Tiên Hiệp'],
            ['name' => 'Truyện Tiếu Lâm '],
            ['name' => 'Sách Kinh Thánh'],
        ]);
    }
}
