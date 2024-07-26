<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\SocialMediaController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $socialMediaController = new SocialMediaController();
        // $socialmedialinks = $socialMediaController::getlinks();

        // View::share('socialmedialinks',$socialmedialinks);
    }
}
