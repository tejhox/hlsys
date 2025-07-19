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
        Schema::create('loss_time_kpis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dekidaka_header_id')->constrained()->onDelete('cascade');
            $table->integer('available_time');
            $table->integer('loss_time');
            $table->decimal('result_loss_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loss_time_kpis');
    }
};
