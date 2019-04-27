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
}
