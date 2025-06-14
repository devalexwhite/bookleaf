<x-layout title="Dashboard">
    <header>
        <h1>Dashboard</h1>
        <div id="actions">
            <a href="{{ route('bookmarks.create') }}">+ New Bookmark</a>
            <a href="{{ route('bookmarks.index') }}">All Bookmarks</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </header>
    <main>
    </main>
</x-layout>
