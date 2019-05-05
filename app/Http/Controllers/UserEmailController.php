<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Mail\InqueryEmail;
use App\UserEmail;
use Alert;
use Illuminate\Support\Facades\Validator;

class UserEmailController extends Controller
{
    public function houseContact(Request $request)
    {
 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'pno' => 'required',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2500|min:10'
        ]);
        
       
        if ($validator->fails()) {

            Alert::error('Please check your inputs and correct the following errors', 'Invalid Attempt')->autoclose(3000);
            return back()->withErrors($validator);
        }

        $owner = \App\User::find(request('owner'));

        $message = new UserEmail;
        $message->receiver_id = request('owner');
        $message->senderMail = request('email');
        $message->senderName = request('name');
        $message->phoneNo = request('pno');
        $message->subject = request('subject');
        $message->message = request('message');
        $message->save();

        \Mail::to($owner->email)->send(new ContactMail($request));
        
        Alert::success('Message Sent', 'Your message has been sent successfully!')->autoclose(3000);

        return back();

    }

    public function landContact(Request $request)
    {
 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'pno' => 'required',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2500|min:10'
        ]);
        
       
        if ($validator->fails()) {

            Alert::error('Please check your inputs and correct the following errors', 'Invalid Attempt')->autoclose(3000);
            return back()->withErrors($validator);
        }

        $owner = \App\User::find(request('owner'));

        $message = new UserEmail;
        $message->receiver_id = request('owner');
        $message->senderMail = request('email');
        $message->senderName = request('name');
        $message->phoneNo = request('pno');
        $message->subject = request('subject');
        $message->message = request('message');
        $message->save();

        \Mail::to($owner->email)->send(new ContactMail($request));
        
        Alert::success('Message Sent', 'Your message has been sent successfully!')->autoclose(3000);

        return back();

    }

    public function buildingContact(Request $request)
    {
 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'pno' => 'required',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2500|min:10'
        ]);
        
       
        if ($validator->fails()) {

            Alert::error('Please check your inputs and correct the following errors', 'Invalid Attempt')->autoclose(3000);
            return back()->withErrors($validator);
        }

        $owner = \App\User::find(request('owner'));

        $message = new UserEmail;
        $message->receiver_id = request('owner');
        $message->senderMail = request('email');
        $message->senderName = request('name');
        $message->phoneNo = request('pno');
        $message->subject = request('subject');
        $message->message = request('message');
        $message->save();

        \Mail::to($owner->email)->send(new ContactMail($request));
        
        Alert::success('Message Sent', 'Your message has been sent successfully!')->autoclose(3000);

        return back();

    }
}
