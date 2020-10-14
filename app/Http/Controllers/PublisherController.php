<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Menuscript;
use App\ReviewerMenuscript;
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
            $rev_menus->mark = 0;
            $rev_menus->comment = 'null';
            $rev_menus->save();
        }

        $menuscript = Menuscript::find($id);
        $menuscript->status = 1;
        $menuscript->save();
        Alert::toast('Menuscript assigned successfully', 'success');
        return back();

    }

    public function revisionMenuscript(){
        $menuscripts = Menuscript::where('status', 1)->paginate(10);
        return view('publisher.menuscript.revision', compact('menuscripts'));
    }

    public function mark_approveMenuscript($id){
        $menuscript = Menuscript::find($id);
        $menuscript->status = 1;
        $menuscript->save();
        return back();
    }

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

   
    // Menuscrip for Publisher
}
