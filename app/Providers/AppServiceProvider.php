<?php

namespace App\Providers;

use App\Menuscript;
use App\User;
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
        $new_publisher = User::where('status', 0)->where('user_type_id', 1)->get();

        $menuscript_revision = Menuscript::where('status', 1)->get();
        View::share(['menuscript_revision' => $menuscript_revision, 'new_publisher' => $new_publisher]);
    }
}
