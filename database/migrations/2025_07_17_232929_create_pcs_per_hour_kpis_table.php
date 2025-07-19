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
        Schema::create('pcs_per_hour_kpis', function (Blueprint $table) {
            $table->id();
            $table->foreignid('dekidaka_header_id');
            $table->integer('actual_output');
            $table->integer('effective_hour');
            $table->decimal('result_pcs_per_hour');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pcs_per_hour_kpis');
    }
};
