<?php

namespace App\Http\Controllers;

use Alert;
use App\House;
use App\Property;
use App\MailNotification;
use App\Mail\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class HouseController extends Controller
{
    public function viewHouse(House $house)
    {
        return view('results.viewhouse', compact('house'));
    }

    public function searchHouse(Request $request)
    {
        $keyword = $request->input('searchquery');
        $room = $request->input('room');
        $minPrice = $request->input('minprice');
        $maxPrice = $request->input('maxprice');

        if ($swimmingPool = $request->has('swimmingpool')) {

            $swimmingPool = "Available";
        } else {

            $swimmingPool = "%%";
        }

        if ($noOfFloors = $request->has('balcony')) {

            $noOfFloors = 2;
        } else {

            $noOfFloors = 0;
        }

        if ($outdoor = $request->has('outdoor')) {

            $outdoor = "Available";
        } else {

            $outdoor = "%%";
        }

        $houses = House::whereHas('property', function ($query) use ($room) {
            $query->where('noOfRooms', '>=', $room);
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

        })->where(function ($query) use ($swimmingPool) {

            $query->where('swimmingPool', 'LIKE', $swimmingPool);
        })->where(function ($query) use ($noOfFloors) {

            $query->where('noOfFloors', '>=', $noOfFloors);
        })->where(function ($query) use ($outdoor) {

            $query->where('garden', 'LIKE', $outdoor);
        })->get();

        return view('results.houseresult', compact('houses'));
    }

    public function showEditHouse(House $house)
    {
        if ($house->property->user_id == auth()->id()) {

            return view('profile.home', compact('house'), array('user' => Auth::user()));
        } else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile');
        }
    }

    public function editHouse(Request $request)
    {

        $property = Property::find(request('propertyid'));
        $house = House::find(request('houseid'));

        if ($property->user_id == auth()->id() || Auth::guard('admin')->check()) {

            $request->validate([
                'name' => 'required|max:50|min:3',
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
                'rooms' => 'required|integer',
                'kitchen' => 'required|integer',
                'floor' => 'required|integer',
                'washroom' => 'required|integer',
                'size' => 'required|integer',
                'swimming' => 'required',
                'garden' => 'required',
                'nschool' => 'required',
                'nrailway' => 'required',
                'nbus' => 'required',

            ]);

            if ($request->hasfile('filename')) {

                foreach ($request->file('filename') as $image) {
                    $name = uniqid('real_') . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(1280, 876)->save(\public_path('/uploads/property/house/' . $name));
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

            $house->noOfRooms = request('rooms');
            $house->noOfKitchen = request('kitchen');
            $house->noOfFloors = request('floor');
            $house->noOfWashrooms = request('washroom');
            $house->size = request('size');
            $house->swimmingPool = request('swimming');
            $house->garden = request('garden');
            $house->nearestSchool = request('nschool');
            $house->nearestRailway = request('nrailway');
            $house->nearestBusStop = request('nbus');
            $house->save();

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

    public function deleteHouse(House $house)
    {

        if ($house->property->user_id == auth()->id() || Auth::guard('admin')->check()) {

            DB::table('houses')->where('id', '=', $house->id)->delete();
            DB::table('properties')->where('id', '=', $house->property->id)->delete();

            if (Auth::guard('admin')->check()) {

                $message = new MailNotification;
                $message->receiver_email = $house->property->user->email;
                $message->receiver_name = $house->property->user->name;
                $message->property_name = $house->property->name;
                $message->property_location = $house->property->city;
                $message->property_createdOn = $house->property->created_at;
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
