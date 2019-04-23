<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertyController extends Controller
{
    public function addProperty(Request $request){

        $property = new Property;
        $property->user_id = auth()->id();
        $property->name = request('name');
        $property->type = request('type');
        $property->amount = request('amount');
        $property->name = request('name');
        $property->name = request('name');
        $property->name = request('name');
        $property->name = request('name');
        $property->save();
    }
}
