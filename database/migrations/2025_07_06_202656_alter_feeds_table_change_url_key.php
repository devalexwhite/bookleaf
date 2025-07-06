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
        // Change the URL index to be a index of URL, bookmark_id
        Schema::table('feeds', function (Blueprint $table) {
            // Drop the existing unique index on 'url'
            $table->dropUnique(['url']);

            // Add a new unique index on 'url' and 'bookmark_id'
            $table->unique(['url', 'bookmark_id'], 'feeds_url_bookmark_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse the changes made in the up method
        Schema::table('feeds', function (Blueprint $table) {
            // Drop the unique index on 'url' and 'bookmark_id'
            $table->dropUnique('feeds_url_bookmark_id_unique');

            // Recreate the unique index on 'url'
            $table->unique('url');
        });
    }
};
