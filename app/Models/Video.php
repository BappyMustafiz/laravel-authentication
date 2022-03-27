<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'training_id',
        'sorting',
        'title',
        'short_description',
        'image',
        'video'
    ];

    public function training()
    {
        return $this->hasOne(Training::class, 'id', 'training_id');
    }
}
