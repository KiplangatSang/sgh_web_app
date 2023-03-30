<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class PostsImages extends Model
{
    //
    protected $guarded = [];

    public function postImageable()
    {
        return $this->morphTo();
    }
}
