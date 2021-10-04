<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => 'レディースファッション',
                'sort_order' => 1,
            ],
            [
                'name' => '腕時計',
                'sort_order' => 2,
            ],
            [
                'name' => '靴',
                'sort_order' => 3,
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'トップス',
                'primary_category_id' => 1,
                'sort_order' => 1,
            ],
            [
                'name' => '男女兼用腕時計',
                'primary_category_id' => 2,
                'sort_order' => 2,
            ],
            [
                'name' => 'スニーカー',
                'primary_category_id' => 3,
                'sort_order' => 3,
            ],
            [
                'name' => 'ブーツ',
                'primary_category_id' => 3,
                'sort_order' => 4,
            ],
            [
                'name' => 'ワンピース',
                'primary_category_id' => 1,
                'sort_order' => 5,
            ],
            [
                'name' => '懐中時計',
                'primary_category_id' => 2,
                'sort_order' => 6,
            ],
        ]);
    }
}
