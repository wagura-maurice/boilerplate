@extends('layouts.guest')

@section('content')
<h1 class="auth-title">{!! __('Reset Password') !!}</h1>
<p class="auth-subtitle mb-5">Input your email and we will send you reset password link.</p>
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {!! session('status') !!}
    </div>
@endif
<form method="POST" action="{!! route('password.email') !!}">
    @csrf
    <div class="form-group position-relative has-icon-left mb-4">
        <input id="email" type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{!! old('email') !!}" placeholder="Email" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{!! $message !!}</strong>
            </span>
        @enderror

        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{!! __('Send Password Reset Link') !!}</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
    <p class='text-gray-600'>{!! __('Remember your account?') !!} <a href="{!! route('login') !!}" class="font-bold">{!! __('Login') !!}</a>.
    </p>
</div>
@endsection
