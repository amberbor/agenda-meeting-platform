@extends('front.layouts.app', ['special_header' => true])
@section('page-title', 'Home')
@section('page-content')
    <div class="banner banner-1 banner-1-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content">
                        <h1>{{ $clients_registered . __('+ Members Registered') }}</h1>
                        <p>{{ __('Create free account to use our APP now!') }}</p>
                        <a href="{{ route('register') }}" class="button">{{ __('Register Now!') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
