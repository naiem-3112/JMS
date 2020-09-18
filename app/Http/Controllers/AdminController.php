<?php

namespace App\Http\Controllers;

use App\Menuscript;
use App\Publisher;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard(){
        return view('layouts.back.back');
    }
   
    // user
    public function approvedUsers(){
        $approved_users = User::where('user_type_id', 2)->orWhere('status', 1)->where('id', '!=', Auth::user()->id)->paginate(10);
        return view('admin.approved-users', compact('approved_users'));
    }

    public function pendingUsers(){
        $pending_users = User::where('status', 0)->where('user_type_id', 1)->paginate(10);
        return view('admin.pending-users', compact('pending_users'));
    }

    public function mark_approveUsers($id){
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        return back();
    }

    public function mark_rejectUsers($id){
        $user = User::find($id);
        $user->status = 2;
        $user->save();
        return back();
    }

    public function user_detail($id){
        $user = User::find($id);
        return view('admin.user.detail', compact('user'));
    }

    public function delete($id){
        $user = User::find();
    }

    // user end


    // menuscrip
    public function menuscriptNew(){
        $menuscripts = Menuscript::where('status', 0)->paginate(10);
        return view('admin.menuscript.new', compact('menuscripts'));
    }

    public function mark_approveMenuscript($id){
        $menuscript = Menuscript::find($id);
        $menuscript->status = 1;
        $menuscript->save();
        return back();
    }

    public function menuscriptApproved(){
        $menuscripts = Menuscript::where('status', 1)->paginate(10);
        return view('admin.menuscript.approve', compact('menuscripts'));
    }

    public function mark_rejectMenuscript($id){
        $menuscript = Menuscript::find($id);
        $menuscript->status = 2;
        $menuscript->save();
        return back();
    }

    public function menuscriptRevision(){
        $menuscripts = Menuscript::where('status', 2)->paginate(10);
        return view('admin.menuscript.revision', compact('menuscripts'));
    }

    // File download
    
        public function download($file_name) {
            $file_path = public_path('menuscripts/'.$file_name);
            return response()->download($file_path);
    }
    


}
