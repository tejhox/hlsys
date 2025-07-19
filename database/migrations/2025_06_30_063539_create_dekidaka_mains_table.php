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
        Schema::create('dekidaka_mains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dekidaka_header_id')->constrained()->onDelete('cascade');
            $table->integer('plan');
            $table->integer('actual');
            $table->integer('deviation');
            $table->integer('loss_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dekidaka_mains');
    }
};
