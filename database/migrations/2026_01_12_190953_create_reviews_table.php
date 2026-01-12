<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('show_id');
            $table->unsignedTinyInteger('stars');
            $table->text('review')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('show_id')->references('id')->on('shows')
                ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
