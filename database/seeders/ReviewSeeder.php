<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Review;
use App\Models\User;
use App\Models\Show;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Review::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $bob = User::firstWhere('login', 'bob');
        $anna = User::firstWhere('login', 'anna');

        $ayiti = Show::firstWhere('slug', 'ayiti');
        $cible = Show::firstWhere('slug', 'cible-mouvante');

        $data = [];

        if ($bob && $ayiti) {
            $data[] = [
                'user_id' => $bob->id,
                'show_id' => $ayiti->id,
                'stars' => 5,
                'review' => 'Excellent spectacle.',
            ];
        }

        if ($anna && $cible) {
            $data[] = [
                'user_id' => $anna->id,
                'show_id' => $cible->id,
                'stars' => 4,
                'review' => 'Très bon, à voir.',
            ];
        }

        DB::table('reviews')->insert($data);
    }
}
