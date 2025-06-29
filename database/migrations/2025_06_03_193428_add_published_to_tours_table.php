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
        // Cek apakah kolom 'published' belum ada sebelum menambahkannya
        if (!Schema::hasColumn('tours', 'published')) {
            Schema::table('tours', function (Blueprint $table) {
                $table->boolean('published')->default(false)->after('available_dates');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Cek apakah kolom 'published' ada sebelum menghapusnya
        if (Schema::hasColumn('tours', 'published')) {
            Schema::table('tours', function (Blueprint $table) {
                $table->dropColumn('published');
            });
        }
    }
};
