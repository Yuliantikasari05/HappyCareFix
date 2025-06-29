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
        if (!Schema::hasColumn('tours', 'slug')) {
            Schema::table('tours', function (Blueprint $table) {
                $table->string('slug')->after('name')->unique();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        if (Schema::hasColumn('tours', 'slug')) {
            Schema::table('tours', function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }
    }
};
