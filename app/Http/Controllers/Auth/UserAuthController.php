<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuth\UserLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
//use Auth;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        //$this->middleware('guest:admin')->except('logout');
        $this->middleware('auth')->except(['logout', 'showLoginForm', 'userlogin']);
    }

    public function index()
    {
        return view('empty');
    }

    public function create()
    {
    }

    public function store()
    {
    }



    public function showLoginForm()
    {

        if (Auth::guard()->check()) {
            return redirect()->guest(route('home'));
        }

        return view('UserAuth\login');
    }

    public function userlogin(UserLoginRequest $request)
    {


        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/');
        }
        return back()->withInput($request->only('email'))
            ->with(['message' => 'Invalid Email or password']);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect()->guest(route('login'));
    }
}
