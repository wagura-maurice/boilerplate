@extends('layouts.guest')

@section('content')
<h1 class="auth-title">{!! __('Verify Your Email Address') !!}</h1>
@if (session('resent'))
    <div class="alert alert-success" role="alert">
        {!! __('A fresh verification link has been sent to your email address.') !!}
    </div>
@endif

<p class="auth-subtitle mb-5">{!! __('Before proceeding, please check your email for a verification link.') !!}</p>

<p class="auth-subtitle mb-5">
    {!! __('If you did not receive the email') !!},
    <form method="POST" action="{!! route('verification.resend') !!}">
        @csrf
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{!! __('click here to request another') !!}</button>.
    </form>
</p>
@endsection
