<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use SoftDeletes, Sluggable;

    protected $fillable = [
        'training_category_id',
        'title',
        'description',
        'tags',
        'slug',
        'price',
        'discount_price',
        'image'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function training_category()
    {
        return $this->hasOne(TrainingCategory::class, 'id', 'training_category_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'training_id', 'id');
    }
}
