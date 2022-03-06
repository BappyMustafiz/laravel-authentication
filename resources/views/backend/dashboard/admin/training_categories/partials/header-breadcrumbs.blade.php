<div class="page-header">
    <div class="page-header-title">
        <h4>
            @if (Route::is('training-categories.index'))
                Training Category List
            @elseif(Route::is('training-categories.create'))
                Create New Training Category    
            @elseif(Route::is('training-categories.edit'))
                Edit Training Category
            @elseif(Route::is('training-categories.show'))
                View Training Category
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
            @if (Route::is('training-categories.index'))
                <li class="breadcrumb-item" aria-current="page">Training Category List</li>
            @elseif(Route::is('training-categories.create'))
                <li class="breadcrumb-item"><a href="{{ route('training-categories.index') }}">Training Category List</a></li>
                <li class="breadcrumb-item" aria-current="page">Create New Training Category</li>
            @elseif(Route::is('training-categories.edit'))
                <li class="breadcrumb-item"><a href="{{ route('training-categories.index') }}">Training Category List</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit Training Category</li>
            @elseif(Route::is('training-categories.show'))
                <li class="breadcrumb-item"><a href="{{ route('training-categories.index') }}">Training Category List</a></li>
                <li class="breadcrumb-item" aria-current="page">Show Training Category</li>
            @endif
        </ul>
    </div>
</div>