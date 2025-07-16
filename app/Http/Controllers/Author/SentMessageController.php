<?php

namespace App\Http\Controllers\Author;

use App\Mail\SentMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Admin\PrivateMessages;

class SentMessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $sent_messages =  PrivateMessages::where('from_id', $user->id)->orderBy('id', 'desc')->get();
        return view('author.sent_message.index', compact('sent_messages'));
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
        $sent_to_user = User::find($request->to_id);
        $PrivateMessages = new PrivateMessages;

        $PrivateMessages->from_id = $user->id;
        $PrivateMessages->to_id = $request->to_id;
        $PrivateMessages->subject = $request->subject;
        $PrivateMessages->message = $request->message;
        $PrivateMessages->status = 0;


        try {
            $PrivateMessages->save();
            $msg = $PrivateMessages;

            Mail::to($sent_to_user->email)->queue(new SentMessage($user, $msg));

            return redirect()->route('single_groom_bride', $request->to_id)->with('message', 'Sent Your Message Successfully.');
        } catch (Exception $e) {
        }
    }


    public function show($id)
    {
        $user = Auth::user();
        $sent_message =  PrivateMessages::find($id);
        $sent_to = User::where('id', $sent_message->to_id)->first();
        return view('author.sent_message.show', compact('user', 'sent_to', 'sent_message'));
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
        $sent_message =  PrivateMessages::find($id);
        $sent_message->delete();
        return back()->with('message', 'Deleted Message Successfully.');
    }
}
