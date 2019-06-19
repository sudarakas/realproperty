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
use App\Property;

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

        //return view('profile.dashboard', array('user'=> Auth::user()));
        return back();
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
        if(strcmp($user->email,request('email')) != 0 ){
            $user->email_verified_at = NULL;
        }
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

    public function myOffers(){

        $id = Auth::user()->id;
        $offers = Offer::whereHas('property', function($query) use ($id) 
        {
            $query->where('offeredUser','=', $id);

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

            Alert::success('Your message has been deleted successfully!', 'Successfully Deleted!')->autoclose(3000);
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

    public function viewFavorites()
    {
        $userId = auth()->id();
        $favorites = Favorite::where(function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profile.home', compact('favorites'),array('user' => Auth::user()));
    }
    
    public function deleteFavorites(Favorite $favorite)
    {
        if ($favorite->user_id == auth()->id()) {

            DB::table('favorites')->where('id', '=', $favorite->id)->delete();

            Alert::success('Your favorite has been deleted successfully!', 'Successfully Deleted!')->autoclose(3000);
            return redirect('/profile/myfavorite');
        }
        else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile/myfavorite');
            
        }
    }

    public function showMarkSold()
    {
        $userId = auth()->id();
        $properties = Property::where(function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profile.home', compact('properties'),array('user' => Auth::user()));
    }

    public function markSold(Property $property)
    {
        if ($property->user_id == auth()->id()) {

            $property = Property::find($property->id);
            $property->availability = 'NO';
            $property->save();

            Alert::success('Your property has been marked as sold!', 'Mark Sold!')->autoclose(3000);
            return redirect('/profile/sold');
        }
        else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile/sold');
            
        }
    }

    public function markUnsold(Property $property)
    {
        if ($property->user_id == auth()->id()) {

            $property = Property::find($property->id);
            $property->availability = 'YES';
            $property->save();

            Alert::success('Your property has been marked as unsold!', 'Mark Unsold!')->autoclose(3000);
            return redirect('/profile/sold');
        }
        else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile/sold');
            
        }
    }

    public function contactOffers(Offer $offer)
    {
        
        $user = User::find($offer->offeredUser);
        return view('profile.home', compact('user','offer'),array('user' => Auth::user()));

    }

    public function contactOffersOwner(Offer $offer)
    {
        
        $user = User::find($offer->property->user->id);
        return view('profile.home', compact('user','offer'),array('user' => Auth::user()));

    }

    public function deleteUserAccount(User $user){

        if ($user->id == auth()->id()) {

            //delete all properties
            $properties = $user->properties;

            foreach($properties as $property){

                $propertyType = checkPropertyTypeById($property->id);

                if(strcmp($propertyType,'house')){

                    DB::table('houses')->where('property_id', '=', $property->id)->delete();

                }elseif(strcmp($propertyType,'land')){
                    
                    DB::table('lands')->where('property_id', '=', $property->id)->delete();

                }elseif(strcmp($propertyType,'building')){
                    
                    DB::table('buildings')->where('property_id', '=', $property->id)->delete();
                    
                }elseif(strcmp($propertyType,'apartment')){
                    
                    DB::table('apartments')->where('property_id', '=', $property->id)->delete();
                    
                }elseif(strcmp($propertyType,'warehouse')){
                    
                    DB::table('warehouses')->where('property_id', '=', $property->id)->delete();
                    
                }else{
                    Alert::error('Your request has been denied by the system', 'System Error')->autoclose(3000);
                    return redirect('/profile');
                }    

                //delete main property
                DB::table('properties')->where('id', '=', $property->id)->delete();
            }
            
            DB::table('users')->where('id', '=', $user->id)->delete();

            Alert::success('Your account has been deleted successfully!', 'Successfully Deleted!')->autoclose(3000);
            return back();
        }
        else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile');
            
        }
    }

}
