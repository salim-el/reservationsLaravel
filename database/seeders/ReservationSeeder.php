<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;
use App\Models\User;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Reservation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $users = User::take(5)->get();

        $data = [];

        foreach ($users as $user) {
            $data[] = [
                'user_id' => $user->id,
                'status' => 'pending',
                'booking_date' => now(),
                'updated_at' => null,
            ];
        }

        DB::table('reservations')->insert($data);
    }
}
