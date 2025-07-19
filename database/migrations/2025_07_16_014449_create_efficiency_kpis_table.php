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
        Schema::create('efficiency_kpis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dekidaka_header_id')->constrained()->onDelete('cascade');
            $table->integer('available_time');
            $table->integer('effective_time');
            $table->decimal('result_efficiency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('efficiency_kpis');
    }
};
