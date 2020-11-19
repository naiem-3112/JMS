<?php

namespace App\Http\Controllers;

use App\Category;
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
        $categories = Category::where('status', 1)->get();
        return view('menuscript.create', compact('categories'));
    }

    public function resubmit($id){
        $menuscript = Menuscript::find($id);
        $categories = Category::where('status', 1)->get();
        return view('author.menuscript.resubmit', compact('menuscript', 'categories'));
    }

    public function store(Request $r){
        $this->validate($r, [
            'title' => 'required',
            'name' => 'required',
            'email' => 'required',
            'category_id' => 'required',
            'paper_file' => 'required|mimes:pdf,docx'
        ]);

        $menuscript= new Menuscript();
        $menuscript->title = $r->title;
        $menuscript->name = $r->name;
        $menuscript->email = $r->email;
        $menuscript->summery = $r->summery;
        $menuscript->country_id = $r->country_id;
        $menuscript->category_id = $r->category_id;
        $menuscript->status = 0;
        $menuscript->remark = 0;
        $menuscript->author_id  = Auth::id();
        
        if ($r->hasFile('paper_file')) {
            $originalName = $r->paper_file->getClientOriginalName();
            $uniquePaperName = $r->name.time().$originalName;
            $r->paper_file->move(public_path('/menuscripts'), $uniquePaperName);
            $menuscript->paper = $uniquePaperName;
        }

        $menuscript->save();
        Alert::toast('Paper submitted successfully', 'success');
        return redirect()->route('author.pending.menuscript');
    }

    public function resubmitStore(Request $r){
        $this->validate($r, [
            'title' => 'required',
            'name' => 'required',
            'email' => 'required',
            'category_id' => 'required',
            'paper_file' => 'required|mimes:pdf'
        ]);
        $menuscript= Menuscript::find($r->menuscript_id);
        $menuscript->title = $r->title;
        $menuscript->name = $r->name;
        $menuscript->email = $r->email;
        $menuscript->summery = $r->summery;
        $menuscript->country_id = $r->country_id;
        $menuscript->category_id = $r->category_id;
        $menuscript->status = 0;
        $menuscript->remark = 1;
        $menuscript->author_id  = Auth::id();
        
        if ($r->hasFile('paper_file')) {
            $originalName = $r->paper_file->getClientOriginalName();
            $uniquePaperName = $r->name.time().$originalName;
            $r->paper_file->move(public_path('/menuscripts'), $uniquePaperName);
            $menuscript->paper = $uniquePaperName;
        }

        $menuscript->save();
        Alert::toast('Paper submitted successfully', 'success');
        return redirect()->route('author.pending.menuscript');
    }

    public function menuscriptPending(){
        $menuscripts = Menuscript::where('status', 0)->paginate(10);
        return view('menuscript.pending', compact('menuscripts'));
    }
}
