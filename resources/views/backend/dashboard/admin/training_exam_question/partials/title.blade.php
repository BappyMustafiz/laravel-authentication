@if (Route::is('training-exam-question.index'))
    Training Exam Question
@elseif(Route::is('training-exam-question.create'))
    Create New Training Exam Question
@elseif(Route::is('training-exam-question.edit'))
    Edit Training Exam Question - {{ $trainingExamQuestion->exam_title }}
@elseif(Route::is('training-exam-question.show'))
    View Training Exam Question - {{ $trainingExamQuestion->exam_title }}
@endif
    | Admin Panel - 
    {{ config('app.name') }}