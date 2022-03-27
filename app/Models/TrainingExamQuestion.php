<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingExamQuestion extends Model
{
    use SoftDeletes;

    protected $table = 'training_exam_questions';
    protected $guarded = [];

    public function exam()
    {
        return $this->hasOne(TrainingExam::class, 'id', 'training_exam_id');
    }
}
