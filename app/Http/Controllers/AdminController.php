<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Property;
use App\User;
use App\House;
use App\Land;
use App\Building;
use App\Apartment;
use App\Warehouse;
use Illuminate\Support\Facades\Validator;
use App\UserEmail;
use Alert;
use App\Mail\ContactMail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        
        $properties = Property::limit(5)->orderBy('id', 'desc')->get();
        $users = User::limit(5)->orderBy('id', 'desc')->get();

        return view('admin.master', compact('properties','users'));
    }



    public function updateAvatar(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(\public_path('/uploads/avatars/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return back();
    }

    public function viewUser(User $user){

        $id = $user->id;
        $properties = Property::where(function($query) use ($id){

            $query->where('user_id','=',$id);

        })->get();
        

        return view('admin.master', compact('user','properties'));


    }

    public function showAdminEditHouse(House $house)
    {
        
        return view('admin.master', compact('house'));

    }

    public function showAdminEditLand(Land $land)
    {
        
        return view('admin.master', compact('land'));

    }

    public function showAdminEditBuilding(Building $building)
    {
        
        return view('admin.master', compact('building'));

    }

    public function showAdminEditApartment(Apartment $apartment)
    {
        
        return view('admin.master', compact('apartment'));

    }

    public function showAdminEditWarehouse(Warehouse $warehouse)
    {
        
        return view('admin.master', compact('warehouse'));

    }

    public function viewAllProperty(){

        $properties = Property::paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function viewAllHouse(){

        $properties = Property::where(function($query){

            $query->where('type','=','house');

        })->paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function viewAllLand(){

        $properties = Property::where(function($query){

            $query->where('type','=','land');

        })->paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function viewAllBuilding(){

        $properties = Property::where(function($query){

            $query->where('type','=','building');

        })->paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function viewAllApartment(){

        $properties = Property::where(function($query){

            $query->where('type','=','apartment');

        })->paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function viewAllWarehouse(){

        $properties = Property::where(function($query){

            $query->where('type','=','warehouse');

        })->paginate(25);

        return view('admin.master', compact('properties'));
    }

    public function viewAllUsers(){

        $users = User::paginate(20);
        return view('admin.master', compact('users'));
    }

    public function adminContactUser(User $user)
    {
        
        return view('admin.master', compact('user'));

    }

    public function adminContactUserSend(Request $request){
        
        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:2500|min:10'
        ]);

        if ($validator->fails()) {

            Alert::error('Please check your inputs and correct the following errors', 'Invalid Attempt')->autoclose(3000);
            return back()->withErrors($validator);
        }
        
        $message = new UserEmail;
        $message->receiver_id = request('receiverid');
        $message->sender_id = auth()->user()->id;
        $message->senderMail = auth()->user()->email;
        $message->senderName = 'Administrator';
        $message->phoneNo = auth()->user()->phoneNo;
        $message->subject = request('subject');
        $message->message = request('message');
        $message->property_url = '/';
        $message->save();

        $request->name = 'Administrator';
        $request->email = auth()->user()->email;
        $request->pno = auth()->user()->phoneNo;
        $request->property_url = '/';

        \Mail::to(request('receiver'))->send(new ContactMail($request));
        
        Alert::success('Message has been sent successfully!', 'Message Sent')->autoclose(3000);

        return back();
    }
    
    public function showAdminEditUser(User $user){

        return view('admin.master', compact('user'));
    }

    public function adminEditUser(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string', 'email|max:255|unique:users',
            'descrption'=> 'required|string|max:100',
            'nic' => 'required|string|regex:/^[0-9]{9}[Vv]$/',
            'address' => 'required|string',
            'city' => 'required|string',
            'gender' => 'required',
            'phoneno' => 'required|numeric',
        ]);

        $user = User::find(request('id'));
        $user->name = request('name');
        $user->email = request('email');
        if(strcmp($user->email,request('email')) != 0 ){
            $user->email_verified_at = NULL;
        }
        $user->description = request('descrption');
        $user->NIC = request('nic');
        $user->address = request('address');
        $user->city = request('city');
        $user->gender = request('gender');
        $user->phoneNo = request('phoneno');
        $user->save();

        Alert::success('User has been edited successfully!', 'Saved Successfully')->autoclose(3000);
        return back()->with('message', 'User account has been successfully updated!');
    }
}
