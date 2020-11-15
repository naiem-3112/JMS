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

    public function categoryMenuscript($id){
        $today = date('Y-m-d H:i:s');

        $menuscript = Menuscript::find($id);
        $category_id = $menuscript->category_id;
        $menuscripts = Menuscript::where('category_id', $category_id)->where('status', 4)->get();

        return view('front.categoryMenuscript', compact('menuscript', 'today', 'menuscripts'));
    }

}
