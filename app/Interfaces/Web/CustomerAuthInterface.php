<?php

namespace App\Interfaces\Web;

use Illuminate\Support\Collection;

interface CustomerAuthInterface
{

    public function login(array $parms);

    public function logout(array $parms);
    public function forgetPassword(array $parms);

    public function resetPassword(array $parms);
}
