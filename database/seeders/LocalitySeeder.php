<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Locality;

class LocalitySeeder extends Seeder
{
    public function run(): void
    {
        Locality::truncate();

        $data = [
            ['postal_code' => '1000', 'locality' => 'Bruxelles'],
            ['postal_code' => '4000', 'locality' => 'Liège'],
            ['postal_code' => '5000', 'locality' => 'Namur'],
            ['postal_code' => '6000', 'locality' => 'Charleroi'],
        ];

        DB::table('localities')->insert($data);
    }
}
