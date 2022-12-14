<?php

namespace Database\Seeders;

use App\Models\MovementDocument;
use Illuminate\Database\Seeder;

class MovementDocumentSeeder extends Seeder
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
                'doc_id' => '1',
                'type' => 'MovementDocument',
                'stock_id' => '1',
                

            ],
            [
                'amt' => '20',
                'doc_id' => '1',
                'type' => 'MovementDocument',
                'stock_id' => '1',

            ],
            [
                'amt' => '20',
                'doc_id' => '1',
                'type' => 'MovementDocument',
                'stock_id' => '1',

            ],

            
        ];

        foreach ($moves as $move) {
            MovementDocument::create($move);
        }
    }
}
