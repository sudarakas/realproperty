<?php

namespace App\Http\Controllers;

use Alert;
use App\Apartment;
use App\MailNotification;
use App\Mail\EmailNotification;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ApartmentController extends Controller
{
    public function viewApartment(Apartment $apartment)
    {

        return view('results.viewapartment', compact('apartment'));
    }

    public function searchApartment(Request $request)
    {
        $keyword = $request->input('searchquery');
        $room = $request->input('room');
        $minPrice = $request->input('minprice');
        $maxPrice = $request->input('maxprice');

        $apartments = Apartment::whereHas('property', function ($query) use ($room) {
            $query->where('noOfRooms', '>=', $room);
        })->whereHas('property', function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->orwhere('postalCode', 'LIKE', $keyword)
                    ->orWhere('province', 'LIKE', $keyword)
                    ->orWhere('city', 'LIKE', $keyword);
            });
        })->whereHas('property', function ($query) {

            $query->where('availability', 'LIKE', "YES");

        })->whereHas('property', function ($query) use ($minPrice, $maxPrice) {

            $query->whereBetween('amount', array($minPrice, $maxPrice));
        })->get();

        return view('results.apartmentresult', compact('apartments'));
    }

    public function showEditApartment(Apartment $apartment)
    {
        if ($apartment->property->user_id == auth()->id()) {

            return view('profile.home', compact('apartment'), array('user' => Auth::user()));
        } else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile');
        }
    }

    public function editApartment(Request $request)
    {

        $property = Property::find(request('propertyid'));
        $apartment = Apartment::find(request('apartmentid'));

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
                'rooms' => 'required',
                'kitchen' => 'required',
                'size' => 'required|integer',
                'washroom' => 'required',
                'nschool' => 'required',
                'nrailway' => 'required',
                'nbus' => 'required',

            ]);

            if ($request->hasfile('filename')) {

                foreach ($request->file('filename') as $image) {
                    $name = uniqid('real_') . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(1280, 876)->save(\public_path('/uploads/property/apartment/' . $name));
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

            $apartment->noOfRooms = request('rooms');
            $apartment->noOfKitchen = request('kitchen');
            $apartment->noOfWashrooms = request('washroom');
            $apartment->size = request('size');
            $apartment->nearestSchool = request('nschool');
            $apartment->nearestRailway = request('nrailway');
            $apartment->nearestBusStop = request('nbus');
            $apartment->save();

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

    public function deleteApartment(Apartment $apartment)
    {

        if ($apartment->property->user_id == auth()->id() || Auth::guard('admin')->check()) {

            DB::table('apartments')->where('id', '=', $apartment->id)->delete();
            DB::table('properties')->where('id', '=', $apartment->property->id)->delete();

            if (Auth::guard('admin')->check()) {

                $message = new MailNotification;
                $message->receiver_email = $apartment->property->user->email;
                $message->receiver_name = $apartment->property->user->name;
                $message->property_name = $apartment->property->name;
                $message->property_location = $apartment->property->city;
                $message->property_createdOn = $apartment->property->created_at;
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
