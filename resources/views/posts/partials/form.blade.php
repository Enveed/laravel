<div>
    <label for="title" class="form-label">Title:</label>
    <input id="title" type="text" name="title" class="form-control" value="{{ old('title', optional($post ?? null)->title) }}">
</div>
{{-- @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror --}}
<div>
    <label for="content" class="form-label">Content:</label>
    <textarea id="content" class="form-control" name="content" id="" cols="30" rows="10">{{ old('content', optional($post ?? null)->content) }}</textarea>
</div>

<div>
    <label class="form-label">Thumbnail:</label>
    <input id="title" type="file" name="thumbnail" class="form-control">
</div>

@errors @enderrors