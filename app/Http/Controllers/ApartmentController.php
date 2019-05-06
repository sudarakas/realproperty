<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Alert;
use Illuminate\Support\Facades\Auth;

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

    public function showEditApartment(Apartment $apartment)
    {
        if ($apartment->property->user_id == auth()->id()) {

            return view('profile.home', compact('apartment'), array('user' => Auth::user()));
        } else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile');
        }
    }
}
