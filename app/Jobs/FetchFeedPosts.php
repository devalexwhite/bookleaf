<?php

namespace App\Jobs;

use App\Models\Feed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class FetchFeedPosts implements ShouldQueue
{
    use Queueable;

    /**
     * The feeds to fetch posts for.
     *
     * @var array
     */
    protected array $feeds;

    /**
     * Create a new job instance.
     */
    public function __construct(array $feedIds)
    {
        // Fetch the feeds from the database using the provided IDs
        $this->feeds = Feed::whereIn('id', $feedIds)->get()->all();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->feeds as $feed) {
            if ($feed instanceof Feed) {
                $feed->fetchPosts();
            } else {
                // Handle the case where the feed is not an instance of Feed
                // This could be logging, throwing an exception, etc.
                \Log::warning('Invalid feed instance provided', ['feed' => $feed]);
            }
        }
    }
}
