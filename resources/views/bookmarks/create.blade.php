<x-layout title="Create Bookmark">
     @if ($errors->any())
        <div id="errors">
            <h5>Validation Errors</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('bookmarks.store') }}">
        @csrf
        <label>
            <p>URL*</p>
            <input type="url" name="url" placeholder="https://bookleaf.dev" />
        </label>
        <label>
            <p>Tags</p>
            <input type="text" name="tags" placeholder="tag1,tag2" />
        </label>
        <label>
            <p>Name</p>
            <input type="text" name="name" placeholder="BookLeaf"/>
        </label>
        <label>
            <p>Author</p>
            <input type="text" name="author" placeholder="Bob Builder"/>
        </label>
        <label>
            <p>Description</p>
            <textarea name="description" rows="4" cols="80"></textarea>
        </label>
        <div style="margin-top: 1rem;">
            <button type="submit" class="button">Save</button>
            <a href="{{ route('bookmarks.index') }}" class="button">Back</a>
        </div>

    </form>
</x-layout>
