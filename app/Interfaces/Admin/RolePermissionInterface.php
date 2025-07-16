<?php

namespace App\Interfaces\Admin;

use Illuminate\Support\Collection;

interface RolePermissionInterface
{
    public function all();

    public function show($id);

    public function store($parms);

    public function update(array $parms, $id);

    public function destroy($id);

    public function getRolePermissionByRoleId($roleId);
}
