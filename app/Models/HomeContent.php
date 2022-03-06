<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $table = 'home_contents';
    protected $fillable = [
        'section_title',
        'main_title',
        'sub_title',
        'section_image',
        'section_video',
        'home_video_url',
    ];
}
