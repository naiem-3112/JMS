<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\Category;
use RealRashid\SweetAlert\Facades\Alert;

class TeamController extends Controller
{
    public function makeTeam(){
        $reviewers = User::where('user_type_id', 3)->where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('admin.reviewer.make-team', compact('reviewers', 'categories'));
    }

    public function storeTeam(Request $r){
        $this->validate($r, [
            'team_name' => 'required|unique:teams,team_name',
            'category_id' => 'required',
            'reviewer_id' => 'required',
        ]);

        $team = new Team();
        $team->team_name = $r->team_name;
        $team->category_id = $r->category_id;
        $team->reviewer_id = $r->reviewer_id;
        $team->save();
        Alert::toast('Team created successfully', 'success');
        return back();
    }
}
