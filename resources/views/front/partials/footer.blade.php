<footer class="footer-bg">
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer-bottom border-top">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 order-lg-6">
                                <p class="copyright-text">
                                    {{ __('Copyright') }} <a href="{{ route('front.home') }}">{{ config('app.name') }}</a> {{ date('Y') }}, {{ __('All right reserved!') }}
                                </p>
                            </div>
                            <div class="col-xl-6 col-lg-6 order-lg-6">
                                <div class="back-to-top">
                                    <a href="javascript:void(0);">{{ __('Back to top') }}<i class="fas fa-angle-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
