<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,

            TypeSeeder::class,
            ArtistSeeder::class,
            ArtistTypeSeeder::class,

            PriceSeeder::class,
            LocalitySeeder::class,
            LocationSeeder::class,
            ShowSeeder::class,
            RepresentationSeeder::class,
            ReservationSeeder::class,
            ReviewSeeder::class,
	    ArtistTypeShowSeeder::class,

        ]);
    }
}
