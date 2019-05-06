<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;
use Illuminate\Support\Facades\Auth;
use Alert;
use Intervention\Image\Facades\Image;
use App\Property;

class WarehouseController extends Controller
{
    public function viewWarehouse(Warehouse $warehouse)
    {
        return view('results.viewwarehouse', compact('warehouse'));
    }

    public function searchWarehouse(Request $request)
    {
        $keyword = $request->input('searchquery');
        $minPrice = $request->input('minprice');
        $maxPrice = $request->input('maxprice');

        if ($electricity = $request->has('electricity')) {

            $electricity = "3 Phase";
        } else {

            $electricity = "%%";
        }

        if ($parkingArea = $request->has('parkingarea')) {

            $parkingArea = "Available";
        } else {

            $parkingArea = "%%";
        }


        $warehouses = Warehouse::whereHas('property', function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->orwhere('postalCode', 'LIKE', $keyword)
                    ->orWhere('province', 'LIKE', $keyword)
                    ->orWhere('city', 'LIKE', $keyword);
            });
        })->whereHas('property', function ($query) use ($minPrice, $maxPrice) {

            $query->whereBetween('amount', array($minPrice, $maxPrice));
        })->where(function ($query) use ($electricity) {

            $query->where('electricity', 'LIKE', $electricity);
        })->where(function ($query) use ($parkingArea) {

            $query->where('parkingArea', 'LIKE', $parkingArea);
        })->get();

        return view('results.warehousetresult', compact('warehouses'));
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

    public function editWarehouse(Request $request)
    {

        $property = Property::find(request('propertyid'));
        $warehouse = Warehouse::find(request('warehouseid'));

        if ($property->user_id == auth()->id()) {

            $request->validate([
                'name' => 'required|max:30|min:3',
                'type' => 'required',
                'amount' => 'required',
                'city' => 'required',
                'postalcode' => 'required|integer',
                'province' => 'required',
                'description' => 'required|min:100',
                'contactno' => 'required',
                'contactemail' => 'email|required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
                'lat' => 'required',
                'lat' => 'required',
                'agreement' => 'required',
                'electricity' => 'required',
                'size' => 'required|integer',
                'carpark' => 'required'

            ]);

            if ($request->hasfile('filename')) {

                foreach ($request->file('filename') as $image) {
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(1280, 876)->save(\public_path('/uploads/property/warehouse/' . $name));
                    $data[] = $name;
                }
            }


            $property->name = request('name');
            $property->type = request('type');
            $property->amount = request('amount');
            $property->city = request('city');
            $property->postalCode = request('postalcode');
            $property->province = request('province');
            $property->description = request('description');
            $property->contactNo = request('contactno');
            $property->contatctEmail = request('contactemail');

            if ($request->hasfile('filename')) {

                $property->images = json_encode($data);
            }

            $property->latitude = request('lat');
            $property->longitude = request('lng');
            $property->save();


            $warehouse->agreement = request('agreement');
            $warehouse->electricity = request('electricity');
            $warehouse->parkingArea = request('carpark');
            $warehouse->size = request('size');
            $warehouse->save();

            Alert::success('Your property has been edited successfully!', 'Successfully Updated')->autoclose(3000);
            return back()->with('message', 'Your property has been successfully updated!');
        } else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile');
        }
    }
}
