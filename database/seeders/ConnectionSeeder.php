<?php

namespace Database\Seeders;

use App\Models\Connection;
use Illuminate\Database\Seeder;

class ConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Connection::create([
            'amt' => '100',
            'deb_stock' => '4',
            'cred_stock' => '1', 
            'product_id' => '1',
        ]);
    }
}
