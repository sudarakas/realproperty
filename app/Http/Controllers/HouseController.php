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
        $houses = House::whereHas('property', function($query) use ($keyword) {$query->where('postalCode', 'like', $keyword);})->get();
        return view('results.houseresult',compact('houses'));
    }
    
}
