<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories_data = array(
            ['category_name' => 'Skincare'],
        );

        $brand_data = array(
            ['category_name' => 'Royal Jelly', 'brand_id' => 1],
            ['category_name' => 'Royal Revitalize', 'brand_id' => 1]

        );

        DB::table('categories')->insertOrIgnore($categories_data);

        DB::table('categories')->insert($brand_data);
    }
}
