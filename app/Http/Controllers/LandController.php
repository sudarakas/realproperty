<?php

namespace App\Http\Controllers;

use Alert;
use App\Land;
use App\MailNotification;
use App\Mail\EmailNotification;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class LandController extends Controller
{
    public function viewLand(Land $land)
    {
        return view('results.viewland', compact('land'));
    }

    public function searchLand(Request $request)
    {
        $keyword = $request->input('searchquery');
        $minPrice = $request->input('minprice');
        $maxPrice = $request->input('maxprice');

        if ($electricity = $request->has('electricity')) {

            $electricity = "3 Phase";
        } else {

            $electricity = "%%";
        }

        if ($tapWater = $request->has('tapwater')) {

            $tapWater = "Available";
        } else {

            $tapWater = "%%";
        }

        $lands = Land::whereHas('property', function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->orwhere('postalCode', 'LIKE', $keyword)
                    ->orWhere('province', 'LIKE', $keyword)
                    ->orWhere('city', 'LIKE', $keyword);
            });
        })->whereHas('property', function ($query) {

            $query->where('availability', 'LIKE', "YES");

        })->whereHas('property', function ($query) use ($minPrice, $maxPrice) {

            $query->whereBetween('amount', array($minPrice, $maxPrice));

        })->where(function ($query) use ($electricity) {

            $query->where('electricity', 'LIKE', $electricity);

        })->where(function ($query) use ($tapWater) {

            $query->where('tapwater', 'LIKE', $tapWater);
        })->get();

        return view('results.landresult', compact('lands'));
    }

    public function showEditLand(Land $land)
    {
        if ($land->property->user_id == auth()->id()) {

            return view('profile.home', compact('land'), array('user' => Auth::user()));
        } else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile');
        }
    }

    public function editLand(Request $request)
    {

        $property = Property::find(request('propertyid'));
        $land = Land::find(request('landid'));

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
                'size' => 'required|integer',
                'electricity' => 'required',
                'tapwater' => 'required',
                'nschool' => 'required',
                'nrailway' => 'required',
                'nbus' => 'required',

            ]);

            if ($request->hasfile('filename')) {

                foreach ($request->file('filename') as $image) {
                    $name = uniqid('real_') . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(1280, 876)->save(\public_path('/uploads/property/land/' . $name));
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

            $land->size = request('size');
            $land->electricity = request('electricity');
            $land->tapwater = request('tapwater');
            $land->nearestSchool = request('nschool');
            $land->nearestRailway = request('nrailway');
            $land->nearestBusStop = request('nbus');
            $land->save();

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

            // return dd($data);
        } else {

            Alert::error('Your request has been denied by the system', 'Unauthorized Attempt')->autoclose(3000);
            return redirect('/profile');
        }
    }

    public function deleteLand(Land $land)
    {

        if ($land->property->user_id == auth()->id() || Auth::guard('admin')->check()) {

            DB::table('lands')->where('id', '=', $land->id)->delete();
            DB::table('properties')->where('id', '=', $land->property->id)->delete();

            if (Auth::guard('admin')->check()) {

                $message = new MailNotification;
                $message->receiver_email = $land->property->user->email;
                $message->receiver_name = $land->property->user->name;
                $message->property_name = $land->property->name;
                $message->property_location = $land->property->city;
                $message->property_createdOn = $land->property->created_at;
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
