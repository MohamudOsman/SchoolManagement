<?php

namespace App\Http\Controllers\parents;

use App\Models\my_parent;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class parentController extends Controller
{

    public function __construct()
    {

        //$this->middleware('TeacherAuth')->except(['logout', 'showLoginForm', 'adminlogin']);
    }

    public function index()
    {
        $parent = my_parent::all();
        return view('pages.Parent.Parent', compact('parent'));
    }


    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->father_name;
            $user->password = Hash::make($request->parent_Password);
            $user->email = $request->parent_email;
            $user->save();

            $my_parent = new my_parent();

            $my_parent->father_name = $request->father_name;
            $my_parent->mother_name = $request->mother_name;
            $my_parent->father_phone = $request->father_phone;
            $my_parent->mother_phone = $request->mother_phone;
            $my_parent->parent_email = $request->parent_email;
            $email = $request->parent_email;
            $users = User::where('email', 'like', $email)->get();
            $my_parent->user_id = $users[0]->id;
            $my_parent->save();
            return redirect()->route('Parent.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {

        try {


            $parent = my_parent::findOrFail($request->id);
            $parent->update([
                $parent->father_name = $request->father_name,
                $parent->mother_name = $request->mother_name,
                $parent->father_phone = $request->father_phone,
                $parent->mother_phone = $request->mother_phone,
                $parent->parent_email = $request->parent_email,
            ]);
            return redirect()->route('Parent.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {

        $parent = my_parent::findOrFail($request->id)->delete();
        return redirect()->route('Parent.index');
    }
}
