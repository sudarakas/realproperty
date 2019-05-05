<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\House;
use App\Favorite;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Land;
use App\Building;
use App\Apartment;
use App\Warehouse;

class FavoriteController extends Controller
{
    
    public function favoriteHouse(House $house){

        $favorite = new Favorite;
        $favorite->property_id = $house->property->id;
        $favorite->user_id = auth()->id();
        $favorite->house_id = $house->id;
        $favorite->save();

        try{
            $favorite->save();
            Alert::success('Favorite has been added successfully!', 'Favorite Added')->autoclose(3000);
            return back();
        }catch(\Illuminate\Database\QueryException $e){

            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Alert::warning('Favorite has been already added!', 'Already Added')->autoclose(3000);
                return back();
            }
        }
     
        Alert::error('Something went wrong!', 'Oops!')->autoclose(3000);
        return back();

    }

    public function favoriteLand(Land $land){

        $favorite = new Favorite;
        $favorite->property_id = $land->property->id;
        $favorite->user_id = auth()->id();
        $favorite->land_id = $land->id;
        $favorite->save();

        try{
            $favorite->save();
            Alert::success('Favorite has been added successfully!', 'Favorite Added')->autoclose(3000);
            return back();
        }catch(\Illuminate\Database\QueryException $e){

            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Alert::warning('Favorite has been already added!', 'Already Added')->autoclose(3000);
                return back();
            }
        }
     
        Alert::error('Something went wrong!', 'Oops!')->autoclose(3000);
        return back();

    }

    public function favoriteBuilding(Building $building){

        $favorite = new Favorite;
        $favorite->property_id = $building->property->id;
        $favorite->user_id = auth()->id();
        $favorite->building_id = $building->id;
        try{
            $favorite->save();
            Alert::success('Favorite has been added successfully!', 'Favorite Added')->autoclose(3000);
            return back();
        }catch(\Illuminate\Database\QueryException $e){

            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Alert::warning('Favorite has been already added!', 'Already Added')->autoclose(3000);
                return back();
            }
        }
     
        Alert::error('Something went wrong!', 'Oops!')->autoclose(3000);
        return back();

    }

    public function favoriteApartment(Apartment $apartment){

        // $alreadyFavorite = Favorite::where()
        $favorite = new Favorite;
        $favorite->property_id = $apartment->property->id;
        $favorite->user_id = auth()->id();
        $favorite->apartment_id = $apartment->id;
        
        try{
            $favorite->save();
            Alert::success('Favorite has been added successfully!', 'Favorite Added')->autoclose(3000);
            return back();
        }catch(\Illuminate\Database\QueryException $e){

            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Alert::warning('Favorite has been already added!', 'Already Added')->autoclose(3000);
                return back();
            }
        }
     
        Alert::error('Something went wrong!', 'Oops!')->autoclose(3000);
        return back();

    }

    public function favoriteWarehouse(Warehouse $warehouse){

        // $alreadyFavorite = Favorite::where()
        $favorite = new Favorite;
        $favorite->property_id = $warehouse->property->id;
        $favorite->user_id = auth()->id();
        $favorite->warehouse_id = $warehouse->id;
        
        try{
            $favorite->save();
            Alert::success('Favorite has been added successfully!', 'Favorite Added')->autoclose(3000);
            return back();
        }catch(\Illuminate\Database\QueryException $e){

            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                Alert::warning('Favorite has been already added!', 'Already Added')->autoclose(3000);
                return back();
            }
        }
     
        Alert::error('Something went wrong!', 'Oops!')->autoclose(3000);
        return back();

    }
    

}
