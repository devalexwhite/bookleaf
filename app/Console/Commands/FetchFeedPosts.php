<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Feed;
use App\Jobs\FetchFeedPosts as FetchFeedPostsJob;

class FetchFeedPosts extends Command
{
    protected $signature = 'feeds:fetch-posts {--batch=50 : Number of feeds to process per batch}';
    protected $description = 'Fetch new posts from all active feeds';

    public function handle()
    {
        $batchSize = (int) $this->option('batch');

        Feed::where('active', true)
            ->orderBy('id')
            ->chunk($batchSize, function ($feeds) {
                $feedIds = $feeds->pluck('id')->toArray();
                FetchFeedPostsJob::dispatch($feedIds);
            });
    }
}
