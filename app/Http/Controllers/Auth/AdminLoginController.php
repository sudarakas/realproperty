<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
        return view('admin.adminlogin');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            // 'g-recaptcha-response' => 'required|recaptcha',
        ]);
        
        if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password], $request->remember)){
            return redirect()->intended((route('admin.dashboard')));
        }

        return redirect()->back()->withInput($request->only('email','remember'));
        // return $this->guard()->attempt(
        //     $this->credentials($request), $request->filled('remember')
        // );
    }
}
