<?php

namespace App\Models\Posts;

use App\Models\Articles\Categories;
use App\Models\Likes;
use App\Models\Posts\Comments ;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $guarded = [];

    public function postable()
    {
        return $this->morphTo();
    }

    public function postImages()
    {
        return $this->morphMany(PostsImages::class, 'postImageable');
    }

    public function comments()
    {
        return $this->morphMany(Comments::class, 'commentable');
    }

    public function likes()
    {
        return $this->morphMany(Likes::class, 'likeable');
    }
    public function category()
    {
        # code...
        return $this->belongsTo(Categories::class,'post_category');
    }

}
