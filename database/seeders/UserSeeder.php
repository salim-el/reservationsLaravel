<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Empty the table first
        User::truncate();

        // Define data
        $users = [
            [
                'login' => 'bob',
                'firstname' => 'Bob',
                'lastname' => 'Sull',
                'email' => 'bob@sull.com',
                'password' => '12345678',
                'langue' => 'fr',
                'role' => 'admin',
            ],
            [
                'login' => 'anna',
                'firstname' => 'Anna',
                'lastname' => 'Lyse',
                'email' => 'anna.lyse@sull.com',
                'password' => '12345678',
                'langue' => 'en',
                'role' => 'member',
            ],
        ];

        foreach ($users as &$user) {
            $user['email_verified_at'] = Carbon::now()->toDateTimeString();
            $user['created_at'] = Carbon::now()->toDateTimeString();
            $user['password'] = Hash::make($user['password']);
            $user['remember_token'] = Str::random(10);
        }

        // Insert fixed users
        DB::table('users')->insert($users);

        // Generate 1 admin
        User::factory()->create([
            'login' => 'fred',
            'firstname' => 'Fred',
            'lastname' => 'Sull',
            'email' => 'fred@sull.com',
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'langue' => 'fr',
            'role' => 'admin',
        ]);

        // Generate 20 members
        User::factory(20)->create([
            'role' => 'member',
        ]);

        // Generate 5 press critics
        User::factory(5)->create([
            'role' => 'press',
        ]);

        // Generate 3 affiliated websites
        User::factory(3)->create([
            'role' => 'affiliate',
        ]);
    }
}
