<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Representation;
use App\Models\Show;

class RepresentationSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Representation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $showAyiti = Show::firstWhere('slug', 'ayiti');
        $showCible = Show::firstWhere('slug', 'cible-mouvante');

        $data = [
            [
                'location_id' => $showAyiti?->location_id,
                'show_id' => $showAyiti?->id ?? 1,
                'schedule' => '2012-10-12 20:30',
            ],
            [
                'location_id' => $showCible?->location_id,
                'show_id' => $showCible?->id ?? 1,
                'schedule' => '2012-10-13 20:30',
            ],
        ];

        DB::table('representations')->insert($data);
    }
}
