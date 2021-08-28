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

        return redirect()->intended(route('app'));
    }
}
