@extends('layouts.app')

@section('title', 'Contact page')

@section('content')
    <h1>Contact page</h1>
    <p>Hello this is contact.</p>

    @can('home.secret')
        <p><a href="{{ route('home.secret') }}">Go to special contact details!</a></p>
    @endcan
@endsection