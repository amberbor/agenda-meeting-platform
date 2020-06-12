<!doctype html>
<html dir="ltr" lang="{{ app_locale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('auth/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}" />
    </head>
    <body>
        <div id="app">
            <main class="py-4">
                <div class="container" style="padding-top: 50px; padding-bottom: 50px;">
                    <div class="row justify-content-center">
                        <div class="col-md-4 justify-content-center text-center">
                            <a href="{{ route('front.home') }}">
                                <img src="{{ asset('img/agenda-app.png') }}" alt="" style="width: 100%;">
                            </a>
                        </div>
                    </div>
                </div>
                @yield('page-content')
            </main>
        </div>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
        @include('shared.toastr')
    </body>
</html>
