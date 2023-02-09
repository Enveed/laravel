@extends('layouts.app')

@section('title', 'Create the post')

@section('content')
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf {{-- avoid CSRF --}}
    @include('posts.partials.form')
    <div><input type="submit" value="Create" class="btn btn-primary w-100"></div>
</form>
@endsection