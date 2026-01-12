<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('localities', function (Blueprint $table) {
            $table->id();

            // Doit être UNIQUE (ou PRIMARY) pour pouvoir être référencé en FK
            $table->unsignedInteger('postal_code')->unique();

            $table->string('locality', 100);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('localities');
    }
};
