<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewerMenuscript;
use App\Menuscript;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewerController extends Controller
{
    public function assigned(){
        $auth_id = Auth::id();
        $rev_menus = ReviewerMenuscript::where('reviewer_id', $auth_id)->where('status', 0)->paginate(10);
        return view('reviewer.assigned', compact('rev_menus'));
    }

    public function checked(){
        $auth_id = Auth::id();
        $rev_menus = ReviewerMenuscript::where('reviewer_id', $auth_id)->where('status', 1)->paginate(10);
        return view('reviewer.checked', compact('rev_menus'));
    }

    public function feedbackForm($id){
        $rev_menus = ReviewerMenuscript::find($id);
        return view('reviewer.feedback-form', compact('rev_menus'));
    }

    public function feedbackStore(Request $r, $id){
        $rev_menus = ReviewerMenuscript::find($id);
        $rev_menus->mark = $r->mark;
        $rev_menus->comment = $r->comment;
        $rev_menus->status = 1;
        $rev_menus->save();
        
        $menuscript = Menuscript::where('id', $r->menuscript_id)->first();
        $menuscript->status = 2;
        $menuscript->save();

        Alert::toast('Menuscript Feedback Stored successfully', 'success');
        return redirect()->route('reviewer.checked.menuscript');

    }
}
