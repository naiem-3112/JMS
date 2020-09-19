<?php

namespace App\Http\Controllers;

use App\Menuscript;
use App\User;
use Illuminate\Http\Request;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use File;
use Illuminate\Support\Facades\Auth;

class MenuscriptController extends Controller
{
    public function create(){
        return view('menuscript.create');
    }

    public function store(Request $r){
        $this->validate($r, [
            'title' => 'required',
            'name' => 'required',
            'email' => 'required',
            'paper_file' => 'required|mimes:pdf'
        ]);

        $menuscript= new Menuscript();
        $menuscript->title = $r->title;
        $menuscript->name = $r->name;
        $menuscript->email = $r->email;
        $menuscript->summery = $r->summery;
        $menuscript->country_id = $r->country_id;
        $menuscript->status = 0;
        $menuscript->author_id  = Auth::id();
        
        if ($r->hasFile('paper_file')) {
            $originalName = $r->paper_file->getClientOriginalName();
            $uniquePaperName = $r->name.time().$originalName;
            $r->paper_file->move(public_path('/menuscripts'), $uniquePaperName);
            $menuscript->paper = $uniquePaperName;
        }

        $menuscript->save();
        Alert::toast('Paper submitted successfully', 'success');
        return back();
    }

    public function menuscriptPending(){
        $menuscripts = Menuscript::where('status', 0)->paginate(10);
        return view('menuscript.pending', compact('menuscripts'));
    }

    public function menuscriptRevision(){
        $menuscripts = Menuscript::where('status', 1)->where('author_id', Auth::id())->paginate(10);
        return view('menuscript.revision', compact('menuscripts'));
    }

    public function assignForm($id){
        $menuscript = Menuscript::find($id);
        $reviewers = User::where('user_type_id', 3)->where('status', 1)->get();
        return view('menuscript.assign-form', compact('menuscript', 'reviewers'));
    }

}
