<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();

            $table->string('slug', 60)->unique();
            $table->string('designation', 100);
            $table->string('address', 150);

            // même type que localities.postal_code
            $table->unsignedInteger('locality_postal_code');

            $table->timestamps();

            $table->foreign('locality_postal_code')
                ->references('postal_code')->on('localities')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
