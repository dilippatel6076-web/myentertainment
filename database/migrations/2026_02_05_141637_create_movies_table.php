<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('add_movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('youtube_video_id');
            $table->string('youtube_url');
            $table->string('thumbnail')->nullable();
            $table->json('category')->nullable(); // multiple checkbox
            $table->string('artist_name')->nullable();
            $table->year('release_year')->nullable();
            $table->text('description')->nullable();
            $table->text('searching_word')->nullable(); // for search
            $table->string('language')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_movies');
    }
};
