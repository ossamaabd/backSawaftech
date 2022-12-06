<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->insert([
            [
                'OrderId' => '1',
                'ProductId' => '4',
                'UnitPrice' => '500',
                'Quantity' => '2',
            ],
            [
                'OrderId' => '2',
                'ProductId' => '3',
                'UnitPrice' => '300',
                'Quantity' => '1',
            ],
            [
                'OrderId' => '2',
                'ProductId' => '2',
                'UnitPrice' => '300',
                'Quantity' => '1',
            ],
        ]);
    }
}
