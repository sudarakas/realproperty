<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building;

class BuildingController extends Controller
{
    public function viewBuilding(Building $building)
    {

        return view('results.viewbuilding',compact('building'));
        
    }

    public function searchBuilding(Request $request)
    {
        $keyword = $request->input('searchquery');
        $noOfFloors = $request->input('nooffloors');
        $minPrice = $request->input('minprice');
        $maxPrice = $request->input('maxprice');
        
        if($lift = $request->has('lift')){

            $lift = "Available";

        }
        else{

            $lift = "%%";
        }

        if($carPark = $request->has('carpark')){

            $carPark = "Available";
        }
        else{

            $carPark = "%%";
        }


        $buildings = Building::whereHas('property', function($query) use ($noOfFloors) 
        {
            $query->where('noOfFloors','>=', $noOfFloors);
                  
        })->whereHas('property',function($query) use ($keyword){
            $query->where(function($query) use ($keyword){
                $query->orwhere('postalCode', 'LIKE', $keyword)
                      ->orWhere('province', 'LIKE', $keyword)
                      ->orWhere('city', 'LIKE', $keyword);
            });
        })->whereHas('property',function($query) use ($minPrice,$maxPrice){
            
            $query->whereBetween('amount',array($minPrice,$maxPrice));

        })->where(function($query) use ($lift){
            
            $query->where('lift', 'LIKE', $lift);

        })->where(function($query) use ($carPark){
            
            $query->where('carPark', 'LIKE', $carPark);

        })->get();

        //return "OK";
        return view('results.buildingresult',compact('buildings'));
    }

}
