<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfileImage;
use App\Models\Admin\ImageAccess;
use Illuminate\Support\Facades\Auth;
use App\User;

class ImageReqReceiveController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $receive_image_requests = ImageAccess::where('img_req_to_user', Auth::user()->id)->get();
        return view('author.image_access.receive_image_request', compact('receive_image_requests'));
    }

    public function create()
    {
        return view('author.preference.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'img_req_from_user' => 'required',
            'img_req_to_user' => 'required',
        ]);

        $user_froms = ImageAccess::where('img_req_from_user', $request->img_req_from_user)->get();

        foreach ($user_froms as $user_from) {
            if ($user_from->img_req_to_user == $request->img_req_to_user) {
                return back()->with('message', 'Already Image Request Sent');
            }
        }
        $ImageAccess = new ImageAccess();
        $ImageAccess->img_req_from_user = $request->img_req_from_user;
        $ImageAccess->img_req_to_user = $request->img_req_to_user;
        $ImageAccess->save();
        return back()->with('message', 'Image Request Sent Successfully.');
    }


    public function imageAccessApproved(Request $request) {}

    public function show($id)
    {
        $ImageAccess = ImageAccess::find($id);
        $ImageAccess->approved = 1;
        $ImageAccess->declined = 0;
        $ImageAccess->save();
        return back()->with('message', 'Image Request Approved Successfully.');
    }

    public function edit($id)
    {

        $ImageAccess = ImageAccess::find($id);
        $ImageAccess->declined = 1;
        $ImageAccess->approved = 0;
        $ImageAccess->save();
        return back()->with('message', 'Image Request Declined Successfully.');
    }

    public function update(Request $request, $id) {}



    public function destroy($id)
    {
        $ImageAccess = ImageAccess::find($id);
        $ImageAccess->delete();
        return back()->with('message', 'Image Request Deleted Successfully.');
    }
}
