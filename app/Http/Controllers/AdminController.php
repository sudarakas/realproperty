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

}
