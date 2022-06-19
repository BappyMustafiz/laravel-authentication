<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogComment extends Model
{
    use SoftDeletes;

    protected $table = 'blog_comments';

    protected $fillable = [ 
        'post_id', 'status', 'name','email', 'comment', 'parent_comment', 'replay_comment_id', 'comment_level'
    ];
}
