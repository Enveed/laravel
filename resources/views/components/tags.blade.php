<p>
    @foreach ($tags as $tag)
        <a href="{{ route('posts.tags.index', ['tag' => $tag->id]) }}" class="badge badge-success badge-lg text-decoration-none"
            style="background-color: #28a745;">{{ $tag->name }}</a>
    @endforeach
</p>
