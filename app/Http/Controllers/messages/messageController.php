<?php

namespace App\Http\Controllers\messages;

use App\Http\Requests\storeMessage;
use App\Models\message;
use App\Models\level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class messageController extends Controller
{
    public function index()
    {

        $Levels = level::all()->sortBy('name');
        $messages = message::all();
        return view('pages.Messages.Messages', compact('Levels', 'messages'));
    }

    // insert new level to database

    public function store(storeMessage $request)
    {
        try {
            $validated = $request->validated();
            $message = new message();
            $message->from = $request->from;
            $message->to = $request->to;
            $message->message = $request->message;
            $message->save();
            return redirect()->route('messages.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(storeMessage $request)
    {
        try {
            $validated = $request->validated();
            $message = message::findOrFail($request->id);
            $message->update([
                $message->from = $request->from,
                $message->to = $request->to,
                $message->message = $request->message,
            ]);
            return redirect()->route('messages.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        $message = message::findOrFail($request->id)->delete();

        return redirect()->route('messages.index');
    }


    public function sent($from)
    {
        $messages = message::where('from', $from)->get();
        return view('', compact('messages'));
    }


    public function incoming($to)
    {

        $messages = message::where('to', $to)->get();
        return view('', compact('messages'));
    }
}
