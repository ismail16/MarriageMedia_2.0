<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\PersonalInfo;
use App\Models\Admin\PrivateMessages;

class DashboardController extends Controller
{

    public function index()
    {
        // $user = Auth::user();

        // dd($user);
        // $receive_messages =  PrivateMessages::where('to_id', $user->id)->orderBy('id', 'desc')->get();
        // $sent_messages =  PrivateMessages::where('from_id', $user->id)->orderBy('id', 'desc')->get();
        return view('author.dashboard');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

    public function destroy($id)
    {
        //
    }
}
