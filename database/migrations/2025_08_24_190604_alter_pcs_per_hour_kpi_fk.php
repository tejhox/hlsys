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
        Schema::table('pcs_per_hour_kpis', function (Blueprint $table) {
            // drop dulu foreign key lama
            $table->dropColumn('dekidaka_header_id');
            
            // tambahkan ulang dengan cascade
            $table->foreignId('dekidaka_header_id')->after('id')->constrained()->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pcs_per_hour_kpis', function (Blueprint $table) {
            $table->dropForeign(['dekidaka_header_id']);
        });
    }
};
