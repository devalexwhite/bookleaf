<x-app-layout title="Your Bookmarks">
    <div class="min-h-screen w-full flex flex-row">
        <x-folder-tree :folders="Auth::user()->baseFolders" />
        @include('bookmarks.list', ['bookmarks' => $bookmarks, 'view' => $view])
    </div>
</x-app-layout>