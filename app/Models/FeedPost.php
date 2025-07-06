<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedPost extends Model
{
    protected $fillable = [
        'feed_id',
        'title',
        'description',
        'author',
        'link',
        'guid',
        'published_at',
        'categories',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'categories' => 'array',
    ];

    public function feed()
    {
        return $this->belongsTo(Feed::class);
    }
}
