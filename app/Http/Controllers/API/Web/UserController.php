<?php

namespace App\Http\Controllers\API\Web;

use App\Models\User;
use App\Models\Admin\Customer;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Web\UserInterface;
use App\Repository\Web\UserRepository;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Controllers\Controller as Controller;

class UserController extends Controller
{
    private $UserRepository;

    public function __construct(UserInterface $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }


    public function show(User $profile)
    {

        dd($profile);
        // return "hello";.
        // return $this->UserRepository->show($profile);
    }


    // public function update(CustomerUpdateRequest $request, Customer $customer)
    // {
    //     // return 0;
    //     return $this->UserRepository->update($request->all(), $customer);
    // }
}
