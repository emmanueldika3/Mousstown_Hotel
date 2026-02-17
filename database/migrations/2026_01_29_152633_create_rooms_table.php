<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('rooms')) {
            Schema::table('rooms', function (Blueprint $table) {
                if (!Schema::hasColumn('rooms', 'name')) {
                    $table->string('name')->after('id');
                }
                if (!Schema::hasColumn('rooms', 'description')) {
                    $table->text('description')->nullable()->after('name');
                }
                // Remplacement de 'price' par 'price_night'
                if (!Schema::hasColumn('rooms', 'price_night')) {
                    $table->integer('price_night')->after('description');
                }
                // On garde 'room_type'
                if (!Schema::hasColumn('rooms', 'room_type')) {
                    $table->string('room_type')->after('price_night');
                }
                if (!Schema::hasColumn('rooms', 'capacity')) {
                    $table->integer('capacity')->after('room_type');
                }
                if (!Schema::hasColumn('rooms', 'image')) {
                    $table->string('image')->nullable()->after('capacity');
                }
            });
        }
    }

    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            // Mise à jour de la liste pour le rollback
            $table->dropColumn(['name', 'description', 'price_night', 'room_type', 'capacity', 'image']);
        });
    }
};