<x-app-layout title="Your Bookmarks">
    <div class="min-h-screen">
        @include('bookmarks.list', ['bookmarks' => $bookmarks, 'view' => $view])
    </div>
</x-app-layout>