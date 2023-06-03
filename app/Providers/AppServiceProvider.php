<?php

namespace App\Providers;

use App\Http\APIPosts\ESPNGateway;
use App\Http\APIPosts\FetchNewsContract;
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


        $this->app->singleton(FetchNewsContract::class, function ($app) {
            $gateway = "ESPNGateway";


            if (request()->has('gateway')) {
                $gateway =  request()->gateway;
            }

            switch ($gateway) {
                case "ESPN":
                    return new ESPNGateway(request()->params);
                    break;
                default:
                    return new ESPNGateway(request()->params);
            }
        });
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
