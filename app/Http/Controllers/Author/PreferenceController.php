<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Preference;
use App\Http\Traits\PreferenceTrait;

class PreferenceController extends Controller
{
    use PreferenceTrait;

    public function index()
    {
        $user = Auth::user();
        $preference =  Preference::where('user_id', $user->id)->first();
        // return $preference;
        return view('author.preference.show', compact('preference'));
    }

    public function create()
    {
        return view('author.preference.create');
    }

    public function store(Request $request)
    {

        $this->SavePreference($request);
        return redirect()->route('member.preference.index')->with('message', 'Preference Save Successfully.');
    }

    public function show($id) {}

    public function edit($id)
    {
        $preference =  Preference::find($id);
        // $m_status = ($preference->marital_status);

        return view('author.preference.edit', compact('preference'));
    }

    public function update(Request $request, $id)
    {

        return $this->UpdatePreference($request, $id);
        return redirect()->route('member.preference.index')->with('message', 'Preference Update Successfully.');
    }

    public function destroy($id)
    {
        //
    }
}
