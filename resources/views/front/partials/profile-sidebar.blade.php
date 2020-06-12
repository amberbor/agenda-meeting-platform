<div class="dashboard-sidebar">
    <div class="user-info">
        <div class="thumb">
            <img src="{{ request()->user()->image }}" class="img-fluid" alt="">
        </div>
        <div class="user-body">
            <h5>{{ request()->user()->name }}</h5>
            <span>{{ '@'.request()->user()->username }}</span>
        </div>
    </div>
    <div class="dashboard-menu">
        <ul>
            <li class="{{ request()->is('*agenda') ? 'active' : '' }}">
                <i class="fas fa-calendar"></i><a href="{{ route('front.agenda.index') }}">{{ __('Agenda') }}</a>
            </li>
            <li class="{{ request()->is('*profile/edit') ? 'active' : '' }}">
                <i class="fas fa-user"></i><a href="{{ route('front.profile.edit') }}">{{ __('Edit Profile') }}</a>
            </li>
        </ul>
        <ul class="delete">
            <li>
                <i class="fas fa-power-off"></i>
                <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout_form').submit(); return true;">
                    {{ __('Logout') }}
                </a>
            </li>
            <li>
                <i class="fas fa-power-off"></i>
                <a href="{{ route('logout.other-devices') }}">
                    {{ __('Logout from other Devices') }}
                </a>
            </li>
        </ul>
    </div>
</div>
