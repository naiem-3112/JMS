<?php

namespace App\Providers;

use App\Menuscript;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        $menuscript_revision = Menuscript::where('status', 1)->get();
        View::share(['menuscript_revision' => $menuscript_revision]);
    }
}
