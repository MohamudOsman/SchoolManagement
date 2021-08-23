<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AdminAuth\AdminRegisterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminAuth:admin');
    }

    public function showRegisterForm()
    {
        return view('AdminAuth.register');
    }

    public function adminRegister(AdminRegisterRequest $request)
    {


        $request['password'] = Hash::make($request->password);
        Admin::create($request->all());

        return redirect()->intended(route('admin.home'));
    }
}
