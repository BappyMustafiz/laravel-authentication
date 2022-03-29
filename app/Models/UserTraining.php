<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTraining extends Model
{
    protected $fillable = [
        'user_id',
        'training_id',
        'training_category_id'
    ];

    public function training()
    {
        return $this->hasOne(Training::class, 'id', 'training_id');
    }

    public function trainingExam()
    {
        return $this->hasMany(TrainingExam::class, 'training_id')->with('questions');
    }
}
