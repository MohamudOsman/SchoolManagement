<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuth\AdminLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
//use Auth;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    public function __construct()
    {
       // $this->middleware('guest')->except('logout');
        //$this->middleware('guest:admin')->except('logout');
        $this->middleware('AdminAuth:admin')->except(['logout','showLoginForm','adminlogin']);

    }

    public function index(){
        return "Hello Admin";
    }

    public function create(){

    }

    public function store(){

    }



    public function showLoginForm(){

        if(Auth::guard('admin')->check()){
            return redirect()->guest(route( 'admin.home' ));
        }

        return view('AdminAuth\login');
    }

    public function adminlogin(AdminLoginRequest $request){



        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){

                return redirect()->intended('/admin');
            }
            return back()->withInput($request->only('email'))
                ->with(['message' =>'Invalid Email or password']);
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect()->guest(route( 'admin.login' ));

    }

}
