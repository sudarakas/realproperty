<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{
    public function viewApartment(Apartment $apartment)
    {

        return view('results.viewapartment',compact('apartment'));
        
    }

    public function searchApartment(Request $request)
    {
        $keyword = $request->input('searchquery');
        $room = $request->input('room');
        $minPrice = $request->input('minprice');
        $maxPrice = $request->input('maxprice');
        
        $apartments = Apartment::whereHas('property', function($query) use ($room) 
        {
            $query->where('noOfRooms','>=', $room);
                  
        })->whereHas('property',function($query) use ($keyword){
            $query->where(function($query) use ($keyword){
                $query->orwhere('postalCode', 'LIKE', $keyword)
                      ->orWhere('province', 'LIKE', $keyword)
                      ->orWhere('city', 'LIKE', $keyword);
            });
        })->whereHas('property',function($query) use ($minPrice,$maxPrice){
            
            $query->whereBetween('amount',array($minPrice,$maxPrice));

        })->get();

        return view('results.apartmentresult',compact('apartments'));
    }
}
