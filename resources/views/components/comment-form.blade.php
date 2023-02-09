<div class="my-2">
    @auth
        <form action="{{ $route }}" method="POST">
            @csrf {{-- avoid CSRF --}}

            <div>
                <label for="content" class="form-label">Content:</label>
                <textarea id="content" class="form-control" name="content" id="" cols="30" rows="10"></textarea>
            </div>

            <div><input type="submit" value="Add Comment" class="btn btn-primary w-100"></div>
        </form>
    @else
        <a href="{{ route('login') }}">Sign In</a> to post comments!
    @endauth
</div>
@errors @enderrors