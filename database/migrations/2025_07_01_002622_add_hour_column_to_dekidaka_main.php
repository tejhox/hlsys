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
        Schema::table('dekidaka_mains', function (Blueprint $table) {
            $table->string('hour')->after('dekidaka_header_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dekidaka_mains', function (Blueprint $table) {
            $table->dropColumn('hour');
        });
    }
};
