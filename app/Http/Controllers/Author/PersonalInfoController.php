<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Admin\PersonalInfo;
// use App\Http\Traits\UserPersonalInfoTrait;

class PersonalInfoController extends Controller
{
    // use UserPersonalInfoTrait;

    public function index()
    {
        $user = Auth::user();
        $PersonalInfo =  PersonalInfo::where('user_id', $user->id)->first();
        return view('author.personal_info.show', compact('user', 'PersonalInfo'));
    }

    public function create()
    {
        return view('author.personal_info.create');
    }

    public function store(Request $request)
    {

        $this->SaveUserPersonalInfo($request);
        return redirect()->route('member.personal-info.index')->with('message', 'Personal Information Save Successfully.');
    }

    public function show($id) {}

    public function edit($id)
    {
        $PersonalInfo =  PersonalInfo::find($id);
        return view('author.personal_info.edit', compact('PersonalInfo'));
    }

    public function update(Request $request, $id)
    {

        $this->UpdateUserPersonalInfo($request, $id);
        return redirect()->route('member.personal-info.index')->with('message', 'Personal Information Update Successfully.');
    }

    public function destroy($id)
    {
        //
    }
}
