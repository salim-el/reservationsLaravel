<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::truncate();

        $data = [
            ['role' => 'admin'],
            ['role' => 'member'],
            ['role' => 'affiliate'],
            ['role' => 'press'],
        ];

        DB::table('roles')->insert($data);
    }
}
