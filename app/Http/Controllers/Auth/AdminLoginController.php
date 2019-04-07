<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('admin.adminlogin');
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     $this->username() => 'required|string',
        //     'password' => 'required|string',
        //     // 'g-recaptcha-response' => 'required|recaptcha',
        // ]);

        // $this->validate($request, [
        //     'email' => 'required|max:255|email',
        //     'password' => 'required',
        // ]);

        $this->validateLogin($request);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended((route('admin.dashboard')));
        }

        // return redirect()->back()->withInput($request->only('email', 'remember'));
        // return $this->guard()->attempt(
        //     $this->credentials($request), $request->filled('remember')
        // );
        return $this->sendFailedLoginResponse($request);
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|email',
            'password' => 'required|string',
            // 'g-recaptcha-response' => 'required|recaptcha',
        ]);
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
    public function username()
    {
        return 'email';
    }
}
