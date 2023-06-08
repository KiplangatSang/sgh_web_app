<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Articles\Categories;
use App\Models\Posts\Posts;
use App\Models\Posts\PostsImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'month',
        'year', 'remember_token', 'api_token',
        'isAdmin',
        'role',
        'isSuspended',


    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'performed_at'
    ];

    public function posts()
    {
        return $this->morphMany(Posts::class, 'postable');
    }

    public function category()
    {
        return $this->morphMany(Categories::class, 'categoryable');
    }
    public function postImages()
    {
        return $this->morphMany(PostsImages::class, 'postImageable');
    }

    public function apis()
    {
        return $this->morphMany(ExternalPostsAPI::class, 'apiable');
    }

    public const admin = 0;
    public const author = 1;
    public const reader = 2;
}
