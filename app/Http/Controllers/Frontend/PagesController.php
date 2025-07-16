<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Contact;
use App\Models\Proposal;
use App\Models\Preference;
use App\Models\ImageAccess;
use App\Models\PackagePrice;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use App\Models\UserProfileImage;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function index()
    {

        // dd(Auth::user()->role);

        $users = User::where('role_id', 2)->get();
        $grooms = User::where('role_id', 2)->where('looking_for', 'Bride')->where('activation', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        $brides = User::where('role_id', 2)->where('looking_for', 'Groom')->where('activation', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        $success_stories = SuccessStory::where('status', 1)->get();
        $package_prices = PackagePrice::where('status', 1)->get();

        return view('frontend.pages.index', compact('users', 'grooms', 'brides', 'success_stories', 'package_prices'));
    }

    public function grooms()
    {
        $grooms = User::where('role_id', 2)->where('looking_for', 'Bride')->where('activation', 1)->where('status', 1)->orderBy('id', 'DESC')->paginate(5);
        return view('frontend.pages.grooms', compact('grooms'));
    }

    public function brides()
    {
        $brides = User::where('role_id', 2)->where('looking_for', 'Groom')->where('activation', 1)->where('status', 1)->orderBy('id', 'DESC')->paginate(5);
        return view('frontend.pages.brides', compact('brides'));
    }

    public function single_groom_bride($id)
    {
        if (Auth::check()) {
            $user = User::where('u_id', $id)->first();
            if (Auth::check()) {
                $ImageAccess = ImageAccess::where('img_req_from_user', Auth::user()->id)->where('img_req_to_user', $user->id)->where('approved', 1)->first();
            } else {
                $ImageAccess = null;
            }
            if (Auth::check()) {
                $receive_pro = Proposal::where('receive_proposal_user', Auth::user()->id)->where('sent_proposal_user', $user->id)->first();
            } else {
                $receive_pro = null;
            }
            // if(Auth::check()){
            //     $receive_message = ImageAccess::where('img_req_from_user', Auth::user()->id)->where('img_req_to_user', $user->id)->where('approved', 1)->first();
            // }else{
            //     $receive_message = null;
            // }

            $preference = Preference::where('user_id', $user->id)->first();
            $ProfileImg = UserProfileImage::where('user_id', $user->id)->where('profile_image', 1)->first();

            // return $ImageAccess;
            return view('frontend.pages.single_groom_bride', compact('user', 'preference', 'ProfileImg', 'ImageAccess', 'receive_pro'));
        } else {
            //redirect back and call modal mymodal
            return redirect()->back()->with('message', 'Please Login First');
        }
    }

    public function single_groom_bride_gallary($id)
    {
        $user = User::find($id);
        $images = UserProfileImage::where('user_id', $id)->get();
        return view('frontend.pages.single_groom_bride_gallary', compact('user', 'images'));
    }

    public function search_groom_bride(Request $request)
    {
        if (Auth::check()) {
            // return $request;
            $looking_for = $request->looking_for;
            $birthday = $request->birthday;
            $marital_status = $request->marital_status;
            $religion = $request->religion;
            $profession = $request->profession;

            // explode the range and set as follows
            $minAge = $request->minAge;
            $maxAge = $request->maxAge;

            // prepare dates for comparison
            $minDate = Carbon::today()->subYears($maxAge); // make sure to use Carbon\Carbon in the class
            $maxDate = Carbon::today()->subYears($minAge)->endOfDay();
            $search_results = User::orderByDesc('id')
                ->Where('looking_for', 'LIKE', '%' . $looking_for . '%')
                ->Where('religion', 'LIKE', '%' . $religion . '%')
                ->Where(function ($query) use ($profession) {
                    $query->where('profession', 'LIKE', '%' . $profession . '%')
                        ->orWhere('profession', 'LIKE', '%' . $profession . '%');
                })
                ->Where([
                    ['status', 1]
                ])
                ->where('activation', 1)
                ->where('marital_status', $marital_status)
                ->Where([
                    ['role_id', 2]
                ])
                ->whereBetween('birthday', [$minDate, $maxDate])
                ->orderBy('id', 'DESC')->paginate(5);
            $search_results->appends(array(
                'profession' => $profession
            ));

            return view('frontend.pages.search_result_groom_bride', compact('search_results'));
        } else {
            return redirect()->back()->with('message', 'Please Login First');
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function profileCreate(Request $request)
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

    public function about_us()
    {
        return view('frontend.pages.about_us');
    }

    public function terms_conditions()
    {
        return view('frontend.pages.terms_conditions');
    }

    public function privacy_policy()
    {
        return view('frontend.pages.privacy_policy');
    }

    public function contact_us()
    {
        return view('frontend.pages.contact_us');
    }

    public function contact_us_post(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $Contact = new Contact;
        $Contact->name = $request->name;
        $Contact->email = $request->email;
        $Contact->subject = $request->subject;
        $Contact->message = $request->message;

        $Contact->save();
        return redirect()->route('contact_us')->with('message', 'Sent Your Message Successfully.');
    }

    public function how_use()
    {
        return view('frontend.pages.how_use');
    }

    public function verifying_user()
    {
        return view('mail.verification');
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


    public function test_mail()
    {

        return view('mail.test');

        // $user = User::where('id', 51)->first();
        // // return $user;
        // return Mail::to("ismail32cse@gmail.com")->queue(new VerificationMail($user));
    }

    public function test_mail_post(Request $request)
    {
        $user = User::where('verifyToken', '!=', null)->first();
        try {
            Mail::to($request->test_mail)->queue(new VerificationMail($user));
            return "mail sent successfully";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
