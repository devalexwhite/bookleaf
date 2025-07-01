<fieldset class="fieldset" id="tags-input">
    <legend class="fieldset-legend">Tags</legend>
    <input type="text" name="query" value="{{ $query ?? '' }}" class="input w-full"
        placeholder="Type to search or create a new tag..." hx-trigger="keyup changed delay:500ms"
        hx-target="#tags-input" hx-swap="outerHTML" hx-post="{{ route('tags.suggest') }}" />
    <input type="hidden" name="tags" value="{{ $tags ?? '' }}" />
    <ul id="tag-suggestions" class="flex flex-row flex-wrap gap-2 p-0">
        @if(isset($tags))
            @foreach (explode(",", $tags ?? "") as $tag)
                <button class="badge badge-primary cursor-pointer" type="button" hx-post="{{ route('tags.suggest', [
                    'toggle' => urlencode($tag)
                ]) }}" hx-target="#tags-input">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd"
                            d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span>
                        {{ $tag }}
                    </span>
                </button>
            @endforeach
        @endif
        @if (isset($suggestions))
            @foreach ($suggestions as $suggestion)
                <button class="badge badge-outline cursor-pointer" type="button" hx-post="{{ route('tags.suggest', [
                    'toggle' => urlencode($suggestion['name'])
                ]) }}" hx-target="#tags-input">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                    <span>
                        {{ $suggestion['name'] }}
                    </span>
                </button>
            @endforeach
        @endif
        @if(isset($query))
                <button class="badge badge-outline cursor-pointer" type="button" hx-post="{{ route('tags.suggest', [
                'toggle' => urlencode($query)
            ]) }}" hx-target="#tags-input">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                        <path
                            d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                    <span>
                        {{ $query }}
                    </span>
                </button>
        @endif
    </ul>

</fieldset>