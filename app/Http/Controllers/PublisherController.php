<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function create(){
        return view('publisher.create');
    }
}
