<?php

namespace App\Providers;

use App\Menuscript;
use App\User;
use App\ReviewerMenuscript;
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
        $assigned_menuscripts = Menuscript::where('status', 1)->get();
        $menuscript_revision = Menuscript::where('status', 1)->get();
        $checked_menuscript = Menuscript::where('status', 2)->get();

        // for using Auth
        view()->composer('*', function ($view) {
        $assign_menuscript_reviewer = ReviewerMenuscript::where('status', 0)->where('reviewer_id', Auth::id())->get();
        $view->with('assign_menuscript_reviewer', $assign_menuscript_reviewer );    
    });  

        View::share(['menuscript_revision' => $menuscript_revision, 'checked_menuscript' => $checked_menuscript, 'new_user_admin' => $new_user_admin, 'new_reviewer' => $new_reviewer, 'new_menuscript' => $new_menuscript]);
    }
}
