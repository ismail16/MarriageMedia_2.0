<?php

namespace App\Repository\Admin;

use App\Models\Admin\Role;
use App\Interfaces\Admin\RoleInterface;

class RoleRepository implements RoleInterface
{
    private $model;

    public function __construct(Role $roleModel)
    {
        $this->model = $roleModel;
    }

    public function all()
    {
        return Role::all();
    }

    public function show($id)
    {
        return Role::find($id);
    }

    public function create($data)
    {
    }

    public function store(array $parms)
    {
        try {
            $role = new Role();
            $role->name = $parms['name'];
            $role->save();
            return response()->json(['status' => 'Success', 'message' => 'Role created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Error', 'message' => $e->getMessage()], 500);
        }
    }


    public function update($parms, $id)
    {
        try {
            $role = Role::find($id);
            $role->name = $parms['name'];
            $role->save();
            return response()->json(['status' => 'Success', 'message' => 'Role updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        Role::find($id)->delete();
        return response()->json(['status' => 'Success', 'message' => 'Role deleted successfully'], 200);
    }
}
