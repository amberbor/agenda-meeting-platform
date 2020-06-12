<header class="header-2">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header-top">
                    <div class="logo-area">
                        <a href="{{ route('front.home') }}">
                            <img src="{{ asset('img/agenda-app.png') }}" alt="">
                        </a>
                    </div>
                    <div class="header-top-toggler">
                        <div class="header-top-toggler-button"></div>
                    </div>
                    <div class="top-nav">
                        <div class="dropdown header-top-account">
                            @guest
                                <a href="{{ route('login') }}" class="account-button goto">{{ __('Login') }}</a>
                                <a href="{{ route('register') }}" class="account-button goto">{{ __('Register') }}</a>
                            @else
                                <a href="javascript:void(0);" class="account-button">{{ __('My Account') }}</a>
                                <div class="account-card">
                                    <div class="header-top-account-info">
                                        <a href="#" class="account-thumb">
                                            <img src="{{ request()->user()->image }}" class="img-fluid" alt="">
                                        </a>
                                        <div class="account-body">
                                            <h5><a href="#">{{ request()->user()->name }}</a></h5>
                                            <span class="mail">{{ '@'.request()->user()->username }}</span><br>
                                            <span class="mail">{{ request()->user()->email }}</span>
                                        </div>
                                    </div>
                                    <ul class="account-item-list">
                                        <li>
                                            <a href="{{ route('front.agenda.index') }}">
                                                <span class="ti-calendar"></span>{{ __('Agenda') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('front.profile.edit') }}">
                                                <span class="ti-user"></span>{{ __('Edit Profile') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout_form').submit(); return true;">
                                                <span class="ti-power-off"></span>{{ __('Log Out') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout.other-devices') }}">
                                                <span class="ti-power-off"></span>{{ __('Logout from other Devices') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg cp-nav-2">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="menu-item">
                                <a title="{{ __('Home') }}" href="{{ route('front.home') }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li class="menu-item">
                                <a title="{{ __('Members') }}" href="{{ route('front.members.index') }}">
                                    {{ __('Members') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
