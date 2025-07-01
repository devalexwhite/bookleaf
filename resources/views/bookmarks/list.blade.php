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

<ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-8 max-w-6xl mx-auto px-6 py-3"
    id="bookmark-list">
    @foreach ($bookmarks as $bookmark)
        <li class="w-full">
            <div class="w-full flex flex-col" target="_blank">
                <div
                    class="relative w-full h-64 rounded-xl overflow-hidden shadow-sm hover:shadow-lg hover:-translate-y-1 group transition-all">
                    <div
                        class="absolute z-20 top-0 left-0 w-full h-full flex-row backdrop-blur-sm transition-all bg-white/40 items-center justify-center gap-4 opacity-0 group-hover:opacity-100 flex">
                        <a href="{{ $bookmark->url }}" class="text-3xl bg-black/60 p-3 rounded-lg" target="_blank">
                            🔗
                        </a>
                        <button href="{{ $bookmark->url }}" class="text-3xl bg-black/60 p-3 rounded-lg cursor-pointer"
                            hx-confirm="Are you sure you wish to delete this bookmark?" hx-target="#bookmark-list"
                            hx-swap="outerHTML" hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                            hx-delete="{{ route("bookmarks.destroy", ['bookmark' => $bookmark]) }}">
                            🗑️
                        </button>
                    </div>
                    @if (isset($bookmark->image_url))
                        <img src="{{ $bookmark->image_url }}"
                            class="w-full h-64 object-cover rounded-lg shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all" />
                    @else
                        <div
                            class="absolute top-0 left-0 w-full h-full backdrop-blur-lg flex items-center bg-white/80 justify-center z-10">
                            <h3 class="text-gray-800 text-2xl lowercase tracking-wide font-black text-center">
                                {{ $bookmark->name ?? Uri::of($bookmark->url)->host() }}
                            </h3>
                        </div>
                        <div class="absolute top-0 left-0 w-full h-full {{ $gradients[array_rand($gradients)] }} blur-xl">
                        </div>
                    @endif
                </div>
                <ul class="flex flex-row gap-2 flex-wrap mt-2">
                    @foreach ($bookmark->tags as $tag)
                        <li
                            class=" bg-blue-500 hover:bg-blue-400 transition-all rounded-full px-3 py-1 text-sm text-gray-100 font-bold">
                            <a href="/">
                                {{ $tag->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2 leading-6">
                    {{ $bookmark->notes ?? $bookmark->description }}
                </p>
            </div>
        </li>
    @endforeach
</ul>