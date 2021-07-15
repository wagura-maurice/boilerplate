@extends('layouts.guest')

@section('content')
<h1 class="auth-title">{!! __('Register') !!}</h1>
<p class="auth-subtitle mb-5">Input your account registration credentials.</p>

<form method="POST" action="{!! route('register') !!}">
    @csrf
    <div class="form-group position-relative has-icon-left mb-4">
        <input id="name" type="text" class="form-control form-control-xl @error('name') is-invalid @enderror" name="name" value="{!! old('name') !!}" placeholder="Name" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{!! $message !!}</strong>
            </span>
        @enderror
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input id="email" type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{!! old('email') !!}" placeholder="Email" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{!! $message !!}</strong>
            </span>
        @enderror
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input id="password" type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{!! $message !!}</strong>
            </span>
        @enderror
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input id="password-confirm" type="password" class="form-control form-control-xl" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{!! __('Register') !!}</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
    <p class='text-gray-600'>{!! __('Already have an account?') !!} <a href="{!! route('login') !!}" class="font-bold">{!! __('Login') !!}</a>.</p>
</div>
@endsection
