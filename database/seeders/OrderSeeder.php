<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'OrderDate' => '2020-5-7',
                'OrderNumber' => '5',
                'CustomerId' => '1',
                'TotalAmount' => '1000',
            ],
            [
                'OrderDate' => '2020-8-14',
                'OrderNumber' => '8',
                'CustomerId' => '2',
                'TotalAmount' => '600',
            ],
        ]);
    }
}
