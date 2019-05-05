<?php

namespace App\Http\Controllers;

use App\Page;
use App\User;
use App\Message;

use Auth;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\House;
use App\Land;
use App\Building;
use App\Apartment;
use App\Warehouse;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','verified'])->only([
            'profile', 'changePassword', 'editAccount', 'favorites',
            'viewMessage', 'myMessage', 'myhouse', 'myapartment', 'myland', 'mybuilding', 'mywarehouse', 'deleteaccount', 'addProperty', 'addHouse','addBuilding','addLand','addApartment','addWarehouse'
        ]);
    }
    public function index()
    {
        return view('layouts.master');
    }

    public function land()
    {
        return view('layouts.land');
    }

    public function apartment()
    {
        return view('layouts.apartment');
    }

    public function building()
    {
        return view('layouts.building');
    }

    public function warehouse()
    {
        return view('layouts.warehouses');
    }

    public function about()
    {
        return view('layouts.aboutus');
    }

    public function contactus()
    {
        return view('layouts.contactus');
    }

    //Logout Route
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    // Search Result Methods
    public function housesearch()
    {
        $houses = House::all();
        return view('results.houseresult',compact('houses'));
    }
    public function landsearch()
    {
        $lands = Land::all();
        return view('results.landresult',compact('lands'));
    }
    public function buildingsearch()
    {
        $buildings = Building::all();
        return view('results.buildingresult',compact('buildings'));
    }
    public function apartmentsearch()
    {
        $apartments = Apartment::all();
        return view('results.apartmentresult',compact('apartments'));
    }
    public function warehousesearch()
    {
        $warehouses = Warehouse::all();
        return view('results.warehousetresult',compact('warehouses'));
    }
    
    

    // Profile Page Methods

    public function changePassword()
    {
        return view('profile.home', array('user' => Auth::user()));
    }

    public function editAccount()
    {
        return view('profile.home', array('user' => Auth::user()));
    }

    public function favorites()
    {
        return view('profile.home', array('user' => Auth::user()));
    }

    public function myMessage()
    {
        return view('profile.home', array('user' => Auth::user()));
    }

    public function viewMessage()
    {
        $records = DB::table('messages')->orderBy('created_at', 'asc')->get();
        return view('profile.home', array('user' => Auth::user()))->with('records', $records);
    }
    public function deleteaccount()
    {
        return view('profile.home', array('user' => Auth::user()));
    }

    public function myhouse()
    {
        $userId = auth()->id();
        $houses = House::whereHas('property', function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profile.home', compact('houses'),array('user' => Auth::user()));
    }

    public function myland()
    {
        $userId = auth()->id();
        $lands = Land::whereHas('property', function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profile.home', compact('lands'),array('user' => Auth::user()));
    }

    public function myapartment()
    {
        $userId = auth()->id();
        $apartments = Apartment::whereHas('property', function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profile.home', compact('apartments'),array('user' => Auth::user()));
    }

    public function mybuilding()
    {
        $userId = auth()->id();
        $buildings = Building::whereHas('property', function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profile.home', compact('buildings'),array('user' => Auth::user()));
    }
    public function mywarehouse()
    {
        $userId = auth()->id();
        $warehouses = Warehouse::whereHas('property', function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profile.home', compact('warehouses'),array('user' => Auth::user()));
    }





    // Add Propperties Methods
    public function addProperty()
    {
        return view('layouts.addproperty', array('user' => Auth::user()));
    }
    public function addHouse(){
        return view('layouts.property.addhouse', array('user' => Auth::user()));
    }

    public function dismap(){
        return view('layouts.property.map', array('user' => Auth::user()));
    }

    public function addLand(){
        return view('layouts.property.addland', array('user' => Auth::user()));
    }

    public function addBuilding(){
        return view('layouts.property.addbuilding', array('user' => Auth::user()));
    }

    public function addApartment(){
        return view('layouts.property.addapartment', array('user' => Auth::user()));
    }

    public function addWarehouse(){
        return view('layouts.property.addwarehouse', array('user' => Auth::user()));
    }
    


    public function viewpost()
    {
        return view('results.view');
    }



    //Blog
    public function showBlog(){

        return view('blog.blog');
    }
    public function showBlogPost(){

        return view('blog.viewpost');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
