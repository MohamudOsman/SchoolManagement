<?php

namespace App\Http\Controllers\teachers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{

    public function index()
    {

        $user = User::findorfail($request->id);
        return view('pages.users.index', compact('user'));
    }



    public function update(Request $request)
    {

        try {
            $user = User::findorfail($request->id);
            $user->name = $request->name;
            if (isset($request->password)) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            return redirect()->route('User.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
    }
}
