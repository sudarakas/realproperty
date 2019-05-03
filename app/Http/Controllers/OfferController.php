<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Land;
use App\House;
use App\Building;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function houseOffer(Request $request)
    {

        $request->validate([

            'offeramount' => "required|regex:/^\d+(\.\d{1,2})?$/"
        ]);

        if (House::find(request('houseid'))->offers->count() > 0) {

            $currentMax = House::find(request('houseid'))->offers->sortBy('offerAmount')->last()->offerAmount;

            if ($currentMax > request('offeramount')) {

                return back()->with("warning", "Your offer should be higher than the current offer!");
            }
        }

        $offer = new Offer();
        $offer->property_id =  request('propertyid');
        $offer->house_id =  request('houseid');
        $offer->offeredUser = auth()->id();
        $offer->offerAmount = request('offeramount');
        $offer->save();

        return back()->with("success", "Your offer submitted successfully !");
    }

    public function landOffer(Request $request)
    {

        $request->validate([

            'offeramount' => "required|regex:/^\d+(\.\d{1,2})?$/"
        ]);

        if (Land::find(request('landid'))->offers->count() > 0) {

            $currentMax = Land::find(request('landid'))->offers->sortBy('offerAmount')->last()->offerAmount;

            if ($currentMax > request('offeramount')) {

                return back()->with("warning", "Your offer should be higher than the current offer!");
            }
        }
        $offer = new Offer();
        $offer->property_id =  request('propertyid');
        $offer->land_id =  request('landid');
        $offer->offeredUser = auth()->id();
        $offer->offerAmount = request('offeramount');
        $offer->save();

        return back()->with("success", "Your offer submitted successfully !");
    }

    public function buildingOffer(Request $request)
    {

        $request->validate([

            'offeramount' => "required|regex:/^\d+(\.\d{1,2})?$/"
        ]);

        if (Building::find(request('buildingid'))->offers->count() > 0) {

            $currentMax = Building::find(request('buildingid'))->offers->sortBy('offerAmount')->last()->offerAmount;

            if ($currentMax > request('offeramount')) {

                return back()->with("warning", "Your offer should be higher than the current offer!");
            }
        }
        $offer = new Offer();
        $offer->property_id =  request('propertyid');
        $offer->building_id =  request('buildingid');
        $offer->offeredUser = auth()->id();
        $offer->offerAmount = request('offeramount');
        $offer->save();

        return back()->with("success", "Your offer submitted successfully !");
    }
}
