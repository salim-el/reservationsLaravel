<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Review;
use App\Models\Show;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Review::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $ayiti = Show::where('slug', 'ayiti')->first();
        $cible = Show::where('slug', 'cible-mouvante')->first();

        $bob = User::where('login', 'bob')->first();
        $anna = User::where('login', 'anna')->first();

        if ($ayiti && $bob) {
            Review::create([
                'show_id' => $ayiti->id,
                'user_id' => $bob->id,
                'rating' => 8,
                'comment' => 'Très bon spectacle.',
            ]);
        }

        if ($cible && $anna) {
            Review::create([
                'show_id' => $cible->id,
                'user_id' => $anna->id,
                'rating' => 7,
                'comment' => 'Intéressant.',
            ]);
        }
    }
}
