<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;
use Illuminate\Support\Facades\Auth;
use Alert;

class WarehouseController extends Controller
{
    public function viewWarehouse(Warehouse $warehouse)
    {
        return view('results.viewwarehouse',compact('warehouse'));
    }

    public function searchWarehouse(Request $request)
    {
        $keyword = $request->input('searchquery');
        $minPrice = $request->input('minprice');
        $maxPrice = $request->input('maxprice');
        
        if($electricity = $request->has('electricity')){

            $electricity = "3 Phase";

        }
        else{

            $electricity = "%%";
        }

        if($parkingArea = $request->has('parkingarea')){

            $parkingArea = "Available";
        }
        else{

            $parkingArea = "%%";
        }


        $warehouses = Warehouse::whereHas('property',function($query) use ($keyword){
            $query->where(function($query) use ($keyword){
                $query->orwhere('postalCode', 'LIKE', $keyword)
                      ->orWhere('province', 'LIKE', $keyword)
                      ->orWhere('city', 'LIKE', $keyword);
            });
        })->whereHas('property',function($query) use ($minPrice,$maxPrice){
            
            $query->whereBetween('amount',array($minPrice,$maxPrice));

        })->where(function($query) use ($electricity){
            
            $query->where('electricity', 'LIKE', $electricity);

        })->where(function($query) use ($parkingArea){
            
            $query->where('parkingArea', 'LIKE', $parkingArea);

        })->get();

        return view('results.warehousetresult',compact('warehouses'));
    }

    public function showEditWarehouse(Warehouse $warehouse)
    {
        if ($warehouse->property->user_id == auth()->id()) {

            return view('profile.home', compact('warehouse'), array('user' => Auth::user()));
        } else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile');
        }
    }
}
