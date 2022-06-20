@if (Route::is('blog-post.index'))
    Blog Post 
@elseif(Route::is('blog-post.create'))
    Create New Blog Post
@elseif(Route::is('blog-post.edit'))
    Edit Blog Post - {{ $blogPost->title }}
@elseif(Route::is('blog-post.show'))
    View Blog Post - {{ $blogPost->title }}
@endif
    | Admin Panel - 
    {{ config('app.name') }}