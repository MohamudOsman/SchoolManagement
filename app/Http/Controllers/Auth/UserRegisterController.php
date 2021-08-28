<?php

namespace App\Http\Controllers\Auth;


use App\Http\Requests\UserAuth\UserRegisterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    public function __construct()
    {
        //$this->middleware('AdminAuth:admin');
    }

    public function showRegisterForm()
    {
        return view('UserAuth.register');
    }

    public function UserRegister(UserRegisterRequest $request)
    {


        $request['password'] = Hash::make($request->password);
        User::create($request->all());
        if($request->optradio==2){
            return redirect()->intended(route('Teacher.home'));
        }else if($request->optradio==3){
            return redirect()->intended(route('Parent.home'));
        }else if($request->optradio==4){
            return redirect()->intended(route('Student.home'));
        }else if($request->optradio==5){
            return redirect()->intended(route('Accountant.home'));
        }else if($request->optradio==6){
            return redirect()->intended(route('Driver.home'));
        }else if($request->optradio==7){
            return redirect()->intended(route('Guided.home'));
        }else if($request->optradio==8){
            return redirect()->intended(route('Librarian.home'));
        }else if($request->optradio==9){
            return redirect()->intended(route('Receptionist.home'));
        }
        return redirect()->intended(route('home'));
    }
}
