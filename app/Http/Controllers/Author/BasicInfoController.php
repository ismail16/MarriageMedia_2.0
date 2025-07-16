<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\PersonalInfo;
use App\Models\UserProfileImage;
use App\Models\Preference;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


class BasicInfoController extends Controller
{

    public function index()
    {
        // $user = Auth::guard('user'); // Use the correct guard
        // return view('author.basic_info.index',  compact('user'));

        $user = Auth::user();
        return view('author.basic_info.index', compact('user'));
    }

    public function my_biodata($id)
    {

        $user = Auth::user();

        // $PInfo =  PersonalInfo::where('user_id', $user->id)->first();
        $UPImage = UserProfileImage::where('user_id', $user->id)->first();
        $Preference =  Preference::where('user_id', $user->id)->first();

        if ($UPImage) {
            $UserProfileImage = $UPImage;
        } else {
            $UserProfileImage = null;
        }
        // return $Preference;
        return view('author.basic_info.my_biodata', compact('user', 'UserProfileImage', 'Preference'));
    }

    public function downloadBiodata($id)
    {
        $user = Auth::user();

        // $PInfo =  PersonalInfo::where('user_id', $user->id)->first();
        $UPImage = UserProfileImage::where('user_id', $user->id)->first();
        $Preference =  Preference::where('user_id', $user->id)->first();

        if ($UPImage) {
            $UserProfileImage = $UPImage;
        } else {
            $UserProfileImage = null;
        }


        $pdf = Pdf::loadView('author.basic_info.my_biodata_download', compact('user', 'UserProfileImage', 'Preference'));
        return $pdf->stream();
        // return $pdf->download('invoice.pdf');
    }



    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id) {}

    public function edit($id)
    {
        $user = Auth::user();
        return view('author.basic_info.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|string|unique:users,email,' . $user->id,
            'mobile' => 'required|unique:users,mobile,' . $user->id,
            'gender' => 'required',
            'marital_status' => 'required',
            'profession' => 'required',
            'country' => 'required',
            'district' => 'required',
            'birthday' => 'required',
            'createdby' => 'required',
            'religion' => 'required',
            'looking_for' => 'required',
        ]);

        $user->first_name  = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->mobile  = $request->mobile;
        $user->email  = $request->email;
        $user->gender  = $request->gender;
        $user->marital_status  = $request->marital_status;
        $user->profession  = $request->profession;
        $user->country  = $request->country;
        $user->district  = $request->district;
        $user->birthday  = $request->birthday;
        $user->guardian_mobile  = $request->guardian_mobile;
        $user->createdby  = $request->createdby;
        $user->religion  = $request->religion;
        $user->social_order  = $request->social_order;
        $user->looking_for  = $request->looking_for;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('member.basic-info.index')->with('message', 'Basic Information Update Successfully.');
    }

    public function destroy($id)
    {
        //
    }
}
