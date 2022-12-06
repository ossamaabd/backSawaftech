<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('products')->insert([
            [
                'ProductName' => 'Chai',
                'SupplierId' => '1',
                'UnitPrice' => '150',
            ],

            [
                'ProductName' => 'Rice',
                'SupplierId' => '1',
                'UnitPrice' => '300',
            ],            [
                'ProductName' => 'Sugar',
                'SupplierId' => '2',
                'UnitPrice' => '250',
            ],
            [
                'ProductName' => 'Biscuit',
                'SupplierId' => '3',
                'UnitPrice' => '500',
            ],
        ]);
    }
}
