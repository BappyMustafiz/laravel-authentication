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
        'avatar_one_title',
        'avatar_one_image',
        'avatar_two_title',
        'avatar_two_image',
        'avatar_three_title',
        'avatar_three_image',
        'decoration_one_image',
        'decoration_two_image',
        'decoration_three_image',
    ];
}
