@props(['folders'])

<ul class="{{ $folders[0]->parent_id ? '' : 'menu menu-xs bg-base-300 max-w-xs w-full h-full rounded-r-2xl' }}">
    @foreach ($folders as $folder)
        <li>
            @if ($folder->children && $folder->children->count())
                <details open>
                    <summary>
                        @if ($folder->icon)
                            <span class="mr-1">{!! $folder->icon !!}</span>
                        @else
                            <!-- Default folder icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>
                        @endif
                        {{ $folder->name }}
                    </summary>
                    <x-folder-tree :folders="$folder->children" />
                </details>
            @else
                <a>
                    @if ($folder->icon)
                        <span class="mr-1">{!! $folder->icon !!}</span>
                    @else
                        <!-- Default folder icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                        </svg>
                    @endif
                    {{ $folder->name }}
                </a>
            @endif
        </li>
    @endforeach
</ul>