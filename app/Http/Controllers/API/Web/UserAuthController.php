<?php

namespace App\Http\Controllers\API\Web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\Web\UserAuthInterface;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Controllers\Controller as Controller;

class UserAuthController extends Controller
{
    private $UserAuthRepository;

    public function __construct(UserAuthInterface $UserAuthRepository)
    {
        $this->UserAuthRepository = $UserAuthRepository;
    }

    // public function register(UserStoreRequest $request)
    // {
    //     $parms = $request->all();
    //     return $this->UserAuthRepository->store($parms);
    // }

    public function login(UserLoginRequest $request)
    {
        if (Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('member.dashboard'); // or return success JSON
        }
        //UserLoginRequest to be added
        // if (auth()->guard('customer')->user() || $request->cookie('_customer_token')) {
        //     return response()->json(['status' => 'Warning', "message" => "Already logged in", "_token" => $request->cookie('_token')], 200);
        // }
        $parms = $request->all();
        $log = $this->UserAuthRepository->login($parms);
    }

    public function logout(Request $request)
    {
        $parms = $request->all();
        return $this->UserAuthRepository->logout($parms);
    }

    public function userLogout(Request $request)
    {
        Auth::guard('user')->logout();
        // Optionally invalidate session and regenerate token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login'); // or return success JSON
    }


    // public function show(Request $request)
    // {
    //     $parms = $request->all();
    //     return $this->UserAuthRepository->show($parms);
    // }

    // public function update(UserUpdateRequest $request, User $user)
    // {
    //     $parms = $request->all();
    //     return $this->UserAuthRepository->update($parms, $user);
    // }

    public function email_verification($id, $token)
    {
        try {
            DB::table('customers')->where('id', $id)->where('hash', $token)->update(['status' => '1']);
            return redirect()->route('login');
        } catch (\Throwable $th) {
            return redirect()->route('index');
        }
    }

    public function tokenValidate()
    {
        return response()->json(['status' => 'Success', "message" => "Token is valid!"], 200);
    }

    public function forgotPass(ForgetPasswordRequest $request)
    {
        $parms = $request->all();
        return $this->UserAuthRepository->forgetPassword($parms);
    }
}
