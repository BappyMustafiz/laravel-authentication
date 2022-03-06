<div class="page-header">
    <div class="page-header-title">
        <h4>
            @if (Route::is('videos.index'))
                Video List
            @elseif(Route::is('videos.create'))
                Create New Video    
            @elseif(Route::is('videos.edit'))
                Edit Video
            @elseif(Route::is('videos.show'))
                View Video
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
            @if (Route::is('videos.index'))
                <li class="breadcrumb-item" aria-current="page">Video List</li>
            @elseif(Route::is('videos.create'))
                <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Video List</a></li>
                <li class="breadcrumb-item" aria-current="page">Create New Video</li>
            @elseif(Route::is('videos.edit'))
                <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Video List</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit Video</li>
            @elseif(Route::is('videos.show'))
                <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Video List</a></li>
                <li class="breadcrumb-item" aria-current="page">Show Video</li>
            @endif
        </ul>
    </div>
</div>