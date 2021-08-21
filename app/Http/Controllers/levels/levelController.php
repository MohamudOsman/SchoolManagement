<?php

namespace App\Http\Controllers\levels;

use App\Http\Requests\StoreLevels;
use App\Models\level;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class levelController extends Controller
{
    // return all levels

    public function index()
    {

        $Levels = level::all();
        return view('pages.Levels.Levels', compact('Levels'));
    }

    // insert new level to database

    public function store(StoreLevels $request)
    {
        try {
            $validated = $request->validated();
            $level = new level();
            $level->name = $request->name;
            $level->note = $request->note;
            $level->save();
            return redirect()->route('Levels.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(StoreLevels $request)
    {
        try {
            $validated = $request->validated();
            $level = level::findOrFail($request->id);
            $level->update([
                $level->name = $request->name,
                $level->note = $request->note,
            ]);
            return redirect()->route('Levels.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        $level = level::findOrFail($request->id)->delete();

        return redirect()->route('Levels.index');
    }
}
