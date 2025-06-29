<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('title'); // Judul testimoni
            $table->text('message'); // Isi testimoni
            $table->integer('rating')->default(5);
            $table->string('service_type')->nullable(); // Jenis layanan
            $table->boolean('approved')->default(false);
            $table->boolean('featured')->default(false);
            $table->string('image')->nullable();
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Tambah user_id
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
};