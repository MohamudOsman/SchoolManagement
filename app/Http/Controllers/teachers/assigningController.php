<?php

namespace App\Http\Controllers\teachers;

use App\Http\Controllers\Controller;
use App\Models\teacher;
use GuzzleHttp\Psr7\Request;


class assigningController extends Controller
{

    public function __construct()
    {

        $this->middleware(['AdminAuth:admin', 'GuidedAuth']);
    }

    public function index()
    {
        $teachers = teacher::all();
        $sections = sections::all();
        $subjects = subject::all();
        $classes = classes::all();
        return view('pages.Teacher.Assigning', compact('teachers', 'sections', 'subjects', 'classes'));
    }

    public function store(Request $request)
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
