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
use App\UserEmail;
use App\Article;
use App\Comment;
use Carbon\Carbon;

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
        $articles = Article::limit(3)->orderBy('id','desc')->get();
        return view('layouts.master',compact('articles'));
    }

    public function land()
    {
        $articles = Article::limit(3)->orderBy('id','desc')->get();
        return view('layouts.land',compact('articles'));
    }

    public function apartment()
    {
        $articles = Article::limit(3)->orderBy('id','desc')->get();
        return view('layouts.apartment',compact('articles'));
    }

    public function building()
    {
        $articles = Article::limit(3)->orderBy('id','desc')->get();
        return view('layouts.building',compact('articles'));
    }

    public function warehouse()
    {
        $articles = Article::limit(3)->orderBy('id','desc')->get();
        return view('layouts.warehouses',compact('articles'));
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

    public function deleteaccount()
    {
        return view('profile.home', array('user' => Auth::user()));
    }

    public function myHouse()
    {
        $userId = auth()->id();
        $houses = House::whereHas('property', function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profile.home', compact('houses'),array('user' => Auth::user()));
    }

    public function myLand()
    {
        $userId = auth()->id();
        $lands = Land::whereHas('property', function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profile.home', compact('lands'),array('user' => Auth::user()));
    }

    public function myApartment()
    {
        $userId = auth()->id();
        $apartments = Apartment::whereHas('property', function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profile.home', compact('apartments'),array('user' => Auth::user()));
    }

    public function myBuilding()
    {
        $userId = auth()->id();
        $buildings = Building::whereHas('property', function($query) use ($userId){

            $query->where('user_id','=',$userId);

        })->paginate(15);

        return view('profile.home', compact('buildings'),array('user' => Auth::user()));
    }

    public function myWarehouse()
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

        $articles = Article::orderBy('id', 'desc');
                           

        if($month = request('month')){

            $articles->whereMonth('created_at', Carbon::parse($month)->month);

        }

        if($year = request('year')){

            $articles->whereYear('created_at', $year);
            
        }

        if($category = request('category')){

            $articles->where('category', $category);            
        }

        $articles = $articles->paginate(3);

        $archives = Article::archive();

        return view('blog.blog',compact('articles','archives'));
    }
    
    public function showBlogPost(Article $article){

        $archives = Article::archive();
        return view('blog.viewarticle',compact('article','archives'));
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
