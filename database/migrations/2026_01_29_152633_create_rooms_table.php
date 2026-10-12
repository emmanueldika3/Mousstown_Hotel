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
        // Si la table n'existe pas encore, on la crée
        if (!Schema::hasTable('rooms')) {
            Schema::create('rooms', function (Blueprint $table) {
                $table->id();
                $table->string('room_number')->unique(); // Le numéro (101, 102...)
                $table->string('name');                  // Nom (ex: Suite Royale)
                $table->text('description')->nullable();
                $table->integer('price_night');          // Prix par nuit
                $table->string('room_type');             // Catégorie (Standard, Deluxe...)
                $table->integer('capacity');             // Nb de personnes
                $table->text('image')->nullable();       // Text pour les longs liens Unsplash
                $table->string('status')->default('disponible'); // Statut par défaut
                $table->timestamps();
            });
        } else {
            // Si elle existe déjà, on ajoute les colonnes manquantes
            Schema::table('rooms', function (Blueprint $table) {
                if (!Schema::hasColumn('rooms', 'room_number')) {
                    $table->string('room_number')->unique()->after('id');
                }
                if (!Schema::hasColumn('rooms', 'name')) {
                    $table->string('name')->after('room_number');
                }
                if (!Schema::hasColumn('rooms', 'description')) {
                    $table->text('description')->nullable()->after('name');
                }
                if (!Schema::hasColumn('rooms', 'price_night')) {
                    $table->integer('price_night')->after('description');
                }
                if (!Schema::hasColumn('rooms', 'room_type')) {
                    $table->string('room_type')->after('price_night');
                }
                if (!Schema::hasColumn('rooms', 'capacity')) {
                    $table->integer('capacity')->after('room_type');
                }
                if (Schema::hasColumn('rooms', 'image')) {
                    $table->text('image')->change(); // On force en TEXT pour Unsplash
                } else {
                    $table->text('image')->nullable()->after('capacity');
                }
                if (!Schema::hasColumn('rooms', 'status')) {
                    $table->string('status')->default('disponible')->after('image');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // En cas de rollback, on supprime tout proprement
        Schema::dropIfExists('rooms');
    }
};