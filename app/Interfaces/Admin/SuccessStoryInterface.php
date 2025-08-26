<?php

namespace App\Interfaces\Admin;

use Illuminate\Support\Collection;

interface SuccessStoryInterface
{
    public function all();

    public function show($user);

    public function store(array $parms);

    public function update(array $parms, $user);

    public function destroy($user);
}
