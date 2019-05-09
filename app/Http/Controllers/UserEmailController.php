<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Mail\InqueryEmail;
use App\UserEmail;
use App\User;
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
        $message->sender_id = request('sender');
        $message->senderMail = request('email');
        $message->senderName = request('name');
        $message->phoneNo = request('pno');
        $message->subject = request('subject');
        $message->message = request('message');
        $message->property_url = request('path');
        $message->save();

        \Mail::to($owner->email)->send(new ContactMail($request));
        
        Alert::success('Your message has been sent successfully!', 'Message Sent')->autoclose(3000);

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
        $message->sender_id = request('sender');
        $message->senderMail = request('email');
        $message->senderName = request('name');
        $message->phoneNo = request('pno');
        $message->subject = request('subject');
        $message->message = request('message');
        $message->property_url = request('path');
        $message->save();

        \Mail::to($owner->email)->send(new ContactMail($request));
        
        Alert::success('Your message has been sent successfully!', 'Message Sent')->autoclose(3000);

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
        $message->sender_id = request('sender');
        $message->senderMail = request('email');
        $message->senderName = request('name');
        $message->phoneNo = request('pno');
        $message->subject = request('subject');
        $message->message = request('message');
        $message->property_url = request('path');
        $message->save();


        \Mail::to($owner->email)->send(new ContactMail($request));
        
        Alert::success('Your message has been sent successfully!', 'Message Sent')->autoclose(3000);

        return back();

    }

    public function apartmentContact(Request $request)
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
        $message->sender_id = request('sender');
        $message->senderMail = request('email');
        $message->senderName = request('name');
        $message->phoneNo = request('pno');
        $message->subject = request('subject');
        $message->message = request('message');
        $message->property_url = request('path');
        $message->save();


        \Mail::to($owner->email)->send(new ContactMail($request));
        
        Alert::success('Your message has been sent successfully!', 'Message Sent')->autoclose(3000);

        return back();

    }

    public function warehouseContact(Request $request)
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
        $message->sender_id = request('sender');
        $message->senderMail = request('email');
        $message->senderName = request('name');
        $message->phoneNo = request('pno');
        $message->subject = request('subject');
        $message->message = request('message');
        $message->property_url = request('path');
        $message->save();


        \Mail::to($owner->email)->send(new ContactMail($request));
        
        Alert::success('Your message has been sent successfully!', 'Message Sent')->autoclose(3000);

        return back();

    }

    public function replyMessage(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:2500|min:10'
        ]);

        if ($validator->fails()) {

            Alert::error('Please check your inputs and correct the following errors', 'Invalid Attempt')->autoclose(3000);
            return back()->withErrors($validator);
        }
        
        $message = new UserEmail;
        $message->receiver_id = request('owner');
        $message->sender_id = auth()->user()->id;
        $message->senderMail = auth()->user()->email;
        $message->senderName = auth()->user()->name;
        $message->phoneNo = auth()->user()->phoneNo;
        $message->subject = request('subject');
        $message->message = request('message');
        $message->property_url = request('path');
        $message->save();

        $request->name = auth()->user()->name;
        $request->email = auth()->user()->email;
        $request->pno = auth()->user()->phoneNo;
        $request->property_url = request('path');


        \Mail::to(request('email'))->send(new ContactMail($request));
        
        Alert::success('Your message has been sent successfully!', 'Message Sent')->autoclose(3000);

        return back();

    }

    public function contactOffersSend(Request $request){
        
        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:2500|min:10'
        ]);

        if ($validator->fails()) {

            Alert::error('Please check your inputs and correct the following errors', 'Invalid Attempt')->autoclose(3000);
            return back()->withErrors($validator);
        }
        
        $message = new UserEmail;
        $message->receiver_id = request('owner');
        $message->sender_id = auth()->user()->id;
        $message->senderMail = auth()->user()->email;
        $message->senderName = auth()->user()->name;
        $message->phoneNo = auth()->user()->phoneNo;
        $message->subject = request('subject');
        $message->message = request('message');
        $message->property_url = request('path');
        $message->save();

        $request->name = auth()->user()->name;
        $request->email = auth()->user()->email;
        $request->pno = auth()->user()->phoneNo;
        $request->property_url = request('path');

        $user = User::find(request('owner'));
        \Mail::to($user->email)->send(new ContactMail($request));
        
        Alert::success('Your message has been sent successfully!', 'Message Sent')->autoclose(3000);

        return back();
    }

    public function contactOffersOwnerSend(Request $request){
        
        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:2500|min:10'
        ]);

        if ($validator->fails()) {

            Alert::error('Please check your inputs and correct the following errors', 'Invalid Attempt')->autoclose(3000);
            return back()->withErrors($validator);
        }
        
        $message = new UserEmail;
        $message->receiver_id = request('owner');
        $message->sender_id = auth()->user()->id;
        $message->senderMail = auth()->user()->email;
        $message->senderName = auth()->user()->name;
        $message->phoneNo = auth()->user()->phoneNo;
        $message->subject = request('subject');
        $message->message = request('message');
        $message->property_url = request('path');
        $message->save();

        $request->name = auth()->user()->name;
        $request->email = auth()->user()->email;
        $request->pno = auth()->user()->phoneNo;
        $request->property_url = request('path');

        $user = User::find(request('owner'));
        \Mail::to($user->email)->send(new ContactMail($request));
        
        Alert::success('Your message has been sent successfully!', 'Message Sent')->autoclose(3000);

        return back();
    }
}
