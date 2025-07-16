<?php

namespace App\Repository\Web;

use App\Models\User;
use App\Models\Web\Cart;
use App\Http\Traits\ApiResponser;
use App\Models\Admin\Customer;
use App\Mail\forgotPasswordEmail;
use App\Services\Admin\PointService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Interfaces\Web\UserAuthInterface;

class UserAuthRepository  implements UserAuthInterface
{

    use ApiResponser;

    public function login(array $parms)
    {
        $is_active = User::where('email', $parms['email'])->where('status', '1')->count();
        if ($is_active === 0) {
            return $this->errorResponse('User access not allowed due to  inactive status.', 422);
        }


        if (Auth::guard('user')->attempt([
            'email' => $parms['email'],
            'password' => $parms['password'],
        ])) {
            return redirect()->route('member.dashboard'); // or return success JSON
        }


        if (auth()->guard('user')->attempt(['email' => request('email'), 'password' => request('password')])) {


            dd(auth()->guard('user')->user());

            return redirect()->route('member.dashboard'); // or return success JSON

            //dd($parms);
            config(['auth.guards.api.provider' => 'user']);

            $user = User::select('users.*')->find(auth()->guard('user')->user()->id);
            // if (isset($parms['session_id']) && $parms['session_id'] != '') {
            //     Cart::where('session_id', $parms['session_id'])->update(['customer_id' => auth()->guard('customer')->user()->id, 'session_id' => '']);
            // }
            $success =  $user;

            // $points = new PointService;
            // $points->checkinPoints($success['id']);
            // dd($points);
            $success['token'] =  $user->createToken('MyApp', ['user'])->accessToken;
            $cookie = $this->getCookieDetails($success['token']);
            //dd($cookie);
            return response()->json([
                'status' => 'Success',
                'data' => $user,
                // 'token' => $success['token'],
            ], 200)
                ->cookie(
                    $cookie['name'],
                    $cookie['value'],
                    $cookie['minutes'],
                    $cookie['path'],
                    $cookie['domain'],
                    $cookie['secure'],
                    $cookie['httponly']
                );
        } else {
            return $this->errorResponse('Email Or Password is Wrong.', 422);
        }
    }

    public function logout(array $parms)
    {
        // dd('hello');
        $token = auth()->user()->token();

        $token->revoke();
        $cookie = \Cookie::forget('_user_token');
        return response()->json([
            'status' => 'Success',
            'message' => 'Logged out successfully'
        ], 200)->withCookie($cookie);
    }

    public function getCookieDetails($token)
    {
        return [
            'name' => '_user_token',
            'value' => $token,
            'minutes' => 1440,
            'path' => null,
            'domain' => null,
            //'secure' => true, // for production
            'secure' => null, // for localhost
            'httponly' => true,
            'type' => 'user'
        ];
    }

    public function forgetPassword(array $parms)
    {
        //return $parms;
        $token = str_replace("/", '1', Hash::make('time'));

        User::where('email', $parms['email'])->update(['forget_hash' => $token]);
        //return $token;
        $message = "Password reset request for Today's look Australia";
        $email = $parms['email'];
        Mail::to($email)->queue(new forgotPasswordEmail($token, $message));
        return $this->successResponseArray('Email Sent Successfully! Against this Link');
    }

    public function resetPassword(array $parms)
    {
        Customer::where('forget_hash', $parms['forget_id'])->update([
            'password' => bcrypt($parms['password']),
            'forget_hash' => null
        ]);
        return $this->successResponse('', 'Password Change Successfully!');
    }
}
