<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;

class FrontController extends Controller
{
    public function home(){
        $menuscripts = Publisher::where('status', 1)->get();
        return view('front.home', compact('menuscripts'));
    }

}
