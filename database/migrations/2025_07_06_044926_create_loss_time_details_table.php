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
        Schema::create('loss_time_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dekidaka_main_id')->constrained()->onDelete('cascade');
            $table->string('factor');
            $table->integer('loss_time_detail');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loss_time_details');
    }
};
