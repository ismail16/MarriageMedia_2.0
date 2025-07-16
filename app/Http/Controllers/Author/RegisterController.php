<?php

namespace App\Http\Controllers\Author;

use App\Mail\VerificationMail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use App\Models\ReferralList;
use Illuminate\Support\Facades\URL;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/member/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(Request $request)
    {
        $affcode = $request->affcode;
        if ($affcode) {
            $affUser = User::where('u_id', $affcode)->where('status', 1)->where('activation', 1)->first();
            if ($affUser == null || $affUser->role_id != 3  || $affUser->status == 0 || $affUser->activation == 0) {
                return redirect()->route('profile_create')->with('error', 'Invalid Referral Link');
            }
        }
        return view('auth.register', ['affcode' => $affcode]);
    }

    public function login()
    {
        return view('author.login');
    }

    public function member_store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'max:12', 'unique:users'],
            'gender' => 'required',
            'marital_status' => 'required',
            'profession' => 'required',
            'country_id' => 'required',
            'district_id' => 'required',
            'birthday' => 'required',
            'createdby' => 'required',
            'affcode' => 'nullable',
            'religion' => 'required',
            'looking_for' => 'required',
            'agreement' => 'required',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        // $image = $request->file('image');
        // $slug = str_slug($request->firstname);
        // if (isset($image)){
        //     $imagename = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        //     if (!file_exists('profile')){
        //         mkdir('profile', 0777, true);
        //     }

        //     $image->move('profile', $imagename);
        // }else{
        //     $imagename = 'default.png';
        // }

        // $date = date("dmy");
        // if (User::count() > 0) {
        //     $last_id_temp = User::all()->last()->id;
        // } else {
        //     $last_id_temp = 0;
        // }
        // $last_id = date("ym") + $last_id_temp + 1;

        $saveuser = User::create([
            'u_id'  => "BDM" . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT),
            'role_id'  => 2,
            'package_price_id'  => 1,
            'first_name'  => $request->first_name,
            'last_name'  => $request->last_name,
            'mobile'  => $request->mobile,
            'email'  => $request->email,
            'gender'  => $request->gender,
            'marital_status'  => $request->marital_status,
            'profession'  => $request->profession,
            'country_id'  => $request->country_id,
            'district_id'  => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'birthday'  => $request->birthday,
            'guardian_mobile'  => $request->guardian_mobile,
            'createdby'  => $request->createdby,
            'religion'  => $request->religion,
            'social_order'  => $request->social_order,
            'looking_for'  => $request->looking_for,
            'address'  => $request->address,
            'agreement'  => $request->agreement,
            'status'  => 0,
            'password' => Hash::make($request->password),
            'verifyToken' => Str::random(40),
        ]);

        $user = User::find($saveuser->id);
        $genderL = $user->gender == 'Female' ? 'F' : 'M';
        $user->u_id  = $genderL . rand(0, 9) . $user->id . rand(0, 9);
        $user->save();

        if ($request->affcode !== null && $saveuser) {
            $affUser = User::where('u_id', $request->affcode)->first();
            $referralList = new ReferralList();
            $referralList->affiliate_user_id = $affUser->id;
            $referralList->user_id = $saveuser->id;
            $referralList->save();
        }

        if ($saveuser) {

            Mail::to($saveuser->email)->queue(new VerificationMail($saveuser));
            // return view('mail.verification');
            return $saveuser;
        } else {
            return back();
        }
    }

    public function show($id)
    {
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

    public function verify($token)
    {
        //
    }
}
