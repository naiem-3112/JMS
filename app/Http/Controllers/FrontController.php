<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menuscript;

class FrontController extends Controller
{
    public function home(){
        $menuscripts = Menuscript::where('status', 1)->get();
        return view('front.home', compact('menuscripts'));
    }

}
