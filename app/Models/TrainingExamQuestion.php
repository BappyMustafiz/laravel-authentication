<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingExamQuestion extends Model
{
    use SoftDelets;
    protected $table = 'training_exam_questions';
    protected $guarded = [];
}
