<div class="page-header">
    <div class="page-header-title">
        <h4>
            @if (Route::is('blog-category.index'))
                Blog List
            @elseif(Route::is('blog-category.create'))
                Create New Blog    
            @elseif(Route::is('blog-category.edit'))
                Edit Blog
            @elseif(Route::is('blog-category.show'))
                View Blog
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
            @if (Route::is('blog-category.index'))
                <li class="breadcrumb-item" aria-current="page">Blog List</li>
            @elseif(Route::is('blog-category.create'))
                <li class="breadcrumb-item"><a href="{{ route('blog-category.index') }}">Blog List</a></li>
                <li class="breadcrumb-item" aria-current="page">Create New Blog</li>
            @elseif(Route::is('blog-category.edit'))
                <li class="breadcrumb-item"><a href="{{ route('blog-category.index') }}">Blog List</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit Blog</li>
            @elseif(Route::is('blog-category.show'))
                <li class="breadcrumb-item"><a href="{{ route('blog-category.index') }}">Blog List</a></li>
                <li class="breadcrumb-item" aria-current="page">Show Blog</li>
            @endif
        </ul>
    </div>
</div>