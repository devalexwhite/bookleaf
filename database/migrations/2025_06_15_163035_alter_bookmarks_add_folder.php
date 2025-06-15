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
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->string('folder')->index()->nullable();
            $table->text('notes')->nullable();
            $table->string('favicon_url')->nullable();
            $table->string('image_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookmarks', function (Blueprint $table) {
            $table->dropIndex('bookmarks_folder_unique');
            $table->dropColumn('section');
            $table->dropColumn('notes');
            $table->dropColumn('favicon_url');
            $table->dropColumn('image_url');
        });
    }
};
