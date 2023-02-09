@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf
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
            <div class="form-check">
                <input type="checkbox" id="remember" class="form-check-input" name="remember"
                    value="{{ old('remember') ? 'checked' : '' }}">
                <label for="remember" class="form-check-label">Remember Me</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
@endsection
