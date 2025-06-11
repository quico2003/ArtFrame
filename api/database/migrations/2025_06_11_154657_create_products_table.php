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
        Schema::dropIfExists("art_works");
        Schema::create('products', function (Blueprint $table) {
           $table->id();

            // Relaciones correctas
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');

            $table->string('title');
            $table->string('description'); // o text() si será larga
            $table->string('image');
            $table->string('year');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
