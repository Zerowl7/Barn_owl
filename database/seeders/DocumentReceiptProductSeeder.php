<?php

namespace Database\Seeders;

use App\Models\DocumentReceiptProduct;
use Illuminate\Database\Seeder;

class DocumentReceiptProductSeeder extends Seeder
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
                'stock' => '20',

                'type' => 'DocumentReceiptProduct',
                'title' => 'Документ Покупки',
                'stock_id' => '1',
               
                

            ],
            [
                'stock' => '30',

                'type' => 'DocumentReceiptProduct',
                'title' => 'Документ Покупки',
                'stock_id' => '2',

                

            ],
            [
                'stock' => '10',

                'type' => 'DocumentReceiptProduct',
                'title' => 'Документ Покупки',
                'stock_id' => '3',

                

            ],

            
        ];

        foreach ($moves as $move) {
            DocumentReceiptProduct::create($move);
        }
    }
}
