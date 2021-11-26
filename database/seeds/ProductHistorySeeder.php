<?php

use Illuminate\Database\Seeder;

class ProductHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('productHistory')->insert([
            [
                'sku'          => '123asd',
                'amount'       => 1,
                'removal'      => '0',
                'creationDate' => '2021-11-26 20:25:30',
            ],
            [
                'sku'          => '123asd',
                'amount'       => 6,
                'removal'      => '1',
                'creationDate' => '2021-11-26 20:25:30',
            ],
            [
                'sku'          => '354jhg',
                'amount'       => 4,
                'removal'      => '1',
                'creationDate' => '2021-11-26 20:25:30',
            ]
        ]); 
    }
}
