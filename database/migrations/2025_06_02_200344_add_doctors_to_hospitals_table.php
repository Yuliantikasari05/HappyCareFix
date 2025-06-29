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
        $table->json('doctors')->nullable(); // Sesuaikan tipe data dengan yang kamu pakai di seeder
    });
}

public function down()
{
    Schema::table('hospitals', function (Blueprint $table) {
        $table->dropColumn('doctors');
    });
}

};
