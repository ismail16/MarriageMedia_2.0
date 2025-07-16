<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Admin\PrivateMessages;

class RecieveMessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $receive_messages =  PrivateMessages::where('to_id', $user->id)->orderBy('id', 'desc')->get();
        return view('author.receive_message.index', compact('receive_messages'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'to_id' => 'required',
            'from_id' => 'required',
            'message' => 'required',
        ]);

        $user = Auth::user();
        $PrivateMessages = new PrivateMessages;

        $PrivateMessages->from_id = $user->id;
        $PrivateMessages->to_id = $request->to_id;
        $PrivateMessages->subject = $request->subject;
        $PrivateMessages->message = $request->message;
        $PrivateMessages->status = 0;

        $PrivateMessages->save();
        return back();
    }


    public function show($id)
    {
        $user = Auth::user();
        $receive_message =  PrivateMessages::find($id);
        $receive_message->opened = 1;
        $receive_message->save();
        $sent_from = User::where('id', $receive_message->from_id)->first();
        return view('author.receive_message.show', compact('user', 'sent_from', 'receive_message'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $receive_message =  PrivateMessages::find($id);
        $receive_message->delete();
        return back()->with('message', 'Deleted Message Successfully.');
    }
}
