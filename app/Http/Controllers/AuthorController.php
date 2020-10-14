<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menuscript;
use Auth;

class AuthorController extends Controller
{
    
    public function pendingMenuscript(){
        $menuscripts = Menuscript::where('author_id', Auth::id())->where('status', 0)->paginate(10);
        return view('author.menuscript.pending', compact('menuscripts'));
    }

    public function revisionMenuscript(){
        $menuscripts = Menuscript::where('author_id', Auth::id())->where('status', 1)->paginate(10);
        return view('author.menuscript.revision', compact('menuscripts'));
    }

}
