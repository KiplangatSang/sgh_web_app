<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //

    protected $guarded =[];

    public function commentable()
    {
        return $this->morphTo();
        # code...
    }
}
