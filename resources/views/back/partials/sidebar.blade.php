<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('back.dashboard.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ is_active_route('back.dashboard.index') }}">
        <a class="nav-link" href="{{ route('back.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item {{ is_active('users*') }}">
        <a class="nav-link {{ is_collapsed('users*') }}" href="javascript:void(0)" data-toggle="collapse"
           data-target="#users_sub_menu" aria-expanded="true">
            <i class="fas fa-fw fa-users"></i>
            <span>{{ __('Users') }}</span>
        </a>
        <div id="users_sub_menu" class="collapse {{ is_shown('users*') }}">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ is_active_route('back.users.index') }}" href="{{ route('back.users.index') }}">
                    {{ __('Users') }}
                </a>
            </div>
        </div>
    </li>
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
