<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'first_name')) {
            $table->string('first_name')->after('name')->nullable();
        }
        if (!Schema::hasColumn('users', 'phone')) {
            $table->string('phone')->after('email')->nullable();
        }
        if (!Schema::hasColumn('users', 'role')) {
            $table->string('role')->default('client')->after('password');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
