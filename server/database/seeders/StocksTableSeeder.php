<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_stocks')->insert([
            [
                'product_id' => 1,
                'type' => 1,
                'quantity' => 10,
            ],
            [
                'product_id' => 1,
                'type' => 1,
                'quantity' => -2,
            ],
        ]);
    }
}
