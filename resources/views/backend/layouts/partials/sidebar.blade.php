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
            @if ($user->hasRole('admin'))
                <li class="nav-item single-item {{ (Route::is('users.index') || Route::is('users.show')) ? 'active' : ''}}">
                    <a href="{{ route('users.index') }}">
                        <i class="icofont icofont-ui-user-group"></i>
                        <span data-i18n="nav.dash.main">User List</span>
                    </a>
                </li>
                <li class="nav-title" data-i18n="nav.category.navigation">
                    <i class="ti-line-dashed"></i>
                    <span>Pages</span>
                </li>
                <li class="nav-item {{ (Route::is('home_page') || (Route::is('testimonials.index') || Route::is('testimonials.create') || Route::is('testimonials.edit'))) ? 'has-class' : null }}">
                    <li class="nav-item single-item {{ (Route::is('home_page')) ? 'active' : ''}}">
                        <a href="{{ route('home_page') }}">
                            <i class="icofont icofont-ui-user-group"></i>
                            <span data-i18n="nav.dash.main">Home</span>
                        </a>
                    </li>
                    <li class="nav-item single-item {{ (Route::is('testimonials.index') || Route::is('testimonials.create') || Route::is('testimonials.edit')) ? 'active' : ''}}">
                        <a href="{{ route('testimonials.index') }}">
                            <i class="icofont icofont-ui-user-group"></i>
                            <span data-i18n="nav.dash.main">Testimonials</span>
                        </a>
                    </li>
                </li>
                <li class="nav-item {{ (Route::is('how_it_work_page')) ? 'has-class' : null }}">
                    <li class="nav-item single-item {{ (Route::is('how_it_work_page')) ? 'active' : ''}}">
                        <a href="{{ route('how_it_work_page') }}">
                            <i class="icofont icofont-ui-user-group"></i>
                            <span data-i18n="nav.dash.main">How it Works</span>
                        </a>
                    </li>
                </li>
                <li class="nav-title" data-i18n="nav.category.navigation">
                    <i class="ti-line-dashed"></i>
                    <span>Brand</span>
                </li>
                <li class="nav-item {{ (Route::is('brands.index') || Route::is('brands.create') || Route::is('brands.edit')) ? 'has-class' : null }}">
                    <a href="{{ route('brands.index') }}">
                        <i class="icofont icofont-toy-cat"></i>
                        <span data-i18n="nav.dash.main">Brand List</span>
                    </a>
                </li>
                <li class="nav-title" data-i18n="nav.category.navigation">
                    <i class="ti-line-dashed"></i>
                    <span>Training</span>
                </li>
                <li class="nav-item {{ (Route::is('training-categories.index') || Route::is('training-categories.create') || Route::is('training-categories.edit')) ? 'has-class' : null }}">
                    <a href="#!">
                        <i class="icofont icofont-toy-cat"></i>
                        <span data-i18n="nav.dash.main">Training Category</span>
                    </a>
                    <ul class="tree-1">
                        <li class="{{ Route::is('training-categories.index') ? 'has-class' : null }}">
                            <a href="{{ route('training-categories.index') }}" data-i18n="nav.dash.default"> Training Category List</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (Route::is('trainings.index') || Route::is('trainings.create') || Route::is('trainings.edit')) ? 'has-class' : null }}">
                    <a href="#!">
                        <i class="icofont icofont-ui-contact-list"></i>
                        <span data-i18n="nav.dash.main">Trainings</span>
                    </a>
                    <ul class="tree-1">
                        <li class="{{ Route::is('trainings.index') ? 'has-class' : null }}">
                            <a href="{{ route('trainings.index') }}" data-i18n="nav.dash.default"> Trainings List</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (Route::is('videos.index') || Route::is('videos.create') || Route::is('videos.edit')) ? 'has-class' : null }}">
                    <a href="#!">
                        <i class="icofont icofont-video"></i>
                        <span data-i18n="nav.dash.main">Videos</span>
                    </a>
                    <ul class="tree-1">
                        <li class="{{ Route::is('videos.index') ? 'has-class' : null }}">
                            <a href="{{ route('videos.index') }}" data-i18n="nav.dash.default"> Videos List</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-title" data-i18n="nav.category.navigation">
                    <i class="ti-line-dashed"></i>
                    <span>Exam</span>
                </li>
                <li class="nav-item {{ (Route::is('training-exams.index') || Route::is('training-exams.create') || Route::is('training-exams.edit')) ? 'has-class' : null }}">
                    <a href="#!">
                        <i class="icofont icofont-video"></i>
                        <span data-i18n="nav.dash.main">Training Exams</span>
                    </a>
                    <ul class="tree-1">
                        <li class="{{ Route::is('training-exams.index') ? 'has-class' : null }}">
                            <a href="{{ route('training-exams.index') }}" data-i18n="nav.dash.default"> Training Exam</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (Route::is('training-exam-question.index') || Route::is('training-exam-question.create') || Route::is('training-exam-question.edit')) ? 'has-class' : null }}">
                    <a href="#!">
                        <i class="icofont icofont-video"></i>
                        <span data-i18n="nav.dash.main">Exam Questions</span>
                    </a>
                    <ul class="tree-1">
                        <li class="{{ Route::is('training-exam-question.index') ? 'has-class' : null }}">
                            <a href="{{ route('training-exam-question.index') }}" data-i18n="nav.dash.default">Exam Question List</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>