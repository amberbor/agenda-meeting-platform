<header>
    <nav class="navbar navbar-expand-xl absolute-nav transparent-nav cp-nav navbar-light bg-light fluid-nav">
        <a class="navbar-brand" href="{{ route('front.home') }}">
            <img src="{{ asset('img/agenda-app-white.png') }}" class="img-fluid" alt="" style="max-width: 200px;">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto job-browse">
            </ul>
            <ul class="navbar-nav ml-auto main-nav">
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
            <ul class="navbar-nav ml-auto account-nav">
                @guest
                    <li class="menu-item">
                        <a href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    </li>
                @else
                    <li class="menu-item">
                        <a href="{{ route('front.profile.edit') }}">
                            {{ __('Profile') }}
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout_form').submit(); return true;">
                            {{ __('Logout') }}
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
