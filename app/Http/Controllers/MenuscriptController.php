<?php

namespace App\Http\Controllers;

use File;
use Image;
use Session;
use App\User;
use App\Category;
use App\Menuscript;
use App\AuthorMenuscript;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
            'category_id' => 'required',
            'paper_file' => 'required|mimes:pdf,docx'
        ]);

        $menuscript= new Menuscript();
        $menuscript->title = $r->title;
        $menuscript->summery = $r->summery;
        $menuscript->category_id = $r->category_id;
        $menuscript->status = 0;
        $menuscript->remark = 0;
        $menuscript->author_id  = Auth::id();
        $menuscript->name = Auth::user()->name;
        $menuscript->email = Auth::user()->email;
       
        
        if ($r->hasFile('paper_file')) {
            $originalName = $r->paper_file->getClientOriginalName();
            $uniquePaperName = time().$originalName;
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
            
            'category_id' => 'required',
            'paper_file' => 'required|mimes:pdf'
        ]);
        $menuscript= Menuscript::find($r->menuscript_id);
        $menuscript->title = $r->title;
        $menuscript->name = Auth::user()->name;
        $menuscript->email = Auth::user()->email;
        $menuscript->summery = $r->summery;
       
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
