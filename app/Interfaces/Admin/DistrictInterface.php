<?php

namespace App\Interfaces\Admin;

use Illuminate\Support\Collection;

interface DistrictInterface
{
    public function all();

    public function show($district);

    public function store(array $parms);

    public function update(array $parms, $district);

    public function destroy($district);
}
