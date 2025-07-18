<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spekulatius\PHPScraper\PHPScraper;

class Feed extends Model
{
    protected $fillable = [
        'url',
        'name',
        'description',
        'bookmark_id',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function bookmark()
    {
        return $this->belongsTo(Bookmark::class);
    }

    public function posts()
    {
        return $this->hasMany(FeedPost::class);
    }

    public static function discoverAndCreate(Bookmark $bookmark)
    {
        $web = new PHPScraper();
        $discoveredUrls = $web->go($bookmark->url)->rssUrls();

        if (empty($discoveredUrls)) {
            return null; // No RSS feed found
        }

        $feeds = [];

        foreach ($discoveredUrls as $url) {
            $feedDetails = $web->rssRaw($url);

            if (empty($feedDetails)) {
                continue; // Skip if no feed details found
            }

            $title = $feedDetails[0]['channel']['title'] ?? 'No Title';
            $description = $feedDetails[0]['channel']['description'] ?? 'No Description';

            $feeds[] = self::firstOrCreate(
                [
                    'url' => $url,
                    'bookmark_id' => $bookmark->id,
                ],
                [
                    'name' => $title,
                    'description' => $description,
                ]
            );
        }

        return $feeds;
    }

    public function fetchPosts()
    {
        $web = new PHPScraper();
        $rss = $web->rssRaw($this->url);

        if (empty($rss) || empty($rss[0]['channel'])) {
            return; // No valid RSS feed found
        }

        foreach ($rss[0]['channel']['item'] as $item) {
            $guid = $item['guid'] ?? $item['link'] ?? null;
            if (!$guid) {
                continue; // Skip if no GUID or link
            }

            // Only create if not already exists
            $exists = FeedPost::where('feed_id', $this->id)
                ->where('guid', $guid)
                ->exists();

            if (!$exists) {
                FeedPost::create([
                    'feed_id' => $this->id,
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
