<?php

namespace App\Http\Controllers;


use App\Profile;
use Illuminate\Http\Request;
use Auth;
use Image;


class ProfileController extends Controller
{
    public function updateAvatar(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(\public_path('/uploads/avatars/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('profile.home', array('user'=> Auth::user()));
    }

    public function loadUserDashboard(){

        return view('profile.home', array('user' => Auth::user()));
    }

    public function editAccount()
    {
        return view('profile.home', array('user' => Auth::user()));
    }
    
}
