<!DOCTYPE html>
<html dir="ltr" lang="{{ app_locale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('page-title') - {{ config('app.name') }}</title>
        <link href="{{ asset('theme/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('theme/css/nunito-font.min.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/vendor/toastr/build/toastr.min.css') }}" rel="stylesheet">
        @yield('page-styles')
    </head>
    <body id="page-top">
        <div id="wrapper">
            @include('back.partials.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('back.partials.top-bar')
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">@yield('page-title')</h1>
                        </div>
                        @yield('page-content')
                    </div>
                </div>
                @include('back.partials.footer')
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        @include('shared.logout')
        <script src="{{ asset('theme/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('theme/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('theme/js/sb-admin-2.min.js') }}"></script>
        <script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('theme/vendor/toastr/build/toastr.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        </script>
        @include('shared.toastr')
        @yield('page-scripts')
    </body>
</html>
