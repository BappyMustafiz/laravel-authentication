<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingExam extends Model
{
    use SoftDeletes;
    protected $table = 'training_exams';
    protected $guarded = [];

    public function training()
    {
        return $this->hasOne(Training::class, 'id', 'training_id');
    }

    public function questions()
    {
        return $this->hasMany(TrainingExamQuestion::class);
    }

}
