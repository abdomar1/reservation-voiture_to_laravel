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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->integer('kilomtrage');
            $table->string('Transmission');
            $table->string('Seats');
            $table->string('Luggage');
            $table->string('model');
            $table->string('type');
            $table->string('prixJ');
            $table->boolean('disponible')->default(1);
            $table->string('image');
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
