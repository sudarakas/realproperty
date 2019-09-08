<?php

namespace App\Http\Controllers;

use Alert;
use App\Building;
use App\Property;
use App\MailNotification;
use App\Mail\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class BuildingController extends Controller
{
    public function viewBuilding(Building $building)
    {

        return view('results.viewbuilding', compact('building'));
    }

    public function searchBuilding(Request $request)
    {
        $keyword = $request->input('searchquery');
        $noOfFloors = $request->input('nooffloors');
        $minPrice = $request->input('minprice');
        $maxPrice = $request->input('maxprice');

        if ($lift = $request->has('lift')) {

            $lift = "Available";
        } else {

            $lift = "%%";
        }

        if ($carPark = $request->has('carpark')) {

            $carPark = "Available";
        } else {

            $carPark = "%%";
        }

        $buildings = Building::whereHas('property', function ($query) use ($noOfFloors) {
            $query->where('noOfFloors', '>=', $noOfFloors);
        })->whereHas('property', function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->orwhere('postalCode', 'LIKE', $keyword)
                    ->orWhere('province', 'LIKE', $keyword)
                    ->orWhere('city', 'LIKE', $keyword);
            });
        })->whereHas('property', function ($query) use ($minPrice, $maxPrice) {

            $query->whereBetween('amount', array($minPrice, $maxPrice));
        })->whereHas('property', function ($query) {

            $query->where('availability', 'LIKE', "YES");

        })->where(function ($query) use ($lift) {

            $query->where('lift', 'LIKE', $lift);
        })->where(function ($query) use ($carPark) {

            $query->where('carPark', 'LIKE', $carPark);
        })->get();

        //return "OK";
        return view('results.buildingresult', compact('buildings'));
    }

    public function showEditBuilding(Building $building)
    {
        if ($building->property->user_id == auth()->id()) {

            return view('profile.home', compact('building'), array('user' => Auth::user()));
        } else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile');
        }
    }

    public function editBuilding(Request $request)
    {

        $property = Property::find(request('propertyid'));
        $building = Building::find(request('buildingid'));

        if ($property->user_id == auth()->id() || Auth::guard('admin')->check()) {

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
                'lift' => 'required',
                'carpark' => 'required',
                'floorsize' => 'required|integer',
                'floor' => 'required|integer',
                'agreement' => 'required',
                'nschool' => 'required',
                'nrailway' => 'required',
                'nbus' => 'required',

            ]);

            if ($request->hasfile('filename')) {

                foreach ($request->file('filename') as $image) {
                    $name = uniqid('real_') . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(1280, 876)->save(\public_path('/uploads/property/building/' . $name));
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

            $building->agreement = request('agreement');
            $building->noOfFloors = request('floor');
            $building->floorSize = request('floorsize');
            $building->lift = request('lift');
            $building->carpark = request('carpark');
            $building->nearestSchool = request('nschool');
            $building->nearestRailway = request('nrailway');
            $building->nearestBusStop = request('nbus');
            $building->save();

            if (Auth::guard('admin')->check()) {

                $message = new MailNotification;
                $message->receiver_email = $property->user->email;
                $message->receiver_name = $property->user->name;
                $message->property_name = $property->name;
                $message->property_location = $property->city;
                $message->property_createdOn = $property->created_at;
                $message->status = 'modified';
                $message->subject = "Your property has been modified!";

                \Mail::to($message->receiver_email)->send(new EmailNotification($message));
            }

            Alert::success('Your property has been edited successfully!', 'Successfully Updated')->autoclose(3000);
            return back()->with('message', 'Your property has been successfully updated!');
        } else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile');
        }
    }

    public function deleteBuilding(Building $building)
    {

        if ($building->property->user_id == auth()->id() || Auth::guard('admin')->check()) {

            DB::table('buildings')->where('id', '=', $building->id)->delete();
            DB::table('properties')->where('id', '=', $building->property->id)->delete();

            if (Auth::guard('admin')->check()) {

                $message = new MailNotification;
                $message->receiver_email = $building->property->user->email;
                $message->receiver_name = $building->property->user->name;
                $message->property_name = $building->property->name;
                $message->property_location = $building->property->city;
                $message->property_createdOn = $building->property->created_at;
                $message->status = 'deleted';
                $message->subject = "Your property has been deleted!";

                \Mail::to($message->receiver_email)->send(new EmailNotification($message));
            }

            Alert::success('Your property has been deleted successfully!', 'Successfully Deleted!')->autoclose(3000);
            return back();
        } else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile');

        }
    }
}
