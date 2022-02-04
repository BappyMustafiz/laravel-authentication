<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerQuery extends Model
{
    protected $table = 'customer_queries';
    protected $fillable = ['user_id', 'title', 'content'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }
}
