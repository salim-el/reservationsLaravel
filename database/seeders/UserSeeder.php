<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Désactiver temporairement les contraintes FK
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        User::create([
            'login' => 'admin',
            'firstname' => 'Admin',
            'lastname' => 'User',
            'email' => 'admin@test.be',
            'password' => Hash::make('password'),
            'langue' => 'fr',
        ]);

        User::create([
            'login' => 'bob',
            'firstname' => 'Bob',
            'lastname' => 'Sull',
            'email' => 'bob@test.be',
            'password' => Hash::make('password'),
            'langue' => 'fr',
        ]);

        User::create([
            'login' => 'anna',
            'firstname' => 'Anna',
            'lastname' => 'Lyse',
            'email' => 'anna@test.be',
            'password' => Hash::make('password'),
            'langue' => 'fr',
        ]);
    }
}
