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
        Schema::create('cycle_time_kpis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dekidaka_header_id')->constrained()->onDelete('cascade');
            $table->integer('effective_time');
            $table->integer('actual_output');
            $table->decimal('result_cycle_time_actual', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cycle_time_kpis');
    }
};
