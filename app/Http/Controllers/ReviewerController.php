<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewerMenuscript;
use Auth;

class ReviewerController extends Controller
{
    public function assigned(){
        $auth_id = Auth::id();
        $rev_menus = ReviewerMenuscript::where('reviewer_id', $auth_id)->where('status', 0)->paginate(10);
        return view('reviewer.assigned', compact('rev_menus'));
    }

    public function checked(){
        $auth_id = Auth::id();
        $rev_menus = ReviewerMenuscript::where('reviewer_id', $auth_id)->where('status', 0)->paginate(10);
        return view('reviewer.checked', compact('rev_menus'));
    }
}
