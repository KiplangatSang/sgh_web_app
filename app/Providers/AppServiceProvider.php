<?php

namespace App\Providers;

use App\Http\Views\Composers\ArticleComposer;
use App\Http\Views\Composers\PostsComposer;
use App\Http\Views\Composers\UsersComposer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        View::composer(['admin.*',], UsersComposer::class);
        View::composer(['post.*',], PostsComposer::class);
    }
}
