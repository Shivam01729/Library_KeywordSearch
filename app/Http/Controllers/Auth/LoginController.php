<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Important

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // After successful login, show welcome popup
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended('/')->with('success', 'Welcome back, ' . $user->name . '!');
    }

    // After logout, show logout success popup
    protected function loggedOut(Request $request)
    {
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}
