@php
    $gradients = [
        'bg-linear-to-r from-red-500 via-orange-500 to-yellow-500',
        'bg-linear-to-r from-cyan-700 via-blue-500 to-indigo-600',
        'bg-linear-to-r from-gray-800 via-blue-700 to-gray-900',
        'bg-linear-to-r from-yellow-200 via-yellow-400 to-yellow-600',
        'bg-linear-to-r from-orange-600 via-amber-900 to-amber-950',
        'bg-linear-to-r from-amber-200 via-orange-400 to-red-600',
    ];
@endphp
<div id="bookmark-list" class="max-w-6xl mx-auto px-6 py-3">
    <div class="flex flex-col-reverse gap-8 md:gap-0 md:flex-row items-center justify-between w-full mb-10">
        <div class="join">
            <button hx-get="{{ route('bookmarks.index', ['view' => 'card']) }}" hx-target="#bookmark-list"
                hx-push-url="true" hx-swap="outerHTML"
                class="btn  btn-sm {{ $view == 'card' ? 'btn-accent' : 'btn-ghost' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd"
                        d="M4.25 2A2.25 2.25 0 0 0 2 4.25v2.5A2.25 2.25 0 0 0 4.25 9h2.5A2.25 2.25 0 0 0 9 6.75v-2.5A2.25 2.25 0 0 0 6.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 2 13.25v2.5A2.25 2.25 0 0 0 4.25 18h2.5A2.25 2.25 0 0 0 9 15.75v-2.5A2.25 2.25 0 0 0 6.75 11h-2.5Zm9-9A2.25 2.25 0 0 0 11 4.25v2.5A2.25 2.25 0 0 0 13.25 9h2.5A2.25 2.25 0 0 0 18 6.75v-2.5A2.25 2.25 0 0 0 15.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 11 13.25v2.5A2.25 2.25 0 0 0 13.25 18h2.5A2.25 2.25 0 0 0 18 15.75v-2.5A2.25 2.25 0 0 0 15.75 11h-2.5Z"
                        clip-rule="evenodd" />
                </svg>

                Card View
            </button>
            <button class="btn btn-sm {{ $view == 'list' ? 'btn-accent' : 'btn-ghost' }}" hx-push-url="true"
                hx-get="{{ route('bookmarks.index', parameters: ['view' => 'list']) }}" hx-target="#bookmark-list"
                hx-swap="outerHTML">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd"
                        d="M6 4.75A.75.75 0 0 1 6.75 4h10.5a.75.75 0 0 1 0 1.5H6.75A.75.75 0 0 1 6 4.75ZM6 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H6.75A.75.75 0 0 1 6 10Zm0 5.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H6.75a.75.75 0 0 1-.75-.75ZM1.99 4.75a1 1 0 0 1 1-1H3a1 1 0 0 1 1 1v.01a1 1 0 0 1-1 1h-.01a1 1 0 0 1-1-1v-.01ZM1.99 15.25a1 1 0 0 1 1-1H3a1 1 0 0 1 1 1v.01a1 1 0 0 1-1 1h-.01a1 1 0 0 1-1-1v-.01ZM1.99 10a1 1 0 0 1 1-1H3a1 1 0 0 1 1 1v.01a1 1 0 0 1-1 1h-.01a1 1 0 0 1-1-1V10Z"
                        clip-rule="evenodd" />
                </svg>

                List View
            </button>
        </div>

        <div class="flex flex-row gap-2">
            <a class="btn btn-primary btn-sm" href="{{ route('bookmarks.create') }}">New Bookmark</a>
            <a class="btn btn-outline btn-sm" href="{{ route('bookmarks.export') }}">Export CSV</a>
        </div>
    </div>
    @if (isset($view) && $view == 'list')
        <ul class="list bg-base-100">
            @foreach ($bookmarks as $bookmark)
                <li class="flex flex-col list-row">
                    <div class=" flex flex-row w-full">
                        <div class="flex flex-row w-full flex-1">
                            @if ($bookmark->image_url && trim($bookmark->image_url) != "")
                                <div class="mr-2">
                                    <img class="size-10 rounded-box" src="{{ $bookmark->image_url }}" />
                                </div>
                            @endif
                            <div class="flex-1 flex-col flex">
                                <a href="{{ $bookmark->url }}" target="_blank" class="flex-1">

                                    <div>{{ $bookmark->name ?? Uri::of($bookmark->url)->host() }}</div>
                                    @php $lastUpdate = $bookmark->lastFeedUpdate() @endphp
                                    @if ($lastUpdate)
                                        <div>
                                            <a class="text-xs btn btn-link p-0 m-0 btn-xs" href="{{ $lastUpdate->link }}"
                                                target="_blank">
                                                Last updated {{ $lastUpdate->published_at->diffForHumans() }}
                                            </a>
                                        </div>
                                    @endif
                                    <div class="mt-1 text-xs font-semibold opacity-60">
                                        {{ $bookmark->notes ?? $bookmark->description }}
                                    </div>
                                </a>

                            </div>
                        </div>
                        <button class="btn mt-2 md:btn-sm btn-xs md:mt-0 btn-square btn-ghost"
                            hx-confirm="Are you sure you wish to delete this bookmark?" hx-target="#bookmark-list"
                            hx-swap="outerHTML" hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                            hx-delete="{{ route("bookmarks.destroy", ['bookmark' => $bookmark, 'view' => $view]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>

                    <ul class="flex flex-row gap-2 flex-wrap">
                        @foreach ($bookmark->tags as $tag)
                            <li class=" badge badge-outline">
                                {{ $tag->name }}
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @else
        @php
            $columns = 3;
            $bookmarkCount = count($bookmarks);
            $columnBookmarks = array_fill(0, $columns, []);
            foreach ($bookmarks as $i => $bookmark) {
                $columnBookmarks[$i % $columns][] = $bookmark;
            }
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($columnBookmarks as $col)
                <div class="flex flex-col gap-4">
                    @foreach ($col as $bookmark)
                        <div class="card bg-base-200 w-full shadow-sm">
                            @if ($bookmark->image_url && trim($bookmark->image_url) != "")
                                <figure>
                                    <img src="{{ $bookmark->image_url }}" />
                                </figure>
                            @endif
                            <div class="card-body">
                                <h2 class="card-title">
                                    {{ $bookmark->name ?? Uri::of($bookmark->url)->host() }}
                                </h2>
                                @php $lastUpdate = $bookmark->lastFeedUpdate() @endphp
                                @if ($lastUpdate)
                                    <div>
                                        <a class="text-xs btn btn-link p-0 btn-xs" href="{{ $lastUpdate->link }}" target="_blank">
                                            Last updated {{ $lastUpdate->published_at->diffForHumans() }}
                                        </a>
                                    </div>
                                @endif
                                <p>{{ $bookmark->notes ?? $bookmark->description }}</p>
                                <div class="card-actions justify-start my-1">
                                    @foreach ($bookmark->tags as $tag)
                                        <div class="badge badge-outline">{{ $tag->name }}</div>
                                    @endforeach
                                </div>
                                <div class="card-actions">
                                    <a href="{{ $bookmark->url }}" target="_blank" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="size-5">
                                            <path fill-rule="evenodd"
                                                d="M4.25 5.5a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 0 0 .75-.75v-4a.75.75 0 0 1 1.5 0v4A2.25 2.25 0 0 1 12.75 17h-8.5A2.25 2.25 0 0 1 2 14.75v-8.5A2.25 2.25 0 0 1 4.25 4h5a.75.75 0 0 1 0 1.5h-5Z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M6.194 12.753a.75.75 0 0 0 1.06.053L16.5 4.44v2.81a.75.75 0 0 0 1.5 0v-4.5a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0 0 1.5h2.553l-9.056 8.194a.75.75 0 0 0-.053 1.06Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Visit
                                    </a>
                                    <button class="btn btn-ghost" hx-confirm="Are you sure you wish to delete this bookmark?"
                                        hx-target="#bookmark-list" hx-swap="outerHTML"
                                        hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                                        hx-delete="{{ route("bookmarks.destroy", ['bookmark' => $bookmark, 'view' => $view]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endif
</div>