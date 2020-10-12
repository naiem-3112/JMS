<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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
}
