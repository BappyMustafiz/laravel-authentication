<div class="page-header">
    <div class="page-header-title">
        <h4>
            @if (Route::is('trainings.index'))
                Training List
            @elseif(Route::is('trainings.create'))
                Create New Training    
            @elseif(Route::is('trainings.edit'))
                Edit Training
            @elseif(Route::is('trainings.show'))
                View Training
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
            @if (Route::is('trainings.index'))
                <li class="breadcrumb-item" aria-current="page">Training List</li>
            @elseif(Route::is('trainings.create'))
                <li class="breadcrumb-item"><a href="{{ route('trainings.index') }}">Training List</a></li>
                <li class="breadcrumb-item" aria-current="page">Create New Training</li>
            @elseif(Route::is('trainings.edit'))
                <li class="breadcrumb-item"><a href="{{ route('trainings.index') }}">Training List</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit Training</li>
            @elseif(Route::is('trainings.show'))
                <li class="breadcrumb-item"><a href="{{ route('trainings.index') }}">Training List</a></li>
                <li class="breadcrumb-item" aria-current="page">Show Training</li>
            @endif
        </ul>
    </div>
</div>