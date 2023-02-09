@extends('layouts.app')

@section('title', 'Update the user')

@section('content')
    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-4">
                <img src="{{ $user->image ? $user->image->url() : '' }}" alt="" class="img-thumbnail avatar">

                <div class="card mt-4">
                    <div class="card-body">
                        <h6 class="card-title">Upload a different photo</h6>
                        <input type="file" class="form-control" name="avatar" id="">
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name"  class="form-control">
                </div>

                <div class="">
                    <label for="locale" class="form-label">Name:</label>
                    <select class="form-select" name="locale" id="locale">
                        @foreach(App\Models\User::LOCALES as $locale => $label)
                            <option value="{{ $locale }}" {{ $user->locale !== $locale ?: 'selected' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                @errors @enderrors

                <div class="">
                    <input type="submit" class="btn btn-primary my-3" value="Save Changes">
                </div>
            </div>
        </div>
    </form>
@endsection
