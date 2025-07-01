<x-layout title="Your Bookmarks">
    <div class="flex flex-row items-center justify-center w-full py-4 px-2 gap-6 bg-gray-700 mb-16">
        <a class="btn btn-primary" href="{{ route('bookmarks.create') }}">New Bookmark</a>
        <a class="btn btn-outline" href="{{ route('bookmarks.export') }}">Export CSV</a>
    </div>
    <div class="min-h-screen">
        @include('bookmarks.list', ['bookmarks' => $bookmarks])
    </div>
</x-layout>