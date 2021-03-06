<?php

namespace App\Http\Controllers\sessions;

use App\Http\Requests\storeSession;
use App\Models\classes;
use App\Models\teacher;
use App\Models\sections;
use App\Models\session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class sessionController extends Controller
{

    public function __construct()
    {

        $this->middleware('AdminAuth:admin');
        $this->middleware(['StudentAuth', 'ParentsAuth', 'TeacherAuth'])->only(['searchBySection', 'searchByTeacher']);
    }

    public function index()
    {
        $classes = classes::all();
        return view('pages.schedules.schedules', compact('classes'));
    }

    public function create(Request $request)
    {
        try {
            $classes_id = $request;
            $class = classes::findorfail($classes_id);
            $sections = sections::where('class_id', $classes_id)->get('*');
            $subjects = $class->subjects;
            $teachers = $class->teachers;
            return view('pages.schedules.create', compact('subjects', 'sections', 'teachers'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function store(storeSession $request)
    {
        try {
            $validated = $request->validated();
            $session = new session();
            $session->number = $request->number;
            $session->day = $request->day;
            $session->teacher_id = $request->teacher_id;
            $session->subject_id = $request->subject_id;
            $session->section_id = $request->section_id;
            $session->save();
            return redirect()->route('Sessions.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(storeSession $request)
    {
        try {
            $validated = $request->validated();
            $session = session::findorFail($request->id);
            $session->update([
                $session->teacher_id = $request->teacher_id,
                $session->subject_id = $request->subject_id,
            ]);
            return redirect()->route('Sessions.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        $session = session::findOrFail($request->id)->delete();

        return redirect()->route('Sessions.index');
    }


    public function searchBySection($id)
    {
        $sessions1 = session::where('section_id', $id)->where('day', 1)->get('*')->sortBy('number');
        $sessions2 = session::where('section_id', $id)->where('day', 2)->get('*')->sortBy('number');
        $sessions3 = session::where('section_id', $id)->where('day', 3)->get('*')->sortBy('number');
        $sessions4 = session::where('section_id', $id)->where('day', 4)->get('*')->sortBy('number');
        $sessions5 = session::where('section_id', $id)->where('day', 5)->get('*')->sortBy('number');
        return view('pages.schedules.show', compact('sessions1', 'sessions2', 'sessions3', 'sessions4', 'sessions5'));
    }

    public function searchByTeacher($id)
    {
        $sessions1 = session::where('teacher_id', $id)->where('day', 1)->get('*')->sortBy('number');
        $sessions2 = session::where('teacher_id', $id)->where('day', 2)->get('*')->sortBy('number');
        $sessions3 = session::where('teacher_id', $id)->where('day', 3)->get('*')->sortBy('number');
        $sessions4 = session::where('teacher_id', $id)->where('day', 4)->get('*')->sortBy('number');
        $sessions5 = session::where('teacher_id', $id)->where('day', 5)->get('*')->sortBy('number');

        return view('pages.schedules.show', compact('sessions1', 'sessions2', 'sessions3', 'sessions4', 'sessions5'));
    }
}
