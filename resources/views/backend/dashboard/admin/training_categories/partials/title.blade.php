@if (Route::is('training-categories.index'))
    Training Categories 
@elseif(Route::is('training-categories.create'))
    Create New Training Category
@elseif(Route::is('training-categories.edit'))
    Edit Training Category - {{ $training_category->name }}
@elseif(Route::is('training-categories.show'))
    View Training Category - {{ $training_category->name }}
@endif
    | Admin Panel - 
    {{ config('app.name') }}