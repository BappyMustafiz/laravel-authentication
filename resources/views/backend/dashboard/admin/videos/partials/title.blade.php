@if (Route::is('videos.index'))
    Videos 
@elseif(Route::is('videos.create'))
    Create New Video
@elseif(Route::is('videos.edit'))
    Edit Video - {{ $video->title }}
@elseif(Route::is('videos.show'))
    View Video - {{ $video->title }}
@endif
    | Admin Panel - 
    {{ config('app.name') }}