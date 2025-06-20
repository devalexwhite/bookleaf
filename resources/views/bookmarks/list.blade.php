<x-layout title="Your Bookmarks">
    <x-slot:styles>
        <style>
            ul#bookmark-list {
                list-style: none;
                padding: 0;
            }

            ul#bookmark-list > li {
                padding-bottom: 1rem;
                border-bottom: 1px solid gray;
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

            .bookmark-li .bookmark-delete {
                display: none;
            }

            .bookmark-li:hover .bookmark-delete {
                display: block;
            }
        </style>
    </x-slot:styles>
    <div style="display: flex;flex-direction: row;align-items: center;gap: 1rem;">
        <a class="button" href="{{ route('bookmarks.create') }}">New Bookmark</a>
        <a class="" href="{{ route('bookmarks.export') }}">Export CSV</a>
    </div>
    <div style="display: flex;flex-direction: row; gap: 3rem;margin-top: 2rem;">
        <div style="min-width: 150px;">
            <h4>Folders</h4>
            <a href="{{ route('bookmarks.index') }}" style="margin-bottom: 1rem;display: block;">All Bookmarks</a>
            <ul id="folders-list">
                @foreach(App\Models\Bookmark::getAllFolders() as $folder)
                    <details>
                        <summary>{{ $folder }}</summary>
                        <ul>
                            <li><a href="{{ route('bookmarks.index', ['folder' => urlencode($folder)]) }}">All</a></li>
                            @foreach(App\Models\Bookmark::getTagsForFolder($folder) as $tag)
                                <li><a href="{{ route('bookmarks.index', ['folder' => urlencode($folder), 'tag' => urlencode($tag)]) }}">{{ $tag }}</a></li>
                            @endforeach
                        </ul>
                    </details>
                @endforeach
            </ul>
        </div>
        <ul id="bookmark-list">
        @foreach ($bookmarks as $bookmark)
            <li class="bookmark-li">
                <a href="{{ $bookmark->url }}" target="_blank">
                    <div style="display: flex;flex-direction: row;gap: 0.25rem;align-items: center;">
                        <img src="http://www.google.com/s2/favicons?domain={{ urlencode($bookmark->url) }}" width="16" height="16" loading="lazy" />
                        <h3 class="bookmark-title" style="margin:0;font-size: 1rem;padding:0;font-weight: 500;">{{ $bookmark->name ?? $bookmark->url}}</h3>
                    </div>
                    <p class="bookmark-description" style="margin: 0;font-size: 1rem;font-weight: 200;">{{ $bookmark->notes ?? $bookmark->description }}</p>
                </a>
                <form method="POST"  action="{{ route('bookmarks.destroy', ['bookmark' => $bookmark]) }}">
                    @csrf
                    @method('DELETE')
                    <button class="bookmark-delete" type="submit" style="margin: 0;background: red;border:none;color:white;">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    </div>
</x-layout>
