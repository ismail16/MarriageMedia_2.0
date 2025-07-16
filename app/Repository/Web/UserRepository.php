<?php

namespace App\Repository\Web;

use Exception;
use App\Models\User;
use App\Traits\ApiResponser;
use App\Models\Admin\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Web\UserInterface;
use App\Services\Admin\AddressService;
use App\Http\Resources\Web\User as UserResource;

class UserRepository implements UserInterface
{
    use ApiResponser;


    public function show($thisUser)
    {
        $user = User::find($thisUser->id);
        try {
            return $this->successResponse(new UserResource($user->first()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $user)
    {
        // return $parms['address_id'];
        //return Auth::id();

        DB::beginTransaction();
        try {
            if ($user->id != Auth::id()) {
                return $this->errorResponse('You are not authorized to update this customer!', 401);
            } else {
                if (isset($parms['password'])) {
                    $parms['password'] = Hash::make($parms['password']);
                }
                $user = Customer::find($user->id);
                //return $user;
                $user->first_name = $parms['first_name'];
                $user->last_name = $parms['last_name'];
                $user->email = $parms['email'];
                $user->phone = $parms['phone'];
                $user->password = $parms['password'];
                $user->save();

                $address = new AddressService();
                $address->updateAddress($parms, $user->id);

                DB::commit();
                return $this->successResponse(new CustomerResource($user), 'Customer Updated Successfully!');
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Error in CustomerRepository@update => " . $e->getMessage());
            return $this->errorResponse();
        }
    }
}
