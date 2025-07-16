<?php

namespace App\Http\Controllers\API\Web;

use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CustomerLoginRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\Web\CustomerAuthInterface;
use App\Models\Admin\Customer;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerAuthController extends Controller
{
    private $CustomerAuthRepository;

    public function __construct(CustomerAuthInterface $CustomerAuthRepository)
    {
        $this->CustomerAuthRepository = $CustomerAuthRepository;
    }

    // public function register(UserStoreRequest $request)
    // {
    //     $parms = $request->all();
    //     return $this->CustomerAuthRepository->store($parms);
    // }

    public function login(CustomerLoginRequest $request)
    {
        //UserLoginRequest to be added
        // if (auth()->guard('customer')->user() || $request->cookie('_customer_token')) {
        //     return response()->json(['status' => 'Warning', "message" => "Already logged in", "_token" => $request->cookie('_token')], 200);
        // }

        // \Log::info('Login request received', $request->all());

        $parms = $request->all();
        return $this->CustomerAuthRepository->login($parms);
    }

    public function logout(Request $request)
    {
        $parms = $request->all();
        return $this->CustomerAuthRepository->logout($parms);
    }

    // public function show(Request $request)
    // {
    //     $parms = $request->all();
    //     return $this->CustomerAuthRepository->show($parms);
    // }

    // public function update(UserUpdateRequest $request, User $user)
    // {
    //     $parms = $request->all();
    //     return $this->CustomerAuthRepository->update($parms, $user);
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
        return $this->CustomerAuthRepository->forgetPassword($parms);
    }
}
