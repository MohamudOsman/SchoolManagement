<?php

namespace App\Http\Controllers\teachers;

use App\Models\teacher;
use App\Models\certificate;
use App\Models\User;
use App\Models\subject;
use App\Models\sections;
use App\Models\classes;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class teacherController extends Controller
{

    public function index()
    {
        $teachers = teacher::all();
        $certificates = certificate::all();
        return view('pages.Teacher.Teacher', compact('teachers', 'certificates'));
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->password = Hash::make($request->Password);
            $user->email = $request->email;
            $user->save();


            $teacher = new teacher();
            $teacher->name = $request->name;
            $teacher->phone = $request->phone;
            $teacher->email = $request->email;
            $teacher->gender = $request->gender;
            $teacher->date_of_birth = $request->date_of_birth;
            $teacher->Address = $request->Address;

            $email = $request->email;
            $users = User::where('email', 'like', $email)->get();
            $teacher->user_id = $users[0]->id;

            $teacher->save();
            $teacher->certificate()->attach($request->certificate_id);
            return redirect()->route('Teacher.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {

        try {
            $teacher = teacher::findorfail($request->id);
            $teacher->name = $request->name;
            $teacher->user_id = $request->user_id;
            $teacher->phone = $request->phone;
            $teacher->email = $request->email;
            $teacher->gender = $request->gender;
            $teacher->date_of_birth = $request->date_of_birth;

            if (isset($request->certificate_id)) {
                $teacher->certificate()->sync($request->certificate_id);
            } else {
                $teacher->certificate()->sync(array());
            }
            $teacher->save();
            return redirect()->route('Teacher.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {

        $teacher = teacher::findOrFail($request->id)->delete();
        return redirect()->route('Teacher.index');
    }

    public function create()
    {
        $teachers = teacher::all();
        $sections = sections::all();
        $subjects = subject::all();
        $classes = classes::all();
        return view('pages.Teacher.assigning', compact('teachers', 'sections', 'subjects', 'classes'));
    }


    public function show(Request $request)
    {


        try {
            $teacher = teacher::findorfail($request->teacher_id);
            $teacher->section()->attach($request->section_id);
            $teacher->classes()->attach($request->classes_id);
            $teacher->subject()->attach($request->subject_id);
            return view('empty');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
