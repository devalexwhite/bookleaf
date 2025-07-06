<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feed_posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('feed_id')->constrained('feeds')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('author')->nullable();
            $table->string('link')->nullable();
            $table->string('guid')->index();
            $table->dateTime('published_at')->index();
            $table->string('categories')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed_posts');
    }
};
