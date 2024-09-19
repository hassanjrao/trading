<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // redirect according to user role
    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard.index');
        } else {
            // if the previous page was requested by the user and it redirects to login page, then redirect to that page after login
            if ($request->session()->has('url.intended')) {
                return redirect()->intended();
            } else {
                return redirect()->route('profile.index');
            }
        }
    }
}
