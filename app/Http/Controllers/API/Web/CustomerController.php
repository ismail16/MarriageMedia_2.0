<?php

namespace App\Http\Controllers\API\Web;

use App\Interfaces\Web\CustomerInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Admin\Customer;
use App\Repository\Web\CustomerRepository;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    private $CustomerRepository;

    public function __construct(CustomerInterface $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }


    public function show(Customer $profile)
    {
        // return "hello";.
        return $this->CustomerRepository->show($profile);
    }


    // public function update(CustomerUpdateRequest $request, Customer $customer)
    // {
    //     // return 0;
    //     return $this->CustomerRepository->update($request->all(), $customer);
    // }
}
