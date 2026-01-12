<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Empty the table first (FK constraint)
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Location::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        Location::create([
            'slug' => 'espace-delvaux-la-venerie',
            'designation' => 'Espace Delvaux – La Vénerie',
            'address' => 'Avenue E. De Mot 54',
            'locality_postal_code' => 1170,
        ]);

        Location::create([
            'slug' => 'dexia-art-center',
            'designation' => 'Dexia Art Center',
            'address' => 'Rue de l\'Écuyer 50',
            'locality_postal_code' => 1000,
        ]);

        Location::create([
            'slug' => 'la-samaritaine',
            'designation' => 'La Samaritaine',
            'address' => 'Rue de la Samaritaine 16',
            'locality_postal_code' => 1000,
        ]);
    }
}
