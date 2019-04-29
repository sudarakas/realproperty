<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;

class HouseController extends Controller
{
    public function viewHouse(House $house)
    {
        return view('results.viewhouse',compact('house'));
    }
    public function searchHouse(Request $request)
    {
        $keyword = $request->input('searchquery');
        $room = $request->input('room');
        $minPrice = $request->input('minprice');
        $maxPrice = $request->input('maxprice');
        
        if($swimmingPool = $request->has('swimmingpool')){

            $swimmingPool = "Available";

        }
        else{

            $swimmingPool = "%%";
        }

        if($noOfFloors = $request->has('balcony')){

            $noOfFloors = 2;
        }
        else{

            $noOfFloors = 0;
        }

        if($outdoor = $request->has('outdoor')){

            $outdoor = "Available";

        }
        else{

            $outdoor = "%%";

        }

        $houses = House::whereHas('property', function($query) use ($keyword,$room) 
        {
            $query->where('noOfRooms','>=', $room);
                  
        })->whereHas('property',function($query) use ($keyword){
            $query->orwhere('postalCode', 'LIKE', $keyword)
                  ->orWhere('province', 'LIKE', $keyword)
                  ->orWhere('city', 'LIKE', $keyword);
        })->whereHas('property',function($query) use ($minPrice,$maxPrice){
            
            $query->whereBetween('amount',array($minPrice,$maxPrice));

        })->where(function($query) use ($swimmingPool){
            
            $query->where('swimmingPool', 'LIKE', $swimmingPool);

        })->where(function($query) use ($noOfFloors){
            
            $query->where('noOfFloors', '>=', $noOfFloors);

        })->where(function($query) use ($outdoor){
            
            $query->where('garden', 'LIKE', $outdoor);

        })->get();

        return view('results.houseresult',compact('houses'));
    }
    
}
