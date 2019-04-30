<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Land;

class LandController extends Controller
{
    public function viewLand(Land $land)
    {
        return view('results.viewland',compact('land'));
    }

    public function searchLand(Request $request)
    {
        $keyword = $request->input('searchquery');
        $minPrice = $request->input('minprice');
        $maxPrice = $request->input('maxprice');
        
        if($electricity = $request->has('electricity')){

            $electricity = "3 Phase";

        }
        else{

            $electricity = "%%";
        }

        if($tapWater = $request->has('tapwater')){

            $tapWater = "Available";
        }
        else{

            $tapWater = "%%";
        }


        $lands = Land::whereHas('property',function($query) use ($keyword){
            $query->where(function($query) use ($keyword){
                $query->orwhere('postalCode', 'LIKE', $keyword)
                      ->orWhere('province', 'LIKE', $keyword)
                      ->orWhere('city', 'LIKE', $keyword);
            });
        })->whereHas('property',function($query) use ($minPrice,$maxPrice){
            
            $query->whereBetween('amount',array($minPrice,$maxPrice));

        })->where(function($query) use ($electricity){
            
            $query->where('electricity', 'LIKE', $electricity);

        })->where(function($query) use ($tapWater){
            
            $query->where('tapwater', 'LIKE', $tapWater);

        })->get();

        return view('results.landresult',compact('lands'));
    }
}
