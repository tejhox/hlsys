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
        Schema::table('pcs_per_hour_kpis', function (Blueprint $table) {
            $table->decimal('effective_hour', 5, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pcs_per_hour_kpis', function (Blueprint $table) {
            $table->integer('effective_hour')->change();
        });
    }
};
