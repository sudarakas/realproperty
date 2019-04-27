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
}
