<?php

namespace App\Http\Controllers;

use App\Page;
use App\User;
use App\Message;

use Auth;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'viewMessage', 'myMessage', 'myhouse', 'myapartment', 'myland', 'mybuilding', 'mywarehouse', 'deleteaccount', 'addProperty', 'addHouse'
        ]);
    }
    public function index()
    {
        return view('layouts.master');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
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

    public function housesearch()
    {
        return view('results.houseresult');
    }

    public function profile()
    {
        return view('profile.home', array('user' => Auth::user()));
    }

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
        return view('profile.home', array('user' => Auth::user()));
    }

    public function myland()
    {
        return view('profile.home', array('user' => Auth::user()));
    }
    public function myapartment()
    {
        return view('profile.home', array('user' => Auth::user()));
    }
    public function mybuilding()
    {
        return view('profile.home', array('user' => Auth::user()));
    }
    public function mywarehouse()
    {
        return view('profile.home', array('user' => Auth::user()));
    }
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
    

    public function viewpost()
    {
        return view('results.view');
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
