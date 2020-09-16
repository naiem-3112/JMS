<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use File;

class PublisherController extends Controller
{
    public function create(){
        return view('publisher.create');
    }

    public function store(Request $r){
        $this->validate($r, [
            'title' => 'required',
            'name' => 'required',
            'email' => 'required',
            'paper_file' => 'required'
        ]);

        $publisher = new Publisher();
        $publisher->title = $r->title;
        $publisher->name = $r->name;
        $publisher->email = $r->email;
        $publisher->summery = $r->summery;
        $publisher->country_id = $r->country_id;
        $publisher->status = 0;
        
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
}
