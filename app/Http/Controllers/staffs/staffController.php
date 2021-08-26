<?php

namespace App\Http\Controllers\staffs;

use App\Models\staff;
use App\Models\certificate;
use App\Models\User;
use App\Models\subject;
use App\Models\sections;
use App\Models\classes;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class staffController extends Controller
{

    public function index()
    {
        $staffs = staff::all()->sortBy('name');
        $certificates = certificate::all()->sortBy('name');
        return view('pages.Staff.Staff', compact('staffs', 'certificates'));
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->password = Hash::make($request->Password);
            $user->email = $request->email;
            $user->type = 5;
            $user->save();


            $staff = new staff();
            $staff->name = $request->name;
            $staff->phone = $request->phone;
            $staff->email = $request->email;
            $staff->gender = $request->gender;
            $staff->date_of_birth = $request->date_of_birth;
            $staff->Address = $request->Address;

            $email = $request->email;
            $users = User::where('email', 'like', $email)->get();
            $staff->user_id = $users[0]->id;

            $staff->save();
            $staff->certificate()->attach($request->certificate_id);
            return redirect()->route('Staff.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {

        try {

            $staff = staff::findorfail($request->id);
            $staff->update([
                $staff->name = $request->name,
                $staff->user_id = $request->user_id,
                $staff->phone = $request->phone,
                $staff->email = $request->email,
                $staff->gender = $request->gender,
                $staff->date_of_birth = $request->date_of_birth,
            ]);
            if (isset($request->certificate_id)) {
                $staff->certificate()->sync($request->certificate_id);
            } else {
                $staff->certificate()->sync(array());
            }

            if (isset($request->password)) {
                $user = User::findorfail($request->user_id);
                $user->password = $request->password;
            }

            return redirect()->route('Staff.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {

        $staff = staff::findOrFail($request->id)->delete();
        return redirect()->route('Staff.index');
    }







    public function edit($id)
    {
        $staff = staff::findorfail($id);
        $certificates = certificate::all()->sortBy('name');
        return view('pages.Staff.edit', compact('staff', 'certificates'));
    }


    public function create()
    {

        $certificates = certificate::all()->sortBy('name');
        return view('pages.Staff.create', compact('certificates'));
    }
}
