<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Cette méthode crée la table et ses colonnes.
     */
   public function up(): void
{
    Schema::create('rooms', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description');
    $table->decimal('price', 10, 2);
    $table->string('room_type');
    $table->integer('capacity');
    $table->string('image')->nullable();
    $table->boolean('is_available')->default(true);
    $table->timestamps();
});
}

    /**
     * Reverse the migrations.
     * Cette méthode supprime la table si on annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};