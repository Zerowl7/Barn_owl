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
                'amt' => '20',
                'type' => 'DocumentReceiptProduct',
                'title' => 'Поступление товара',
                'stock_id' => '1',
           ],
            [
                'amt' => '30',

                'type' => 'DocumentReceiptProduct',
                'title' => 'Поступление товара',
                'stock_id' => '2',

                

            ],
            [
                'amt' => '10',

                'type' => 'DocumentReceiptProduct',
                'title' => 'Поступление товара',
                'stock_id' => '3',

                

            ],

            
        ];

        foreach ($moves as $move) {
            DocumentReceiptProduct::create($move);
        }
    }
}
