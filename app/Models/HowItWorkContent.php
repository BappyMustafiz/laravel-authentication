<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowItWorkContent extends Model
{
    protected $table = 'how_it_work_contents';
    protected $fillable = [
        'section_title',
        'step_title',
        'main_title',
        'content',
        'section_image',
        'section_video',
        'home_video_url',
    ];
}
