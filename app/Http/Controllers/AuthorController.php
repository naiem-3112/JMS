<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menuscript;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    
    public function pendingMenuscript(){
        $menuscripts = Menuscript::where('author_id', Auth::id())->where('status', 0)->orWhere('status', 1)->orderBy('created_at', 'DESC')->paginate(10);
        return view('author.menuscript.pending', compact('menuscripts'));
    }

    public function checkedMenuscript(){
        $menuscripts = Menuscript::where('author_id', Auth::id())->where('status', 3)->orWhere('status', 4)->get();
        return view('author.menuscript.checked', compact('menuscripts'));

    }

    // public function revisionMenuscript(){
    //     $menuscripts = Menuscript::where('author_id', Auth::id())->where('status', 1)->paginate(10);
    //     return view('author.menuscript.revision', compact('menuscripts'));
    // }

}
