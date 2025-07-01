<fieldset class="fieldset">
    <legend class="fieldset-legend">Name</legend>
    <input type="text" name="name" class="input w-full" value="{{ $name ?? '' }}" />
</fieldset>

<fieldset class="fieldset">
    <legend class="fieldset-legend">Description</legend>
    <textarea class="textarea w-full" name="description">{{ $description ?? '' }}</textarea>
</fieldset>

<fieldset class="fieldset">
    <legend class="fieldset-legend">Author</legend>
    <input type="text" name="author" class="input w-full" value="{{ $author ?? '' }}" />
</fieldset>

<fieldset class="fieldset">
    <legend class="fieldset-legend">Image URL</legend>
    <input type="url" name="image_url" class="input w-full" value="{{ $image_url ?? '' }}" />
</fieldset>