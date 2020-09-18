<?php

namespace App\Http\Controllers;

use App\Menuscript;
use Illuminate\Http\Request;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use File;
use Illuminate\Support\Facades\Auth;

class MenuscriptController extends Controller
{
    public function create(){
        return view('publisher.create');
    }

    public function store(Request $r){
        $this->validate($r, [
            'title' => 'required',
            'name' => 'required',
            'email' => 'required',
            'paper_file' => 'required|mimes:pdf'
        ]);

        $publisher = new Menuscript();
        $publisher->title = $r->title;
        $publisher->name = $r->name;
        $publisher->email = $r->email;
        $publisher->summery = $r->summery;
        $publisher->country_id = $r->country_id;
        $publisher->status = 0;
        $publisher->publisher_id  = Auth::id();
        
        if ($r->hasFile('paper_file')) {
            $originalName = $r->paper_file->getClientOriginalName();
            $uniquePaperName = $r->email.time().$originalName;
            $r->paper_file->move(public_path('/menuscripts'), $uniquePaperName);
            $publisher->paper = $uniquePaperName;
        }

        $publisher->save();
        Alert::toast('Paper submitted successfully', 'success');
        return back();
    }

    public function menuscriptPending(){
        $menuscripts = Menuscript::where('status', 0)->paginate(10);
        return view('publisher.pending', compact('menuscripts'));
    }

    public function menuscriptRevision(){
        $menuscripts = Menuscript::where('status', 1)->where('publisher_id', Auth::id())->paginate(10);
        return view('publisher.revision', compact('menuscripts'));
    }

}
