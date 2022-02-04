<div class="page-header">
    <div class="page-header-title">
        <h4>
            @if (Route::is('users.index'))
                User List
            @elseif(Route::is('users.show'))
                View User
            @endif
        </h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            @if (Route::is('users.index'))
                <li class="breadcrumb-item" aria-current="page">User List</li>
            @elseif(Route::is('users.show'))
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User List</a></li>
                <li class="breadcrumb-item" aria-current="page">Show User</li>
            @endif
        </ul>
    </div>
</div>