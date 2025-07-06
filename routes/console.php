<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command('fetch:feed-posts')
    ->twiceDaily()
    ->withoutOverlapping()
    ->onFailure(function () {
        \Log::error('Failed to fetch feed posts');
    })
    ->onSuccess(function () {
        \Log::info('Successfully fetched feed posts');
    });