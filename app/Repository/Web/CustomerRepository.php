<?php

namespace App\Repository\Web;

use App\Interfaces\Web\CustomerInterface;
use App\Http\Resources\Web\Customer as CustomerResource;
use App\Models\Admin\Contact;
use App\Models\Admin\Customer;
use App\Services\Admin\AccountService;
use App\Services\Admin\AddressService;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
// use Auth;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CustomerRepository implements CustomerInterface
{
    use ApiResponser;


    public function show($thisCustomer)
    {


        $customer = Customer::with('customer_address_book');

        dd($thisCustomer);


        try {
            $customer->CustomerId($thisCustomer->id);
            return $this->successResponse(new CustomerResource($customer->first()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $customer)
    {
        // return $parms['address_id'];
        //return Auth::id();

        DB::beginTransaction();
        try {
            if ($customer->id != Auth::id()) {
                return $this->errorResponse('You are not authorized to update this customer!', 401);
            } else {
                if (isset($parms['password'])) {
                    $parms['password'] = Hash::make($parms['password']);
                }
                $customer = Customer::find($customer->id);
                //return $customer;
                $customer->first_name = $parms['first_name'];
                $customer->last_name = $parms['last_name'];
                $customer->email = $parms['email'];
                $customer->phone = $parms['phone'];
                $customer->password = $parms['password'];
                $customer->save();

                $address = new AddressService();
                $address->updateAddress($parms, $customer->id);

                DB::commit();
                return $this->successResponse(new CustomerResource($customer), 'Customer Updated Successfully!');
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Error in CustomerRepository@update => " . $e->getMessage());
            return $this->errorResponse();
        }
    }
}
