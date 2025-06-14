<x-layout title="Your Bookmarks">
    <x-slot:styles>
        <style>
            ul#bookmark-list {
                list-style: none;
                padding: 0;
            }

            ul#bookmark-list > li {
                border-bottom: 1px solid white;
            }

            ul#bookmark-list > li:last-child {
                border-bottom: none;
            }

            ul#bookmark-list > li a {
                display: flex;
                flex-direction: row;
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
    <header>
        <h1>Your Bookmarks</h1>
        <div id="actions">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
    </header>
    <main>
        <ul id="bookmark-list">
            @foreach ($bookmarks as $bookmark)
                <li>
                   <a href="{{ $bookmark->url }}">
                        <ul class="tag-list">
                            @foreach($bookmark->tagsArray() as $tag)
                                <li><a href="#">{{$tag}}</a></li>
                            @endforeach
                        </ul>
                        <h3 class="bookmark-title">{{ $bookmark->name ?? $bookmark->url}}</h3>
                        @if($bookmark->tags)

                        @endif
                        <p class="bookmark-description">{{ $bookmark->description }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
    </main>
</x-layout>
