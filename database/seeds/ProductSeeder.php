<?php

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
        DB::table('product')->insert([
            [
                'name'   => 'carregador Iphone 13',
                'sku'    => '123asd',
                'amount' => 5,
            ],
            [
                'name'   => 'Capa iphone original',
                'sku'    => '321asd',
                'amount' => 10,
            ],
            [
                'name'   => 'Película Iphone 13',
                'sku'    => '354jhg',
                'amount' => 15,
            ],
        ]);
    }
}
