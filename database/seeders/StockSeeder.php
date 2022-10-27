<?php

namespace Database\Seeders;

use App\Models\Barn;
use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barn = [
            [
                'name' => 'Stock_1',
            ],
            [
                'name' => 'Stock_2',

            ],
            [
                'name' => 'Stock_3',

            ],

            [
                'name' => 'sale_Stock',
            ],
            [
                'name' => 'buy_Stock',
            ],
        ];

        foreach ($barn as $value) {
            Stock::create($value);
        }
    }
}
