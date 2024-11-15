<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Stock;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            OwnerSeeder::class,
            ShopSeeder::class,
            ImagesTableSeeder::class,
            CategoriesTableSeeder::class,
            // ProductsTableSeeder::class,
            // StocksTableSeeder::class,
            UsersSeederTable::class,
        ]);
        Product::factory(100)->create();
        Stock::factory(100)->create();
    }
}
