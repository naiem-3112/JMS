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
        $new_user_admin = User::where('status', 0)->where('user_type_id', '!=', 3)->get();
        $new_reviewer = User::where('status', 0)->where('user_type_id', 3)->get();
        $new_menuscript = Menuscript::where('status', 0)->get();


    //     // publisher notification
    //     view()->composer('*', function ($view) {
    //     $revision_menuscript = Menuscript::where('status', 1)->where('author_id', Auth::id())->get();
    //     $view->with('revision_menuscript', $revision_menuscript );    
    // });  

        View::share(['new_user_admin' => $new_user_admin, 'new_reviewer' => $new_reviewer, 'new_menuscript' => $new_menuscript]);
    }
}
