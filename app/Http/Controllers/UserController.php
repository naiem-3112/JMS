<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        DB::update('update users set name = ? where id = 2', ['hossain']);
       $users = DB::select('select * from users');
        return $users;
    }


}
