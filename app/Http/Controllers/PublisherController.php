<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'summery' => 'required',
            'country' => 'required',
            'paper' => 'required'
        ]);

        $publisher = new Publisher();
        $publisher->title = $r->title;
        $publisher->name = $r->name;
        $publisher->email = $r->email;
        $publisher->summery = $r->summery;
        $publisher->country = $r->country;
        $publisher->save();
        
        if($publisher->paper){
            
        }


        return back();
    }
}
