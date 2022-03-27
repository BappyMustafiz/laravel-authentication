<div class="page-header">
    <div class="page-header-title">
        <h4>
            @if (Route::is('training-exam-question.index'))
                Training Exam Question List
            @elseif(Route::is('training-exam-question.create'))
                Create New Training Exam  Question  
            @elseif(Route::is('training-exam-question.edit'))
                Edit Training Exam Question
            @elseif(Route::is('training-exam-question.show'))
                View Training Exam Question
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
            @if (Route::is('training-exam-question.index'))
                <li class="breadcrumb-item" aria-current="page">Training Exam Question List</li>
            @elseif(Route::is('training-exam-question.create'))
                <li class="breadcrumb-item"><a href="{{ route('training-exam-question.index') }}">Training Exam Question List</a></li>
                <li class="breadcrumb-item" aria-current="page">Create New Training Exam Question</li>
            @elseif(Route::is('training-exam-question.edit'))
                <li class="breadcrumb-item"><a href="{{ route('training-exam-question.index') }}">Training Exam Question List</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit Training Exam Question</li>
            @elseif(Route::is('training-exam-question.show'))
                <li class="breadcrumb-item"><a href="{{ route('training-exam-question.index') }}">Training Exam Question List</a></li>
                <li class="breadcrumb-item" aria-current="page">Show Training Exam Question</li>
            @endif
        </ul>
    </div>
</div>