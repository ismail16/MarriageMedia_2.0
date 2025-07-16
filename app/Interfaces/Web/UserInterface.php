<?php

namespace App\Interfaces\Web;

interface UserInterface
{

    public function show($customer);
    public function update(array $parms, $customer);
}
