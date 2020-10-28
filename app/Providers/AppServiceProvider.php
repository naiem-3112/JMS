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
        $assigned_menuscripts = Menuscript::where('status', 2)->get();
        foreach($assigned_menuscripts as $menuscript){
        
        $total_reviewer = $menuscript->rev_menus->count();
        $total_checked = $menuscript->rev_menus->where('status', '!=', 0)->count();
        
        if($total_reviewer == $total_checked){
            $marked_menuscript = $menuscript;
        }else{
            $marked_menuscript = 0;
        }
        dd($marked_menuscript->count());
        // ---------problem why give value 2 it should be 1
        
    }
        // for using Auth
        view()->composer('*', function ($view) {
        $assign_menuscript_reviewer = ReviewerMenuscript::where('status', 0)->where('reviewer_id', Auth::id())->get();
        $view->with('assign_menuscript_reviewer', $assign_menuscript_reviewer );    
    });  

        View::share(['new_user_admin' => $new_user_admin, 'new_reviewer' => $new_reviewer, 'new_menuscript' => $new_menuscript, 'marked_menuscript' => $marked_menuscript]);
    }
}
