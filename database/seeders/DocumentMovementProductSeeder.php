<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentMovementProduct;

class DocumentMovementProductSeeder extends Seeder
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
                'type' => 'DocumentReceiptProduct',
                'title' => 'Документ Покупки',
                'stock_id' => '5',
                'deb_stock_id' => '2'



            ],
            [
                'type' => 'DocumentReceiptProduct',
                'title' => 'Документ Покупки',
                'stock_id' => '5',
                'deb_stock_id' => '1'



            ],
            [
                'type' => 'DocumentReceiptProduct',
                'title' => 'Документ Покупки',
                'stock_id' => '5',
                'deb_stock_id' => '3'



            ],


        ];

        foreach ($moves as $move) {
            DocumentMovementProduct::create($move);
        }
    }
}
