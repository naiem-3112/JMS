<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menuscript;

class FrontController extends Controller
{
    public function home(){
        $today = date('Y-m-d H:i:s');
        $menuscripts = Menuscript::where('status', 4)->get();
        return view('front.dashboard', compact('menuscripts', 'today'));
    }

}
