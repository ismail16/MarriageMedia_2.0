<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\CustomerInterface;
use App\Http\Resources\Admin\Customer as CustomerResource;
use App\Mail\CreateCustomerMail;
use App\Models\Admin\Customer;
use App\Services\Admin\AccountService;
use App\Services\Admin\AddressService;
use App\Services\Admin\PointService;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Auth;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\replyMessageMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class CustomerRepository implements CustomerInterface
{
    use ApiResponser;

    public function all()
    {
        try {
            $customer = new Customer();
            if (isset($_GET['getGallery']) && $_GET['getGallery'] == '1') {
                $customer = $customer::with('gallery');
            }

            if (isset($_GET['getAllData']) && $_GET['getAllData'] != '') {
                $customer = $customer->get();
                return $this->successResponse(CustomerResource::collection($customer), 'Data Get Successfully!');
            }


            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $customer = $customer->searchParameter($_GET['searchParameter']);
            }

            $sortBy = ['id', 'first_name', 'last_name', 'email'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $customer = $customer->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            return $this->successResponse(CustomerResource::collection($customer->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($customer)
    {
        try {
            if (isset($_GET['getGallery']) && $_GET['getGallery'] == '1') {
                return $this->successResponse(new CustomerResource(Customer::with('gallery')->customerId($customer->id)->firstOrFail()), 'Data Get Successfully!');
            }
            return $this->successResponse(new CustomerResource($customer), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }


    public function replyMessage(array $parms)
    {

        // dd($parms['message']);

        // try {
        //     $sql = new Contact();
        //     $sql = $sql->create($parms);
        // } catch (Exception $e) {
        //     return $this->errorResponse();
        // }

        if ($parms['email']) {

            // Mail::to($parms['email'])->queue(new CreateCustomerMail($parms, 'Message sent Successfully!'));

            Mail::to($parms['email'])->queue(new replyMessageMail($parms, 'Customer Save Successfully!'));

            // return $this->successResponse(new ContactResource($sql), 'Complain sent Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        //return $parms;
        try {

            $sql = new Customer();
            $pass = $parms['password'];
            $parms['password'] = Hash::make($parms['password']);

            $parms['c_id'] =  $this->generateCID();
            $parms['hash'] = str_replace("/", '1', Hash::make('time'));
            if (Auth::check()) {
                $parms['created_by'] = \Auth::id();
            }
            $sql = $sql->create($parms);
            $points = new PointService();
            $points->customerPoints($parms, $sql->id);

            $accounts = new AccountService();
            $accounts->createAccount('CUSTOMER', $parms['first_name'] . " " . $parms['last_name'], $sql->id, 'customer');

            $address = new AddressService();
            $address->createAddress($parms, $sql->id);
        } catch (Exception $e) {
            Log::error('Create Customer error: ' . $e->getMessage());
            return $this->errorResponse();
        }

        if ($sql) {
            if (isset($parms['is_customer']) && $parms['is_customer'] == 0) {
                Mail::to($sql->email)->queue(new CreateCustomerMail($sql, $pass, 'Customer Save Successfully!'));
            } else {
                Mail::to($sql->email)->queue(new CreateCustomerMail($sql, null, 'Customer Save Successfully!'));
            }
            return $this->successResponse(new CustomerResource($sql), 'Customer Save Successfully!');
        } else {
            Log::error('Failed to save customer. Params: ', $parms);
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $customer)
    {
        DB::beginTransaction();
        try {
            if (Auth::check()) {
                $parms['updated_by'] = \Auth::id();
            }
            if (isset($parms['password'])) {
                $parms['password'] = Hash::make($parms['password']);
            }
            $sql = $customer->update($parms);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new CustomerResource($customer), 'Customer Update Successfully!');
        } else {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function destroy($customer)
    {
        try {
            $sql = Customer::findOrFail($customer);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Customer Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function generateCID()
    {
        $cid = Str::lower(Str::random(6)) . '_' . now()->format('v');
        $exists = Customer::where('c_id', $cid)->exists();
        if ($exists) {
            return $this->generateCID();
        }
        return $cid;
    }
}
