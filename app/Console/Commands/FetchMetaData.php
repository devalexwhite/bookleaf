<?php

namespace App\Console\Commands;

use App\Models\Bookmark;
use Illuminate\Console\Command;

class FetchMetaData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookmarks:fetch-meta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape and save metadata for bookmarks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fetching metadata for bookmarks...');

        // Fetch all bookmarks
        $bookmarks = Bookmark::all();

        foreach ($bookmarks as $bookmark) {
            try {
                try {
                    if (($bookmark->description != null || trim($bookmark->description) != '') && ($bookmark->notes == null || trim($bookmark->notes) == '')) {
                        $bookmark->notes = $bookmark->description;
                        $bookmark->save();
                    }
                    $bookmark->fillMetaTags();
                } catch (\Exception $e) {
                    $this->error("Failed to fill meta tags for bookmark ID {$bookmark->id}: " . $e->getMessage());
                    continue;
                }

                $this->info("Metadata updated for bookmark ID {$bookmark->id}");
            } catch (\Exception $e) {
                $this->error("Failed to fetch metadata for bookmark ID {$bookmark->id}: " . $e->getMessage());
            }
        }

        $this->info('Metadata fetching completed.');
    }
}
