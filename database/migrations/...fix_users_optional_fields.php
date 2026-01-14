<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'firstname')) {
                $table->string('firstname')->nullable()->change();
            }

            if (Schema::hasColumn('users', 'lastname')) {
                $table->string('lastname')->nullable()->change();
            }

            if (Schema::hasColumn('users', 'langue')) {
                $table->string('langue')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'firstname')) {
                $table->string('firstname')->nullable(false)->change();
            }

            if (Schema::hasColumn('users', 'lastname')) {
                $table->string('lastname')->nullable(false)->change();
            }

            if (Schema::hasColumn('users', 'langue')) {
                $table->string('langue')->nullable(false)->change();
            }
        });
    }
};
