<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email_verified_at');
            $table->string('departement')->after('name');
            $table->string('section')->after('departement');
            $table->string('position')->after('section');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('email_verified_at')->nullable()->after('name');
            $table->dropColumn('departement');
            $table->dropColumn('section');
            $table->dropColumn('position');
        });
    }
};
