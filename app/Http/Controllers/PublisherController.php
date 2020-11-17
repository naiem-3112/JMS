<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Menuscript;
use App\ReviewerMenuscript;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class PublisherController extends Controller
{
    public function pendingReviewer(){
        if(Auth::user()->user_type_id == 2 && Auth::user()->status == 1){
            $pending_users = User::where('status', 0)->where('user_type_id', 3)->paginate(10);
            return view('publisher.pending-users', compact('pending_users'));
        }
    } 

    public function approvedReviewer(){
        if(Auth::user()->user_type_id == 2 && Auth::user()->status == 1){
            $approved_users = User::where('status', 1)->where('user_type_id', 3)->paginate(10);
            return view('publisher.approved-users', compact('approved_users'));
        }
    } 

    
    // Menuscrip for Publisher
    
    public function pendingMenuscript(){
        $menuscripts = Menuscript::where('status', 0)->paginate(10);
        return view('publisher.menuscript.pending', compact('menuscripts'));
    }

    public function menuscriptAssignForm($id){
        $menuscript = Menuscript::find($id);
        $reviewers = User::where('user_type_id', 3)->where('status', 1)->get();
        return view('publisher.menuscript.assign-form', compact('menuscript', 'reviewers'));
    }

    public function menuscriptAssign(Request $r, $id){
        $this->validate($r, [
            'reviewer_id' => 'required'
        ]); 
        foreach($r->reviewer_id as $reviewer){
            $rev_menus = new ReviewerMenuscript();
            $rev_menus->reviewer_id = $reviewer;
            $rev_menus->menuscript_id = $id;
            $rev_menus->status = 0;
            $rev_menus->qus1 = 0;
            $rev_menus->qus2 = 0;
            $rev_menus->qus3 = 0;
            $rev_menus->qus4 = 0;
            $rev_menus->qus5 = 0;
            $rev_menus->mark = 0;
            $rev_menus->comment = 'null';
            $rev_menus->save();
        }

        $menuscript = Menuscript::find($id);
        $menuscript->status = 1;
        $menuscript->save();
        Alert::toast('Menuscript assigned successfully', 'success');
        return redirect()->route('publisher.revision.menuscript');

    }

    public function revisionMenuscript(){
        $menuscripts = Menuscript::where('status', 1)->paginate(10);
        return view('publisher.menuscript.revision', compact('menuscripts'));
    }

    public function markedMenuscript(){
        $menuscripts = Menuscript::where('status', 2)->get();
        return view('publisher.menuscript.marked', compact('menuscripts'));
    }

    
    public function markDetailMenuscript($id){
        $rev_menus = ReviewerMenuscript::where('menuscript_id', $id)->get();
        $menuscript = Menuscript::find($id);
        return view('publisher.menuscript.markedDetail', compact('menuscript'));
    }

    // public function mark_approveMenuscript($id){
    //     $menuscript = Menuscript::find($id);
    //     $menuscript->status = 1;
    //     $menuscript->save();
    //     return back();
    // }

    public function approvedMenuscript(){
        $menuscripts = Menuscript::where('status', 1)->paginate(10);
        return view('admin.menuscript.approve', compact('menuscripts'));
    }

    public function mark_rejectMenuscript($id){
        $menuscript = Menuscript::find($id);
        $menuscript->status = 2;
        $menuscript->save();
        return back();
    }

    public function publishMenuscript($id){
        $menuscript = Menuscript::find($id);
        $menuscript->status = 3;
        $menuscript->updated_at = date('Y-m-d H:i:s');
        $menuscript->save();
        Alert::toast('Menuscript published successfully', 'success');
        return back();
    }
   
    public function rejectMenuscript($id){
        $menuscript = Menuscript::find($id);
        $menuscript->status = 4;
        $menuscript->updated_at = date('Y-m-d H:i:s');
        $menuscript->save();
        Alert::toast('Menuscript rejection successfully', 'success');
        return back();
    }

    public function checkedMenuscript(){
        $menuscripts = Menuscript::where('status', 3)->orWhere('status', 4)->get();
        return view('publisher.menuscript.checked', compact('menuscripts'));

    }

    // Menuscrip for Publisher
}
