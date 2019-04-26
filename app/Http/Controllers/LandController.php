<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Land;

class LandController extends Controller
{
    public function viewHouse(Land $land)
    {
        return view('results.viewland',compact('land'));
    }
}
