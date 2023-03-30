<?php

namespace App\Models\Articles;

use App\Models\Posts\Posts;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasRelationships, HasFactory;
    //
    protected $guarded = [];

    public function categoryable()
    {
        # code...
        return $this->morphTo();
    }

    public function posts()
    {
        # code...
        return $this->hasMany(Posts::class,'post_category');
    }
}
