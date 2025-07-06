<?php

namespace App\Console\Commands;

use App\Models\Bookmark;
use App\Models\Feed;
use Illuminate\Console\Command;

class DiscoverRSSFeeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feeds:discover';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Discover RSS feeds from bookmarks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $bookmarks = Bookmark::all();

        foreach ($bookmarks as $bookmark) {
            try {
                Feed::discoverAndCreate($bookmark);
            } catch (\Exception $e) {
                $this->error("Failed to discover feeds for bookmark ID {$bookmark->id}: " . $e->getMessage());
                continue; // Skip to the next bookmark if an error occurs
            }
        }

        $this->info('RSS feeds discovered and created successfully.');
    }
}
