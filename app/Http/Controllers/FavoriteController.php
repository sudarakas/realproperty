<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;
use App\Favorite;
use Illuminate\Support\Facades\Auth;
use Alert;

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

}
