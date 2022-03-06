@if (Route::is('trainings.index'))
    Trainings 
@elseif(Route::is('trainings.create'))
    Create New Training
@elseif(Route::is('trainings.edit'))
    Edit Training - {{ $training->title }}
@elseif(Route::is('trainings.show'))
    View Training - {{ $training->title }}
@endif
    | Admin Panel - 
    {{ config('app.name') }}