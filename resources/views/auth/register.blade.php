@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
                value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password"
                value="" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
            @endif
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Confirmed Password</label>
            <input type="password" class="form-control" name="password_confirmation" value="" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
@endsection
