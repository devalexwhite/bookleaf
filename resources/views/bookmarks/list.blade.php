<x-layout title="Your Bookmarks">
    <x-slot:styles>
        <style>
            ul#bookmark-list {
                list-style: none;
                padding: 0;
            }

            ul#bookmark-list > li {
                border-bottom: 1px solid white;
                margin-top: 1rem;
            }

            ul#bookmark-list > li:last-child {
                border-bottom: none;
            }

            ul#bookmark-list > li a {
                display: flex;
                flex-direction: column;
                text-decoration: none;
            }

            ul#bookmark-list .tag-list {
                padding: 0;
            }

            ul#bookmark-list .tag-list li {
                display: inline-block;
                padding: 0 0.25rem 0 0;
                font-size: 0.9rem;
            }

            ul#bookmark-list .tag-list li a {
                text-decoration: none;
                color: gray;
            }

            ul#bookmark-list .tag-list li a:hover {
                text-decoration: underline;
            }

            p.bookmark-description {
                font-weight: light;
                margin-top: 0px;
                color: #c7c7c7;
            }

            h3.bookmark-title {
                margin: 0.2rem 0;
            }
        </style>
    </x-slot:styles>
    <div class="page-action">
        <a class="button" href="{{ route('bookmarks.create') }}">New Bookmark</a>
    </div>
    <ul id="bookmark-list">
        @foreach ($bookmarks as $bookmark)
            <li>
                <ul class="tag-list">
                    @foreach($bookmark->tagsArray() as $tag)
                        <li><a href="#">{{$tag}}</a></li>
                    @endforeach
                </ul>
                <a href="{{ $bookmark->url }}" target="_blank">
                    <h3 class="bookmark-title">{{ $bookmark->name ?? $bookmark->url}}</h3>
                    <p class="bookmark-description">{{ $bookmark->description }}</p>
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
