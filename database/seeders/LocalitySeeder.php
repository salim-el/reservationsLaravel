<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Locality;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Désactiver temporairement les contraintes FK
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Locality::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        Locality::create([
            'postal_code' => 1000,
            'locality' => 'Bruxelles',
        ]);

        Locality::create([
            'postal_code' => 1170,
            'locality' => 'Watermael-Boitsfort',
        ]);

        Locality::create([
            'postal_code' => 1180,
            'locality' => 'Uccle',
        ]);
    }
}
