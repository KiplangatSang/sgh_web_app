<?php

namespace App\Providers;

use App\Http\Views\Composers\ArticleComposer;
use App\Http\Views\Composers\BusinessComposer;
use App\Http\Views\Composers\NewsComposer;
use App\Http\Views\Composers\PoemComposer;
use App\Http\Views\Composers\PostsComposer;
use App\Http\Views\Composers\SportComposer;
use App\Http\Views\Composers\TechComposer;
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
        View::composer(['post.*',], ArticleComposer::class);
        // View::composer(['post.*', ], BusinessComposer::class);
        View::composer(['post.*',], PoemComposer::class);
        View::composer(['post.*',], SportComposer::class);
        View::composer(['post.*',], TechComposer::class);
        View::composer(['post.*',], PostsComposer::class);
        // View::composer(['post.*', ], NewsComposer::class);

    }
}
