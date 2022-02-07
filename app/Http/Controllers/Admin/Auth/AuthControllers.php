<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AuthControllers extends Controller
{

    use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    // public function __construct()
    // {
    //     $this->middleware('guest:admin')->except('postLogout');
    // }

    public function getLogin()
    {
        return view('admin.auth.login');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (auth()->guard('admin')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect(route('admin.dashboard'));
        } else {
            $this->incrementLoginAttempts($request);

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);
        }
    }

    public function postLogout()
    {
        auth()->guard('admin')->logout();
        session()->flush();

        return redirect()->route('adminlogin');
    }
}
