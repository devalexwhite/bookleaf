@php
    $quotes = [
        "O little bookmark, slim and slight, between the pages, closed up tight. (Ball, Duncan)",
        "Every slip of paper in the house is my potential bookmark (AwsomeAud)",
        "Throw out those crumpled receipts, old card catalog cards, and ripped up parking tickets and get yourself some real bookmarks. (Blum, Robin K.)",
        "When a bookmark tumbles out of an old book pristine and unwrinkled, it is like a gasp of breath from another century. (Borchert, Don)",
        "A bookmark is usable and a piece of art, therefore it is functional art. (Cox, Katy and Uhlig, Sue)",
        "The disadvantage with people is that you can't put bookmarks in them and set them aside till you want them again. (Card, Orson Scott)",
    ];
@endphp

<x-layout title="Create Bookmark">
    <form method="POST" action="{{ route('bookmarks.store') }}">
        @csrf
        <div
            class="flex flex-row items-center justify-center w-full py-4 px-2 gap-6 bg-secondary mb-16 fixed top-0 z-100">
            <button type="submit" class="btn btn-primary">Save Bookmark</button>
            <a href="{{ route('bookmarks.index') }}" class="btn btn-outline">Cancel</a>
        </div>
        @if ($errors->any())
            <div id="errors">
                <h5>Validation Errors</h5>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="max-w-2xl mt-32 mb-16 px-6 py-4 mx-auto prose">
            <h1>Create a new bookmark</h1>
            <blockquote>
                {{ $quotes[array_rand($quotes)] }}
            </blockquote>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">URL</legend>
                <input type="url" name="url" class="input w-full" placeholder="https://" hx-trigger="change delay:500ms"
                    hx-post="{{ route('bookmarks.scrapeDataForm') }}" hx-target="#scrape-data-fields"
                    hx-swap="innerHTML" hx-indicator="#scrape-data-fields-indicator" />
            </fieldset>


            <div class="relative max-w-3xl">
                <div class="absolute -top-2 -left-2 -bottom-2 -right-2 pointer-events-none flex justify-center items-center bg-black/20 z-20 backdrop-blur rounded-lg htmx-indicator"
                    id="scrape-data-fields-indicator">
                    <span class="loading loading-bars loading-xl"></span>
                </div>
                <div id="scrape-data-fields">
                    @include('bookmarks.scrape-data-form')
                </div>
            </div>

            @include('tags.tags-suggest-input')

        </div>
    </form>
</x-layout>