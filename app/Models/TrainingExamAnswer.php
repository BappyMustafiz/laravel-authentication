<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingExamAnswer extends Model
{
    protected $table = 'training_exam_answers';
    protected $guarded = [];

    public function trainingExam()
    {
        return $this->hasOne(TrainingExam::class, 'id', 'training_exam_id');
    }
}
