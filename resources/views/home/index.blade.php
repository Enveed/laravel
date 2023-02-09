@extends('layouts.app')

@section('title', 'Home page')

@section('content')
<h1>{{ __('messages.welcome') }}</h1>
<h1>@lang('messages.welcome')</h1>

<p>{{ __('messages.example_with_value', ['name' => 'Rith']) }}</p>

<p>{{ trans_choice('messages.plural', 0) }}</p>
<p>{{ trans_choice('messages.plural', 1) }}</p>
<p>{{ trans_choice('messages.plural', 2) }}</p>

<p>Using JSON: {{ __('Welcome to Laravel!') }}</p>
<p>Using JSON: {{ __('Hello :name', ['name' => 'Peter']) }}</p>

<p>This is the content of home page.</p>
@endsection