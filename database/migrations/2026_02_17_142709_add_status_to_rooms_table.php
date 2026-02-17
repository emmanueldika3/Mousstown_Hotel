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
        Schema::table('rooms', function (Blueprint $table) {
            // On vérifie avant d'ajouter pour éviter les erreurs si la colonne existe déjà
            if (!Schema::hasColumn('rooms', 'room_number')) {
                $table->string('room_number')->nullable();
            }
            
            if (!Schema::hasColumn('rooms', 'status')) {
                $table->string('status')->default('disponible');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            // On vérifie si les colonnes existent avant de tenter de les supprimer
            if (Schema::hasColumn('rooms', 'room_number')) {
                $table->dropColumn('room_number');
            }
            if (Schema::hasColumn('rooms', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};