<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    public function dashboard(){
        return view('layouts.back.back');
    }

    public function approvedUsers(){
        $approved_users = User::where('status', 1)->where('user_type_id', '!=', 0)->paginate(10);
        return view('admin.approved-users', compact('approved_users'));
    }

    public function pendingUsers(){
        $pending_users = User::where('status', 0)->paginate(10);
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
}
