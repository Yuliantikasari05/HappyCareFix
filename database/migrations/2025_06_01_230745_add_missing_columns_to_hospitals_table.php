<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('hospitals', function (Blueprint $table) {
            // Cek apakah kolom sudah ada sebelum menambahkan
            if (!Schema::hasColumn('hospitals', 'slug')) {
                $table->string('slug')->unique()->after('name');
            }
            if (!Schema::hasColumn('hospitals', 'services')) {
                $table->json('services')->nullable()->after('description');
            }
            if (!Schema::hasColumn('hospitals', 'facilities')) {
                $table->json('facilities')->nullable()->after('services');
            }
            if (!Schema::hasColumn('hospitals', 'operating_hours')) {
                $table->json('operating_hours')->nullable()->after('facilities');
            }
            if (!Schema::hasColumn('hospitals', 'emergency_contact')) {
                $table->string('emergency_contact')->nullable()->after('operating_hours');
            }
            if (!Schema::hasColumn('hospitals', 'latitude')) {
                $table->decimal('latitude', 10, 8)->nullable()->after('emergency_contact');
            }
            if (!Schema::hasColumn('hospitals', 'longitude')) {
                $table->decimal('longitude', 11, 8)->nullable()->after('latitude');
            }
            if (!Schema::hasColumn('hospitals', 'image')) {
                $table->string('image')->nullable()->after('longitude');
            }
            if (!Schema::hasColumn('hospitals', 'featured')) {
                $table->boolean('featured')->default(false)->after('image');
            }
            if (!Schema::hasColumn('hospitals', 'active')) {
                $table->boolean('active')->default(true)->after('featured');
            }
        });
    }

    public function down()
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $columns = ['slug', 'services', 'facilities', 'operating_hours', 'emergency_contact', 
                       'latitude', 'longitude', 'image', 'featured', 'active'];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('hospitals', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};