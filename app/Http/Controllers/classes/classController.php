<?php

namespace App\Http\Controllers\classes;

use App\Http\Requests\storeClass;
use App\Models\classes;
use App\Models\level;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class classController extends Controller
{
    public function __construct()
    {

        $this->middleware('AdminAuth:admin');
    }


    public function index()
    {
        $classes = classes::all()->sortBy('name');
        $Levels = level::all()->sortBy('name');
        return view('pages.Class.Class', compact('classes', 'Levels'));
    }

    public function store(storeClass $request)
    {
        try {
            $validated = $request->validated();
            $class = new classes();
            $class->name = $request->name;
            $class->level_id = $request->level_id;
            $class->note = $request->note;
            $class->save();
            return redirect()->route('Class.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            $class = classes::findorfail($request->id);
            $class->update([
                $class->name = $request->name,
                $class->level_id = $request->level_id,
                $class->note = $request->note,
            ]);
            return redirect()->route('Class.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {

        $Class = classes::findOrFail($request->id)->delete();
        return redirect()->route('Class.index');
    }
}
