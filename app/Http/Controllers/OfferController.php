<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class OfferController extends Controller
{
    public function houseOffer(Request $request){

        $request->validate([

            'offeramount' => "required|regex:/^\d+(\.\d{1,2})?$/"
        ]);

        $offer = new Offer();
        $offer->property_id =  request('propertyid');
        $offer->house_id =  request('houseid');
        $offer->offeredUser = auth()->id();
        $offer->offerAmount = request('offeramount');
        $offer->save();

        return back()->with("success","Your offer submitted successfully !");

    }
}
