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
        Schema::table('efficiency_kpis', function (Blueprint $table) {
            $table->date('date')->nullable()->change();
        });

        Schema::table('loss_time_kpis', function (Blueprint $table) {
            $table->date('date')->nullable()->change();
        });

        Schema::table('pcs_per_hour_kpis', function (Blueprint $table) {
            $table->date('date')->nullable()->change();
        });

        Schema::table('cycle_time_kpis', function (Blueprint $table) {
            $table->date('date')->nullable()->change();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
