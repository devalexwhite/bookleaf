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

<x-app-layout title="Create Bookmark">
    <form method="POST" action="{{ route('bookmarks.store') }}">
        @csrf
        <div class="max-w-2xl mb-16 px-6 py-4 mx-auto">
            <div class="prose mb-16">
                <h1>Create a new bookmark</h1>
                <blockquote>
                    {{ $quotes[array_rand($quotes)] }}
                </blockquote>
            </div>

            @if ($errors->any())
                <div role="alert" class="bg-warning p-3 w-full rounded text-warning-content mb-8">
                    <div class="flex flex-row gap-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6  stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <h3 class="font-bold text-warning-content p-0 m-0">Validation Errors</h3>
                    </div>


                    <div>
                        <ul class="list-disc pl-4">
                            @foreach ($errors->all() as $error)
                                <li class="text-xs">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <fieldset class="fieldset">
                <legend class="fieldset-legend">URL</legend>
                <div class="join">

                    <input type="url" name="url" class="input w-full" placeholder="https://" />
                    <button type="button" class="btn" hx-post="{{ route('bookmarks.scrapeDataForm') }}"
                        hx-target="#scrape-data-fields" hx-swap="innerHTML"
                        hx-indicator="#scrape-data-fields-indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path
                                d="M16.555 5.412a8.028 8.028 0 0 0-3.503-2.81 14.899 14.899 0 0 1 1.663 4.472 8.547 8.547 0 0 0 1.84-1.662ZM13.326 7.825a13.43 13.43 0 0 0-2.413-5.773 8.087 8.087 0 0 0-1.826 0 13.43 13.43 0 0 0-2.413 5.773A8.473 8.473 0 0 0 10 8.5c1.18 0 2.304-.24 3.326-.675ZM6.514 9.376A9.98 9.98 0 0 0 10 10c1.226 0 2.4-.22 3.486-.624a13.54 13.54 0 0 1-.351 3.759A13.54 13.54 0 0 1 10 13.5c-1.079 0-2.128-.127-3.134-.366a13.538 13.538 0 0 1-.352-3.758ZM5.285 7.074a14.9 14.9 0 0 1 1.663-4.471 8.028 8.028 0 0 0-3.503 2.81c.529.638 1.149 1.199 1.84 1.66ZM17.334 6.798a7.973 7.973 0 0 1 .614 4.115 13.47 13.47 0 0 1-3.178 1.72 15.093 15.093 0 0 0 .174-3.939 10.043 10.043 0 0 0 2.39-1.896ZM2.666 6.798a10.042 10.042 0 0 0 2.39 1.896 15.196 15.196 0 0 0 .174 3.94 13.472 13.472 0 0 1-3.178-1.72 7.973 7.973 0 0 1 .615-4.115ZM10 15c.898 0 1.778-.079 2.633-.23a13.473 13.473 0 0 1-1.72 3.178 8.099 8.099 0 0 1-1.826 0 13.47 13.47 0 0 1-1.72-3.178c.855.151 1.735.23 2.633.23ZM14.357 14.357a14.912 14.912 0 0 1-1.305 3.04 8.027 8.027 0 0 0 4.345-4.345c-.953.542-1.971.981-3.04 1.305ZM6.948 17.397a8.027 8.027 0 0 1-4.345-4.345c.953.542 1.971.981 3.04 1.305a14.912 14.912 0 0 0 1.305 3.04Z" />
                        </svg>

                        Fetch
                    </button>
                </div>
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

            <div class="flex flex-row gap-4 mt-8">
                <button type="submit" class="btn btn-primary flex-1 md:flex-0">Save</button>
                <a href="{{ route('bookmarks.index') }}" class="btn btn-outline flex-1 md:flex-0">Cancel</a>
            </div>
        </div>


    </form>
</x-app-layout>