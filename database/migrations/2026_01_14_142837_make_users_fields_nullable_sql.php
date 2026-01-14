<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        if (Schema::hasColumn('users', 'lastname')) {
            DB::statement("ALTER TABLE users MODIFY lastname VARCHAR(255) NULL");
        }
        if (Schema::hasColumn('users', 'firstname')) {
            DB::statement("ALTER TABLE users MODIFY firstname VARCHAR(255) NULL");
        }
        if (Schema::hasColumn('users', 'langue')) {
            DB::statement("ALTER TABLE users MODIFY langue VARCHAR(10) NULL");
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('users', 'lastname')) {
            DB::statement("ALTER TABLE users MODIFY lastname VARCHAR(255) NOT NULL");
        }
        if (Schema::hasColumn('users', 'firstname')) {
            DB::statement("ALTER TABLE users MODIFY firstname VARCHAR(255) NOT NULL");
        }
        if (Schema::hasColumn('users', 'langue')) {
            DB::statement("ALTER TABLE users MODIFY langue VARCHAR(10) NOT NULL");
        }
    }
};
