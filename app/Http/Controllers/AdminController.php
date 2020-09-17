<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminController extends Controller
{

    public function dashboard(){
        return view('layouts.back.back');
    }

    public function AllUsers(){
        $approved_users = User::where('status', 1)->where('user_type_id', '!=', 0)->paginate(10);
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

    public function delete($id){
        $user = User::find();
    }


    // menuscrip
    public function menuscriptNew(){
        $menuscripts = Publisher::where('status', 0)->paginate(10);
        return view('admin.menuscript.new', compact('menuscripts'));
    }

    public function mark_approveMenuscript($id){
        $menuscript = Publisher::find($id);
        $menuscript->status = 1;
        $menuscript->save();
        return back();
    }

    public function menuscriptApproved(){
        $menuscripts = Publisher::where('status', 1)->paginate(10);
        return view('admin.menuscript.approve', compact('menuscripts'));
    }

    public function mark_rejectMenuscript($id){
        $menuscript = Publisher::find($id);
        $menuscript->status = 2;
        $menuscript->save();
        return back();
    }

    public function menuscriptRevision(){
        $menuscripts = Publisher::where('status', 2)->paginate(10);
        return view('admin.menuscript.revision', compact('menuscripts'));
    }

    // File download
    
        public function download($file_name) {
            $file_path = public_path('menuscripts/'.$file_name);
            return response()->download($file_path);
    }
    


}
