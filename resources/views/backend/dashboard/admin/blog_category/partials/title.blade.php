@if (Route::is('blog-category.index'))
    Blog Category 
@elseif(Route::is('blog-category.create'))
    Create New Blog Category
@elseif(Route::is('blog-category.edit'))
    Edit Blog Category - {{ $blogCategory->title }}
@elseif(Route::is('brands.show'))
    View Blog Category - {{ $blogCategory->title }}
@endif
    | Admin Panel - 
    {{ config('app.name') }}