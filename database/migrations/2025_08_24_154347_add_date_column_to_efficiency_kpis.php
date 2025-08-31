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
        Schema::table('efficiency_kpis', function (Blueprint $table) {
            $table->date('date')->after('result_efficiency');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('efficiency_kpis', function (Blueprint $table) {
            $table->dropColumn('date');
        });
    }
};
