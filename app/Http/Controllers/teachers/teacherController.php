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

    public function __construct()
    {

        //$this->middleware(['AdminAuth:admin','TeacherAuth']);

    }

    public function index()
    {
        $teachers = teacher::all();
        $certificates = certificate::all();
        $subjects = subject::all();
        return view('pages.Teacher.Teacher', compact('teachers', 'certificates', 'subjects'));
    }

    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->password = Hash::make($request->Password);
            $user->email = $request->email;
            $user->type = 2;
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
            $teacher->subject()->attach($request->subject_id);
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
            if (isset($request->password)) {
                $user = User::findorfail($request->user_id);
                $user->password = $request->password;
            }


            if (isset($request->certificate_id)) {
                $teacher->certificate()->sync($request->certificate_id);
            } else {
                $teacher->certificate()->sync(array());
            }


            if (isset($request->subject_id)) {
                $teacher->certificate()->sync($request->subject_id);
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

    public function assigning()
    {
        $teachers = teacher::all();
        $sections = sections::all();
        $subjects = subject::all();
        $classes = classes::all();
        return view('pages.Teacher.Assigning', compact('teachers', 'sections', 'subjects', 'classes'));
    }


    public function save_assigning(Request $request)
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



    public function edit($id)
    {
        $teacher = teacher::findorfail($id);
        $certificates = certificate::all();
        $subjects = subject::all();
        return view('pages.Teacher.edit', compact('teacher', 'certificates', 'subjects'));
    }
    public function create()
    {

        $certificates = certificate::all();
        $subjects = subject::all();
        return view('pages.Teacher.create', compact('certificates', 'subjects'));
    }

    public function searchBySection($id)
    {
    }


    public function searchByYear($id)
    {
    }
}
