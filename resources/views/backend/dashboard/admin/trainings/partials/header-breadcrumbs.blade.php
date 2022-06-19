<div class="page-header">
    <div class="page-header-title">
        <h4>
            @if (Route::is('brands.index'))
                Brand List
            @elseif(Route::is('brands.create'))
                Create New Brand    
            @elseif(Route::is('brands.edit'))
                Edit Brand
            @elseif(Route::is('brands.show'))
                View Brand
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
            @if (Route::is('brands.index'))
                <li class="breadcrumb-item" aria-current="page">Brand List</li>
            @elseif(Route::is('brands.create'))
                <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Brand List</a></li>
                <li class="breadcrumb-item" aria-current="page">Create New Brand</li>
            @elseif(Route::is('brands.edit'))
                <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Brand List</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit Brand</li>
            @elseif(Route::is('brands.show'))
                <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Brand List</a></li>
                <li class="breadcrumb-item" aria-current="page">Show Brand</li>
            @endif
        </ul>
    </div>
</div>