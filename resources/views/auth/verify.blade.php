@extends('auth.layouts.app')
@section('page-title', __('Verify Your Email Address'))
@section('page-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <div class="text-center auth-title-padding-bottom">
                    <h2>{{ __('Verify Your Email Address') }}</h2>
                </div>
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>
    </div>
@endsection
