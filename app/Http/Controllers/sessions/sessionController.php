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

    public function index()
    {
        $classes = classes::all();
        return view('pages.schedules.schedules', compact('classes'));
    }

    public function show($classes_id)
    {
        $class = classes::findOrFail($classes_id);
        $sections = sections::where('class_id', $classes_id)->get();
        $subjects = $class->subjects;
        $teachers = $class->teachers;
        return view('pages.schedules.create', compact('subjects', 'sections', 'teachers'));
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
        $sessions = session::where('section_id', $id)->get()->sortBy('day')->sortBy('number');
        return view('', compact('sessions'));
    }

    public function searchByTeacher($id)
    {
        $sessions1 = session::where('teacher_id', $id)->andwhere('day', 1)->get()->sortBy('number');
        $sessions2 = session::where('teacher_id', $id)->andwhere('day', 2)->get()->sortBy('number');
        $sessions3 = session::where('teacher_id', $id)->andwhere('day', 3)->get()->sortBy('number');
        $sessions4 = session::where('teacher_id', $id)->andwhere('day', 4)->get()->sortBy('number');
        $sessions5 = session::where('teacher_id', $id)->andwhere('day', 5)->get()->sortBy('number');

        return view('', compact('sessions1', 'sessions2', 'sessions3', 'sessions4', 'sessions5'));
    }
}
