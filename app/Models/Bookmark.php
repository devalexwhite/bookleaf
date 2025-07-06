<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Auth;
use Spekulatius\PHPScraper\PHPScraper;

class Bookmark extends Model
{
    protected $fillable = [
        'url',
        'name',
        'description',
        'author',
        'user_id',
        'folder',
        'favicon_url',
        'image_url',
        'notes',
    ];

    protected static function booted()
    {
        static::created(function ($bookmark) {
            \App\Models\Feed::discoverAndCreate($bookmark);
        });
    }



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function tagsArray(): array
    {
        return collect(explode(',', $this->tags))->map(fn($value) => trim($value))->toArray();
    }

    public static function getAllFolders(): array
    {
        return Auth::user()->bookmarks()->select('folder')->get()->pluck('folder')->unique()->toArray();
    }

    public function fillMetaTags()
    {
        $web = new PHPScraper;

        try {
            $meta = $web->go($this->url);

            $this->name = $meta->title ?? '';
            $this->description = $meta->description ?? '';
            $this->author = $meta->author ?? '';
            $this->image_url = $meta->image ?? $meta->openGraph['og:image'] ?? $meta->twitterCard['twitter:image'] ?? '';
            $this->save();

        } catch (Exception $e) {
        }
    }

    public function toCSVRow(): string
    {
        $data = [
            ($this->name ? $this->quoteString($this->name) : ''),
            ($this->url ? $this->quoteString($this->url) : ''),
            ($this->notes ? $this->quoteString($this->notes) : ''),
            ($this->tags ? $this->quoteString($this->tags->implode('name', ',')) : ''),
            ($this->folder ? $this->quoteString($this->folder) : ''),
        ];

        return implode(',', $data);
    }

    private function quoteString($string)
    {
        return '"' . $string . '"';
    }

    public static function getCSVColumnHeaders(): string
    {
        return implode(',', [
            'name',
            'url',
            'notes',
            'tags',
            'folder'
        ]);
    }

    public function feeds(): HasMany
    {
        return $this->hasMany(Feed::class);
    }

    public function feedPosts(): HasManyThrough
    {
        return $this->hasManyThrough(
            FeedPost::class,
            Feed::class,
            'bookmark_id', // Foreign key on feeds table
            'feed_id',     // Foreign key on feed_posts table
            'id',          // Local key on bookmarks table
            'id'           // Local key on feeds table
        );
    }

    public function lastFeedUpdate(): ?\Carbon\Carbon
    {
        return $this->feedPosts()->latest('published_at')->value('published_at');
    }
}
