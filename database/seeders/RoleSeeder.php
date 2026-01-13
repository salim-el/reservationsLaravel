<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_user')->truncate();
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Role::insert([
            ['role' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['role' => 'user',  'created_at' => now(), 'updated_at' => now()],
            ['role' => 'press', 'created_at' => now(), 'updated_at' => now()],
            // ['role' => 'member','created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
