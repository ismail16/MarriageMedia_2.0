<?php

namespace App\Repository\Admin;

use Exception;
use App\Models\User;
use App\Models\Admin;
use App\Traits\ApiResponser;
use App\Models\Admin\Permission;
use App\Models\User as UserModel;
use App\Models\Admin\RolePermission;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Admin\User as UserResource;
use App\Interfaces\Admin\AuthInterface as AdminAuthInterface;

class AuthRepository implements AdminAuthInterface
{
    use ApiResponser;
    public function store(array $parms)
    {
        $input = $parms;
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        config(['auth.guards.api.provider' => 'user']);
        $token = $user->createToken('MyApp', ['user'])->accessToken;
        $cookie = $this->getCookieDetails($token);
        return response()
            ->json([
                'status' => 'Success',
                'token' => $token,

            ], 200)
            ->cookie($cookie['name'], $cookie['value'], $cookie['minutes'], $cookie['path'], $cookie['domain'], $cookie['secure'], $cookie['httponly']);
    }

    public function login(array $parms)
    {
        $is_active = Admin::select('admins.*')->where('status', '1')->where('email', $parms['email'])->count();

        // dd($is_active);

        if ($is_active === 0) {
            return $this->errorResponse('User access not allowed due to  inactive status.', 422);
        }

        // return auth()->guard('user')->attempt(['email' => request('email'), 'password' => request('password')]);

        // dd(auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')]));


        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])) {

            config(['auth.guards.api.provider' => 'admin']);
            $admin = Admin::select('admins.*')->find(auth()->guard('admin')->id());

            $success =  $admin;
            $success['token'] =  $admin->createToken('MyApp', ['user'])->accessToken;

            $cookie = $this->getCookieDetails($success['token']);
            $permission_ids = RolePermission::where('role_id', $admin->role_id)->pluck('permission_id');
            $permissions = Permission::whereIn('id', $permission_ids)->pluck('value');

            return response()->json([
                'status' => 'Success',
                'token' => $success['token'],
                'user' => $admin,
                'user_permissions' => $permissions
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
            return $this->errorResponse('The selected password is invalid.', 422);
        }
    }

    public function getCookieDetails($token)
    {
        return [
            'name' => '_token',
            'value' => $token,
            'minutes' => 1440,
            'path' => null,
            'domain' => null,
            // 'secure' => true, // for production
            'secure' => null, // for localhost
            'httponly' => true,
            'type' => 'user',
        ];
    }

    public function logout(array $parms)
    {

        //return Auth::user();

        $token = auth()->user()->token();
        $token->revoke();
        $cookie = \Cookie::forget('_token');
        return response()->json([
            'status' => 'Success',
        ])->withCookie($cookie);
    }

    public function show()
    {
        // try {
        //     $user = UserModel::where('id', Auth::id())->first();
        //     return $this->successResponse(new UserResource($user), 'Data Get Successfully!');
        // } catch (Exception $e) {
        //     return $this->errorResponse();
        // }
    }

    public function update(array $parms, $user)
    {
        try {
            $sql = $user->update($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse(new UserResource($sql), 'User Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
