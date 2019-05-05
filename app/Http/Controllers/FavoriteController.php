<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;
use App\Favorite;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Land;
use App\Building;

class FavoriteController extends Controller
{
    
    public function favoriteHouse(House $house){

        $favorite = new Favorite;
        $favorite->property_id = $house->property->id;
        $favorite->user_id = auth()->id();
        $favorite->house_id = $house->id;
        $favorite->save();

        Alert::success('Favorite has been added successfully!', 'Favorite Added')->autoclose(3000);
        return back();

    }

    public function favoriteLand(Land $land){

        $favorite = new Favorite;
        $favorite->property_id = $land->property->id;
        $favorite->user_id = auth()->id();
        $favorite->land_id = $land->id;
        $favorite->save();

        Alert::success('Favorite has been added successfully!', 'Favorite Added')->autoclose(3000);
        return back();

    }

    public function favoriteBuilding(Building $building){

        $favorite = new Favorite;
        $favorite->property_id = $building->property->id;
        $favorite->user_id = auth()->id();
        $favorite->building_id = $building->id;
        $favorite->save();

        Alert::success('Favorite has been added successfully!', 'Favorite Added')->autoclose(3000);
        return back();

    }

    

}
