<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('category', ['nature', 'culinary', 'family']);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('duration')->nullable();
            $table->string('location');
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->text('includes')->nullable();
            $table->text('excludes')->nullable();
            $table->text('itinerary')->nullable();
            $table->integer('max_participants')->nullable();
            $table->enum('difficulty_level', ['easy', 'moderate', 'hard'])->nullable();
            $table->json('available_dates')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tours');
    }
};