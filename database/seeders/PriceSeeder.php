<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    public function run(): void
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Price::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Define data
        $prices = [
            [
                'type' => 'normal',
                'price' => 12.00,
                'description' => 'Tarif normal',
                'start_date' => '2012-01-01',
                'end_date' => null,
            ],
            [
                'type' => 'reduced',
                'price' => 8.00,
                'description' => 'Tarif réduit',
                'start_date' => '2012-01-01',
                'end_date' => null,
            ],
            [
                'type' => 'child',
                'price' => 6.00,
                'description' => 'Tarif enfant',
                'start_date' => '2012-01-01',
                'end_date' => null,
            ],
        ];

        DB::table('prices')->insert($prices);
    }
}
