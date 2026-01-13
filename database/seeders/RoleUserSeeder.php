<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class RoleUserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('role', 'admin')->first();
        $userRole  = Role::where('role', 'user')->first(); // ou 'member' si ton prof veut member

        if (!$adminRole || !$userRole) {
            throw new \Exception("Roles not found. Check RoleSeeder role values.");
        }

        $adminUser = User::where('email', 'admin@admin.com')->first();
        if ($adminUser) {
            $adminUser->roles()->syncWithoutDetaching([$adminRole->id]);
        }

        User::where('email', '!=', 'admin@admin.com')->get()->each(function (User $user) use ($userRole) {
            $user->roles()->syncWithoutDetaching([$userRole->id]);
        });
    }
}
