<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportProperty;
use Illuminate\Support\Facades\Validator;
use Alert;

class ReportPropertyController extends Controller
{
    public function houseReport(Request $request)
    {
 
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:255|email',
            'reason' => 'required|string|max:200|min:10'
        ]);
        
       
        if ($validator->fails()) {

            Alert::error('Please check your inputs and correct the following errors', 'Invalid Attempt')->autoclose(3000);
            return back()->withErrors($validator);
        }

        $report = new ReportProperty;
        $report->property_id = request('propertyid');
        $report->house_id = request('houseid');
        $report->reporterEmail = request('email');
        $report->Reason = request('reason');
        $report->save();

        
        Alert::success('Your report has been submitted successfully!', 'Report Sent')->autoclose(3000);

        return back();

    }
}
