<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Representation;
use App\Models\Show;
use App\Models\Location;

class RepresentationSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Representation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $ayiti = Show::where('slug', 'ayiti')->first();
        $cible = Show::where('slug', 'cible-mouvante')->first();

        $delvaux = Location::where('slug', 'espace-delvaux-la-venerie')->first();
        $dexia = Location::where('slug', 'dexia-art-center')->first();

        if ($ayiti && $delvaux) {
            Representation::create([
                'show_id' => $ayiti->id,
                'location_id' => $delvaux->id,
                'when' => '2026-02-01 20:00:00',
            ]);
        }

        if ($cible && $dexia) {
            Representation::create([
                'show_id' => $cible->id,
                'location_id' => $dexia->id,
                'when' => '2026-02-05 20:00:00',
            ]);
        }
    }
}
