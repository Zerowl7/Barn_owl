<?php

namespace Database\Seeders;

use App\Models\DocumentSaleProduct;
use Illuminate\Database\Seeder;

class DocumentSaleProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moves = [
            [
                'amt' => '-10',

                'type' => 'DocumentSaleProduct',
                'title' => 'Документ Продажи',
                'stock_id' => '1',
               
                

            ],
            [
                'amt' => '-10',

                'type' => 'DocumentSaleProduct',
                'title' => 'Документ Продажи',
                'stock_id' => '1',

                

            ],
            [
                'amt' => '-10',

                'type' => 'DocumentSaleProduct',
                'title' => 'Документ Продажи',
                'stock_id' => '1',

                

            ],

            
        ];

        foreach ($moves as $move) {
            DocumentSaleProduct::create($move);
        }
    }
}
