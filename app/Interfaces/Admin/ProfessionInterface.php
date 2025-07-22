<?php

namespace App\Interfaces\Admin;

use Illuminate\Support\Collection;

interface ProfessionInterface
{
    public function all();

    public function show($profession);

    public function store(array $parms);

    public function update(array $parms, $profession);

    public function destroy($profession);
}
