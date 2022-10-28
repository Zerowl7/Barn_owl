<?php

namespace Database\Seeders;

use App\Models\MovementProduct;
use Illuminate\Database\Seeder;

class MovementProductSeeder extends Seeder
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
                'doc_id' => '1',
                'doc_type' => 'DocumentSaleproduct',
                'stock_id' => '1',
                'product_id' => '2',
                

            ],
            [
                'stock' => '20',

                'doc_id' => '2',
                'doc_type' => 'DocumentSaleproduct',
                'stock_id' => '1',
                'product_id' => '3',
                

            ],
            [
                'stock' => '20',

                'doc_id' => '3',
                'doc_type' => 'DocumentSaleproduct',
                'stock_id' => '1',
                'product_id' => '3',
                

            ],

            
        ];

        foreach ($moves as $move) {
            MovementProduct::create($move);
        }
    }
}
