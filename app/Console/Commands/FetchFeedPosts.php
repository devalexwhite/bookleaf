<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Feed;
use App\Models\FeedPost;
use Spekulatius\PHPScraper\PHPScraper;

class FetchFeedPosts extends Command
{
    protected $signature = 'feeds:fetch-posts';
    protected $description = 'Fetch new posts from all active feeds';

    public function handle()
    {
        $batchSize = 50;
        Feed::where('active', true)
            ->orderBy('id')
            ->chunk($batchSize, function ($feeds) {
                foreach ($feeds as $feed) {
                    $this->processFeed($feed);
                }
            });
    }

    protected function processFeed(Feed $feed)
    {
        $web = new PHPScraper();
        $rss = $web->rssRaw($feed->url);
        if (empty($rss) || empty($rss[0]['channel'])) {
            return;
        }

        foreach ($rss[0]['channel']['item'] as $item) {
            $guid = $item['guid'] ?? $item['link'] ?? null;
            if (!$guid)
                continue;
            // Only create if not already exists
            $exists = FeedPost::where('feed_id', $feed->id)
                ->where('guid', $guid)
                ->exists();
            if (!$exists) {
                FeedPost::create([
                    'feed_id' => $feed->id,
                    'guid' => $guid,
                    'title' => $item['title'] ?? '',
                    'link' => $item['link'] ?? '',
                    'description' => $item['description'] ?? '',
                    'author' => $item['author'] ?? '',
                    'categories' => isset($item['category']) ? implode(',', (array) $item['category']) : null,
                    'published_at' => isset($item['pubDate']) ? \Carbon\Carbon::parse($item['pubDate']) : null,
                ]);
            }
        }
    }
}
