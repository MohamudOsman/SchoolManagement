<?php

namespace App\Http\Controllers\messages;

use App\Http\Requests\storeMessage;
use App\Models\message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class messageController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth'],['AdminAuth:admin']);
        /*if(Auth::guest()->check()){
            $this->middleware(['auth','AdminAuth:admin']);
        }*/
    }

    public function get_guard()
    {
        if (Auth::guard('admin')->check()) {
            return 'admin';
        } elseif (Auth::guard('web')->check()) {
            return 'web';
        }
    }

    public function index()
    {

        $id = Auth::guard($this->get_guard())->id();
        $sentmessages = message::where('from', $id)->get();
        $incomingmessages = message::where('to', $id)->get();
        return view('pages.Messages.Messages', compact('sentmessages', 'incomingmessages'));
    }

    public function store(storeMessage $request)
    {
        try {
            $validated = $request->validated();
            $message = new message();
            $message->from = Auth::guard($this->get_guard())->id();
            $name = $request->name;
            $user = User::where('name', 'like', $name)->get();
            $message->to = $user->id;
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

        $incomingmessages = message::where('to', $to)->get();
        return view('', compact('messages'));
    }
}
