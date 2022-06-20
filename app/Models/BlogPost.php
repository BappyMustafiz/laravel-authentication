<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogPost extends Model
{
    use SoftDeletes;

    protected $table = 'blog_posts';

    protected $fillable = [
        'status','title','image', 'image_alt', 'description', 'tags','slug', 'category_id', 'view', 'meta_title','meta_description'
    ];

    public function comments() {
        return $this->hasMany('App\Models\BlogComment','post_id','id')->where('status',1);
    }

    public function categories() {
        return $this->belongsTo('App\Models\BlogCategory', 'category_id', 'id');
    }
}
