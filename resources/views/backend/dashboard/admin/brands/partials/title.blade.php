@if (Route::is('brands.index'))
    brands 
@elseif(Route::is('brands.create'))
    Create New Brands
@elseif(Route::is('brands.edit'))
    Edit Brand - {{ $brand->title }}
@elseif(Route::is('brands.show'))
    View Brand - {{ $brand->title }}
@endif
    | Admin Panel - 
    {{ config('app.name') }}