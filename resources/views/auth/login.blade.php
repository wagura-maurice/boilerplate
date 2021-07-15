@extends('layouts.guest')

@section('content')

<h1 class="auth-title">{!! __('Login') !!}</h1>
<p class="auth-subtitle mb-5">enter your account credentials.</p>

<form method="POST" action="{!! route('login') !!}">
    @csrf
    <div class="form-group position-relative has-icon-left mb-4">
        <input id="email" type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{!! old('email') !!}" placeholder="Email" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{!! $message !!}</strong>
            </span>
        @enderror
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input id="password" type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{!! $message !!}</strong>
            </span>
        @enderror
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <div class="form-check form-check-lg d-flex align-items-end">
        <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" value="{!! old('remember') ? 'checked' : '' !!}">
        <label class="form-check-label text-gray-600" for="remember">
            {!! __('Remember Me') !!}
        </label>
    </div>
    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{!! __('Login') !!}</button>
</form>

<div class="text-center mt-5 text-lg fs-4">
    @if (Route::has('register'))
    <p class="text-gray-600">
        Don't have an account? <a href="{!! route('register') !!}" class="font-bold">{!! __('Register') !!}</a>.
    </p>
    @endif
    @if (Route::has('password.request'))
        <p><a class="font-bold" href="{!! route('password.request') !!}">{!! __('Forgot Your Password?') !!}</a>.</p>
    @endif
</div>
@endsection
