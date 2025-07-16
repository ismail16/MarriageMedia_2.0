<?php

namespace App\Interfaces\Admin;

use Illuminate\Support\Collection;

interface RoleInterface
{
    public function all();

    public function show($id);

    public function store(array $parms);

    public function update(array $parms, $id);

    public function destroy($id);
}
