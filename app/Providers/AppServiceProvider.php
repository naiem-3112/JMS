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

        $has_one_publisher = User::where('user_type_id', 2)->count();
        $new_user_admin = User::where('status', 0)->where('user_type_id', '!=', 3)->get();
        $new_reviewer = User::where('status', 0)->where('user_type_id', 3)->get();
        $new_menuscript = Menuscript::where('status', 0)->get();
        $assigned_menuscripts = Menuscript::where('status', 1)->get();
        $menuscript_revision = Menuscript::where('status', 1)->get();
        $marked_menuscript = Menuscript::where('status', 2)->get();

       
        // $pendingMenuscript = 

        // for using Auth
        view()->composer('*', function ($view) {
        $assign_menuscript_reviewer = ReviewerMenuscript::where('status', 0)->where('reviewer_id', Auth::id())->get();
        $checked_menuscript = Menuscript::where('author_id', Auth::id())->where('status', 3)->orWhere('status', 4)->get();
        $checked_published_menuscript = Menuscript::where('author_id', Auth::id())->where('status', 3)->get();
        $checked_rejected_menuscript = Menuscript::where('author_id', Auth::id())->where('status', 4)->get();
       
        $view->with('assign_menuscript_reviewer', $assign_menuscript_reviewer)
        ->with('checked_menuscript', $checked_menuscript)
        ->with('checked_published_menuscript', $checked_published_menuscript)
        ->with('checked_rejected_menuscript', $checked_rejected_menuscript );    
    });  

        View::share(['menuscript_revision' => $menuscript_revision, 'marked_menuscript' => $marked_menuscript, 
        'new_user_admin' => $new_user_admin, 'has_one_publisher' => $has_one_publisher, 'new_reviewer' => $new_reviewer, 'new_menuscript' => $new_menuscript,]);
    }
}
