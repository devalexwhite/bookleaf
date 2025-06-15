<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spekulatius\PHPScraper\PHPScraper;

class Bookmark extends Model
{
    protected $fillable = [
        'url',
        'name',
        'description',
        'author',
        'tags',
        'user_id',
        'folder',
        'favicon_url',
        'image_url',
        'notes',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tagsArray(): array
    {
        return collect(explode(',', $this->tags))->map(fn ($value) => trim($value))->toArray();
    }

    public static function getAllFolders(): array
    {
        return Bookmark::select('folder')->get()->pluck('folder')->unique()->toArray();
    }

    public function fillMetaTags()
    {
        $web = new PHPScraper;
        $meta = $web->go($this->url);

        $this->name = $meta->title ?? '';
        $this->description = $meta->description ?? '';
        $this->author = $meta->author ?? '';
        $this->image_url = $meta->image ?? '';
        $this->save();
    }

    public static function getAllTags(): array
    {
        return Bookmark::select('tags')->get()->pluck('tags')->map(fn ($tag) => explode(',', $tag))->flatten()->unique()->toArray();
    }

    public static function getTagsForFolder($folder): array
    {
        return Bookmark::select('tags')->where('folder', $folder)->whereNotNull('tags')->get()->pluck('tags')->map(fn ($tag) => explode(',', $tag))->flatten()->unique()->toArray();
    }
}
