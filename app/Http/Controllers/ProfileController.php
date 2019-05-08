<?php

namespace App\Http\Controllers;


use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Image;
use App\User;
use App\Offer;
use App\UserEmail;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Favorite;

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

        $id = Auth::user()->id;
        $offers = $offers = Offer::whereHas('property', function($query) use ($id) 
        {
            $query->where('user_id','=', $id);

        })->limit(5)
          ->orderBy('id', 'desc')
          ->get();

        return view('profile.home', compact('offers'),array('user' => Auth::user()));
    }

    public function updateAccount(Request $request)
    {
        $id = Auth::user()->id;
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string', 'email|max:255|unique:users',
            'descrption'=> 'required|string|max:100',
            'nic' => 'required|string|regex:/^[0-9]{9}[Vv]$/',
            'address' => 'required|string',
            'city' => 'required|string',
            'birthday' => 'required|date_format:Y-m-d|before:today',
            'gender' => 'required',
            'phoneno' => 'required|numeric',
        ]);

        $user = User::find($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->description = request('descrption');
        $user->NIC = request('nic');
        $user->address = request('address');
        $user->city = request('city');
        $user->gender = request('gender');
        $user->birthday = request('birthday');
        $user->phoneNo = request('phoneno');
        $user->save();

        return back()->with('message', 'Your account has been successfully updated!');
    }

    public function changePassword(Request $request){

        $request->validate([

            'password' => 'required|string|min:8|confirmed',
            'current_password' => 'required',
        ]);

        if(!(Hash::check(request('current_password'),Auth::user()->password))){

            return back()->with("errormsg","Your current password does not matches with the password you provided. Please try again.");
            
        }

        if(strcmp(request('current_password'),request('password')) == 0){

            return back()->with("warningmsg","New Password cannot be same as your current password. Please choose a different password.");
            
        }

        $user = Auth::user();
        $user->password = Hash::make(request('password'));
        $user->save();

        return back()->with("success","Password changed successfully !");

    }

    public function allOffers(){

        $id = Auth::user()->id;
        $offers = Offer::whereHas('property', function($query) use ($id) 
        {
            $query->where('user_id','=', $id);

        })->paginate(15);

        return view('profile.home', compact('offers'),array('user' => Auth::user()));
    }

    public function myMessage()
    {
        $id = Auth::user()->id;
        $messages = UserEmail::where(function($query) use ($id) 
        {
            $query->where('receiver_id','=', $id);

        })->where(function ($query){

            $query->where('status', 'LIKE', 'unread');
    
        })->orderBy('id', 'desc')
          ->paginate(10);

        return view('profile.home', compact('messages'),array('user' => Auth::user()));
    }

    public function viewMessage(UserEmail $message)
    {
        $id = $message->id;
        $updateMessage = UserEmail::find($id);
        $updateMessage->status = 'read';
        $updateMessage->save();
        
        return view('profile.home',compact('message') ,array('user' => Auth::user()));

    }

    public function deleteMessage(UserEmail $message)
    {
        if ($message->receiver_id == auth()->id()) {

            DB::table('user_emails')->where('id', '=', $message->id)->delete();

            Alert::success('Your property has been edited successfully!', 'Successfully Deleted!')->autoclose(3000);
            return redirect('/profile/message');
        }
        else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile/message');
            
        }
    }

    public function viewAllMessage()
    {
        $id = Auth::user()->id;
        $messages = UserEmail::where(function($query) use ($id) 
        {
            $query->where('receiver_id','=', $id);

        })->orderBy('id', 'desc')
          ->paginate(10);

        return view('profile.home', compact('messages'),array('user' => Auth::user()));
    }

    public function favorites()
    {
        $userId = auth()->id();
        $favorites = Favorite::where(function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profile.home', compact('favorites'),array('user' => Auth::user()));
    }
    
}
