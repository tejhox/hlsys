<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('departement');
            $table->dropColumn('section');
            $table->dropColumn('position');
            $table->string('departement')->after('name');
            $table->string('section')->after('departement');
            $table->string('position')->after('section');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
       
        });
    }
};
