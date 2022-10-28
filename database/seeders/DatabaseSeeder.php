<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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

            UserSeeder::class,

            StockSeeder::class,

            ProductSeeder::class,

            DocumentReceiptProductSeeder::class,

            DocumentSaleProductSeeder::class,

            DocumentMovementProductSeeder::class,

            MovementProductSeeder::class,

            MovementDocumentSeeder::class,

        
            
            ]);
    }
}
