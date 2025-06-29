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
    Schema::table('hospitals', function (Blueprint $table) {
        $table->integer('bed_capacity')->nullable();
    });
}

public function down()
{
    Schema::table('hospitals', function (Blueprint $table) {
        $table->dropColumn('bed_capacity');
    });
}

};
