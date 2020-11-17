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
        $this->validate($r, [
            'menuscript_id' => 'required',
            'qus1' => 'required',
            'qus2' => 'required',
            'qus3' => 'required',
            'qus4' => 'required',
            'qus5' => 'required',
        ]);
        $rev_menus = ReviewerMenuscript::find($id);
        $rev_menus->comment = $r->comment;
        $rev_menus->qus1 = $r->qus1;
        $rev_menus->qus2 = $r->qus2;
        $rev_menus->qus3 = $r->qus3;
        $rev_menus->qus4 = $r->qus4;
        $rev_menus->qus5 = $r->qus5;
        $rev_menus->status = 1;
        $rev_menus->save();
        
        $total_reviewer = ReviewerMenuscript::where('menuscript_id', $r->menuscript_id)->count();
        $total_checked = ReviewerMenuscript::where('menuscript_id', $r->menuscript_id)->where('status', 1)->count();
        if($total_reviewer == $total_checked){
            $menuscript = Menuscript::where('id', $r->menuscript_id)->first();
            $menuscript->status = 2;
            $menuscript->save();    
        }
        
        Alert::toast('Menuscript Feedback Stored successfully', 'success');
        return redirect()->route('reviewer.checked.menuscript');

    }
}
