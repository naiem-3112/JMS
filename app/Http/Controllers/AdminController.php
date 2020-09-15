<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function approvedUsers(){
        
        return view('admin.approved-users');
    }

    public function pendingUsers(){
        $pending_users = User::where('status', 0)->paginate(10);
        return view('admin.pending-users', compact('pending_users'));
    }
}
