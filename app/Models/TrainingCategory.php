<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingCategory extends Model
{
    use SoftDeletes, Sluggable;

    protected $fillable = ['name', 'status', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function trainings()
    {
        return $this->hasMany(Training::class, 'training_category_id', 'id');
    }
}
