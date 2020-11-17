<?php

namespace App\Http\Controllers;

use App\Menuscript;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
// use Intervention\Image\ImageManagerStatic as Image;
use Image;
use File;

class AdminController extends Controller
{

    public function dashboard(){
        return view('layouts.back.back');
    }
   
    // user
    public function approvedUsers(){
        $approved_users = User::where('user_type_id', '!=', 0)->where('status', 1)
        ->where('id', '!=', Auth::user()->id)->paginate(10);
        return view('admin.approved-users', compact('approved_users'));
    }

    public function pendingUsers(){
        if(Auth::user()->user_type_id == 0){
        $pending_users = User::where('status', 0)->where('user_type_id', '!=', 3)->paginate(10);
        return view('admin.pending-users', compact('pending_users'));
    }
    elseif(Auth::user()->user_type_id == 2 && Auth::user()->status == 1){
        $pending_users = User::where('status', 0)->where('user_type_id', 1)->paginate(10);
        return view('admin.pending-users', compact('pending_users'));
    }

    }

    public function mark_approveUsers($id){
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        return back();
    }

    public function mark_rejectUsers($id){
        $user = User::find($id);
        $user->status = 2;
        $user->save();
        return back();
    }

    public function user_detail($id){
        $user = User::find($id);
        return view('admin.user.detail', compact('user'));
    }

    public function delete($id){
        $user = User::find();
    }
    // user end

  
    // File download
        public function download($file_name) {
            $file_path = public_path('menuscripts/'.$file_name);
            return response()->download($file_path);
    }

    public function profile($id){
        $user = User::find($id);
        return view('profile', compact('user'));
    }

    public function profileStore(Request $r, $id){
        $this->validate($r, [
            'name' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'city' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'about' => 'required',
            'designation' => 'required',
            'image' => 'required',
        ]);

        $user = User::find($id);
        $user->firstName = $r->firstName;
        $user->lastName = $r->lastName;
        $user->name = $r->name;
        $user->email = $r->email;
        $user->country = $r->country;
        $user->city = $r->city;
        $user->mobile = $r->mobile;
        $user->address = $r->address;
        $user->about = $r->about;
        $user->designation = $r->designation;

        if ($r->hasFile('image')) {
            $originalName = $r->image->getClientOriginalName();
            $uniqueImageName = $r->name.$originalName;
            $image = Image::make($r->image);
            $image->resize(280, 280);
            $image->save(public_path().'/profile/'.$uniqueImageName);
            $user->image = $uniqueImageName;
        }
        $user->status = 0;
        $user->save();
        Alert::toast('Profile updated successfully', 'success');
        return back();
    }

    public function generalStore(Request $r){
        
        $this->validate($r, [
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);
        
        $user = User::where('email', $r->email)->first();
    
        if(Hash::check($r->oldpassword, $user->password)){
            $user->password = bcrypt($r->newpassword);
            $user->save();
        Alert::toast('Password Changed successfully', 'success');
            return back();
        }
        else{
            Alert::toast('Password Or email do not match', 'warning');
            return back();
        }

    }
    


}
