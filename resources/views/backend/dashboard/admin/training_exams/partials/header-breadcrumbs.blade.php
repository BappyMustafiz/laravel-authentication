<div class="page-header">
    <div class="page-header-title">
        <h4>
            @if (Route::is('training-exams.index'))
                Training Exam List
            @elseif(Route::is('training-exams.create'))
                Create New Training Exam    
            @elseif(Route::is('training-exams.edit'))
                Edit Training Exam
            @elseif(Route::is('training-exams.show'))
                View Training Exam
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
            @if (Route::is('training-exams.index'))
                <li class="breadcrumb-item" aria-current="page">Training Exam List</li>
            @elseif(Route::is('training-exams.create'))
                <li class="breadcrumb-item"><a href="{{ route('training-exams.index') }}">Training Exam List</a></li>
                <li class="breadcrumb-item" aria-current="page">Create New Training Exam</li>
            @elseif(Route::is('training-exams.edit'))
                <li class="breadcrumb-item"><a href="{{ route('training-exams.index') }}">Training Exam List</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit Training Exam</li>
            @elseif(Route::is('training-exams.show'))
                <li class="breadcrumb-item"><a href="{{ route('training-exams.index') }}">Training Exam List</a></li>
                <li class="breadcrumb-item" aria-current="page">Show Training Exam</li>
            @endif
        </ul>
    </div>
</div>