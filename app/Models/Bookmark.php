<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = [
        'url',
        'name',
        'description',
        'author',
        'tags',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tagsArray(): array
    {
        return collect(explode(',', $this->tags))->map(fn ($value) => trim($value))->toArray();
    }
}
