<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            [

                'CompanyName' => 'SwafTech',
                'ContactName' => 'Ahmad',
                'City' => 'Damascus',
                'Country' => 'Syria',
                'Phone' => '33324587',
                'Fax' => '33324588',
            ],
            [
                'CompanyName' => 'Durra',
                'ContactName' => 'سعيد',
                'City' => 'دمشق',
                'Country' => 'سوريا',
                'Phone' => '0113855454',
                'Fax' => '',
            ],
            [
                'CompanyName' => 'كهربائيات المصري',
                'ContactName' => 'محمود',
                'City' => 'حلب',
                'Country' => 'سوريا',
                'Phone' => '',
                'Fax' => '',
            ],
        ]);
    }
}
