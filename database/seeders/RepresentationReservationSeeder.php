<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Representation;
use App\Models\Reservation;
use App\Models\Price;

class RepresentationReservationSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('representation_reservation')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $data = [];

        $reservations = Reservation::all();
        $representations = Representation::where('schedule', '2012-10-12 20:30')->get();
        $prices = Price::where(['end_date' => null])->get();

        foreach ($representations as $repres) {
            foreach ($reservations as $res) {
                $data[] = [
                    'representation_id' => $repres->id,
                    'reservation_id' => $res->id,
                    'unit_price' => $prices->random()->price,
                    'quantity' => rand(1, 5),
                ];
            }
        }

        DB::table('representation_reservation')->insert($data);
    }
}
