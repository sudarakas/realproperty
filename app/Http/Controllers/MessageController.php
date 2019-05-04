<?php

namespace App\Http\Controllers;

use App\Mail\InqueryEmail;
use App\Message;
use Illuminate\Http\Request;
use App\UserEmail;
use App\Mail\ContactMail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function contactUsEmail()
    {
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'type' => 'required',
            'message' => 'required|string|max:2500|min:10'
        ]);
        
        $message = Message::create([
            'name' => request('name'),
            'email' => request('email'),
            'type' => request('type'),
            'message' => request('message')
        ]);

        if(strcmp("General Inquery", request('type')) == 0){
            \Mail::to('general@realproperty.lk')->send(new InqueryEmail($message));
        }
        elseif(strcmp("Technical Inquery", request('type')) == 0){
            \Mail::to('technical@realproperty.lk')->send(new InqueryEmail($message));
        }
        else{
            \Mail::to('service@realproperty.lk')->send(new InqueryEmail($message));
        }
        
        return back();
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
