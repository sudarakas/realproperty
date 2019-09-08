<?php

namespace App\Http\Controllers;

use Alert;
use App\MailNotification;
use App\Mail\EmailNotification;
use App\Property;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

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
        })->whereHas('property', function ($query) {

            $query->where('availability', 'LIKE', "YES");

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
                'agreement' => 'required',
                'electricity' => 'required',
                'size' => 'required|integer',
                'carpark' => 'required',

            ]);

            if ($request->hasfile('filename')) {

                foreach ($request->file('filename') as $image) {
                    $name = uniqid('real_') . '.' . $image->getClientOriginalExtension();
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

    public function deleteWarehouse(Warehouse $warehouse)
    {

        if ($warehouse->property->user_id == auth()->id() || Auth::guard('admin')->check()) {

            DB::table('warehouses')->where('id', '=', $warehouse->id)->delete();
            DB::table('properties')->where('id', '=', $warehouse->property->id)->delete();

            if (Auth::guard('admin')->check()) {

                $message = new MailNotification;
                $message->receiver_email = $warehouse->property->user->email;
                $message->receiver_name = $warehouse->property->user->name;
                $message->property_name = $warehouse->property->name;
                $message->property_location = $warehouse->property->city;
                $message->property_createdOn = $warehouse->property->created_at;
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
