<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\classes;
use App\Models\promotion;
use App\Models\sections;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    public function __construct()
    {

        $this->middleware('AdminAuth:admin');
    }

    public function index()
    {
        $promotions = promotion::all();
        $classes = classes::all();
        return view('pages.Student.promotion.index', compact('promotions'));
    }


    public function create()
    {
        $sections = sections::all();
        $classes = classes::all();
        return view('pages.Student.promotion.create', compact('sections', 'classes'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $students = student::where('class_id', $request->class_id)->where('section_id', $request->section_id)->where('academic_year', $request->academic_year)->get();

            if ($students->count() < 1) {
                return redirect()->back()->with('error_promotions', __(''));
            }

            // update in table student
            foreach ($students as $student) {

                $ids = explode(',', $student->id);
                student::whereIn('id', $ids)
                    ->update([
                        'class_id' => $request->new_class_id,
                        'section_id' => $request->new_section_id,
                        'academic_year' => $request->academic_year_new,
                    ]);

                // insert in to promotions
                Promotion::updateOrCreate([
                    'student_id' => $student->id,
                    'from_class' => $request->class_id,
                    'from_section' => $request->section_id,
                    'to_class' => $request->new_class_id,
                    'to_section' => $request->new_section_id,
                    'academic_year' => $request->academic_year,
                    'academic_year_new' => $request->academic_year_new,
                ]);
            }
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        return $this->Promotion->destroy($request);
    }
}
