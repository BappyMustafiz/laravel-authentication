@php $user = Auth::guard('web')->user(); @endphp
<div class="main-menu">
    <div class="main-menu-header">
        <img class="profile_image" src="{{ Auth::user()->avatar ? Auth::user()->avatar : asset('assets/backend/assets/images/user.png') }}" alt="User-Profile-Image">
        <div class="user-details">
            <span>@if((Auth::user()->first_name) && Auth::user()->last_name) {{ Auth::user()->first_name .' '. Auth::user()->last_name }} @else {{ Auth::user()->name }} @endif</span>
            <span id="more-details">{{ Auth::user()->roles ? Auth::user()->roles[0]['display_name'] : 'Admin' }}<i class="ti-angle-down"></i></span>
        </div>
    </div>
    <div class="main-menu-content">
        <ul class="main-navigation">
            @if ($user->hasRole('admin'))
                <li class="more-details">
                    <a href="{{ route('user_frofile') }}"><i class="ti-user"></i>View Profile</a>
                    <form method="POST" action="{{ route('admin-logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="ti-layout-sidebar-left"></i>Logout
                        </a>
                    </form>
                </li>
                <li class="nav-title" data-i18n="nav.category.navigation">
                    <i class="ti-line-dashed"></i>
                    <span>Dashboard</span>
                </li>
                <li class="nav-item single-item {{ (Route::is('dashboard')) ? 'active' : ''}}">
                    <a href="{{ route('dashboard') }}">
                        <i class="ti-home"></i>
                        <span data-i18n="nav.dash.main">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item single-item {{ (Route::is('users.index') || Route::is('users.show')) ? 'active' : ''}}">
                    <a href="{{ route('users.index') }}">
                        <i class="icofont icofont-ui-user-group"></i>
                        <span data-i18n="nav.dash.main">User List</span>
                    </a>
                </li>
                <li class="nav-item single-item {{ (Route::is('customer-queries')) ? 'active' : ''}}">
                    <a href="{{ route('customer-queries') }}">
                        <i class="icofont icofont-question-circle"></i>
                        <span data-i18n="nav.dash.main">Customer Query</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>