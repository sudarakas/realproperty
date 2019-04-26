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
}
