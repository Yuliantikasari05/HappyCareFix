<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            // Cek apakah kolom sudah ada sebelum menambahkan
            if (!Schema::hasColumn('tours', 'slug')) {
                $table->string('slug')->unique()->after('name');
            }
            if (!Schema::hasColumn('tours', 'latitude')) {
                $table->decimal('latitude', 10, 8)->nullable()->after('location');
            }
            if (!Schema::hasColumn('tours', 'longitude')) {
                $table->decimal('longitude', 11, 8)->nullable()->after('latitude');
            }
            if (!Schema::hasColumn('tours', 'address')) {
                $table->string('address')->nullable()->after('longitude');
            }
            if (!Schema::hasColumn('tours', 'google_maps_url')) {
                $table->string('google_maps_url')->nullable()->after('address');
            }
            if (!Schema::hasColumn('tours', 'includes')) {
                $table->text('includes')->nullable()->after('google_maps_url');
            }
            if (!Schema::hasColumn('tours', 'excludes')) {
                $table->text('excludes')->nullable()->after('includes');
            }
            if (!Schema::hasColumn('tours', 'itinerary')) {
                $table->text('itinerary')->nullable()->after('excludes');
            }
            if (!Schema::hasColumn('tours', 'max_participants')) {
                $table->integer('max_participants')->nullable()->after('itinerary');
            }
            if (!Schema::hasColumn('tours', 'difficulty_level')) {
                $table->enum('difficulty_level', ['easy', 'moderate', 'hard'])->nullable()->after('max_participants');
            }
            if (!Schema::hasColumn('tours', 'available_dates')) {
                $table->json('available_dates')->nullable()->after('difficulty_level');
            }
            if (!Schema::hasColumn('tours', 'published')) {
                $table->boolean('published')->default(true)->after('available_dates');
            }
        });
    }

    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn([
                'slug', 'latitude', 'longitude', 'address', 'google_maps_url',
                'includes', 'excludes', 'itinerary', 'max_participants', 
                'difficulty_level', 'available_dates', 'published'
            ]);
        });
    }
};