<?php

namespace App\Interfaces\Web;

interface CustomerInterface
{

    public function show($customer);
    public function update(array $parms, $customer);
}
