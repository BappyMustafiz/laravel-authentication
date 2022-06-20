<div class="page-header">
    <div class="page-header-title">
        <h4>
            @if (Route::is('blog-post.index'))
                Blog Post List
            @elseif(Route::is('blog-post.create'))
                Create New Blog Post    
            @elseif(Route::is('blog-post.edit'))
                Edit Blog Post
            @elseif(Route::is('blog-post.show'))
                View Blog Post
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
            @if (Route::is('blog-post.index'))
                <li class="breadcrumb-item" aria-current="page">Blog Post List</li>
            @elseif(Route::is('blog-post.create'))
                <li class="breadcrumb-item"><a href="{{ route('blog-post.index') }}">Blog Post List</a></li>
                <li class="breadcrumb-item" aria-current="page">Create New Blog Post</li>
            @elseif(Route::is('blog-post.edit'))
                <li class="breadcrumb-item"><a href="{{ route('blog-post.index') }}">Blog Post List</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit Blog Post</li>
            @elseif(Route::is('blog-post.show'))
                <li class="breadcrumb-item"><a href="{{ route('blog-post.index') }}">Blog Post List</a></li>
                <li class="breadcrumb-item" aria-current="page">Show Blog Post</li>
            @endif
        </ul>
    </div>
</div>