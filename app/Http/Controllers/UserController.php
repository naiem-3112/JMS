<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function upload_avatar(Request $request){
        if($request->hasFile('image')){
           $avatar_name = $request->image->getClientOriginalName();
           $request->image->storeAs('public',$avatar_name );
           User::find(1)->update(['avatar' => $avatar_name]);
        }
        return redirect()->back();
    }
}
