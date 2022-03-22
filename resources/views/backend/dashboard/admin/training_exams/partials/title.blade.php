@if (Route::is('training-exams.index'))
    Training Exams 
@elseif(Route::is('training-exams.create'))
    Create New Training Exam
@elseif(Route::is('training-exams.edit'))
    Edit Training Exam - {{ $training_exam->test_title }}
@elseif(Route::is('training-exams.show'))
    View Training Exam - {{ $training_exam->test_title }}
@endif
    | Admin Panel - 
    {{ config('app.name') }}