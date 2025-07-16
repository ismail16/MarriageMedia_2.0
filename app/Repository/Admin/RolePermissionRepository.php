<?php

namespace App\Repository\Admin;

use App\Models\Admin\RolePermission;
use App\Interfaces\Admin\RolePermissionInterface;
use App\Models\Admin\Role;
use Illuminate\Support\Facades\Auth;

class RolePermissionRepository implements RolePermissionInterface
{
    private $model;

    public function __construct(RolePermission $rolePermissionModel)
    {
        $this->model = $rolePermissionModel;
    }

    public function all()
    {
        return RolePermission::all();
    }

    public function show($id)
    {
        return RolePermission::find($id);
    }

    public function store($parms)
    {
        //length of the array
        //return response(($parms['permissions'][1]));
        //return response(count($parms['permissions']));

        try {
            $role_id = "";
            if (isset($parms['role_id'])) {
                $role_id = $parms['role_id'];
                $role = Role::find($role_id);
                $role->name = $parms['role_name'];
                $role->updated_by = Auth::user()->id;
                $role->save();
                $permissionRole = RolePermission::where('role_id', $parms['role_id'])->delete();
            } else {
                //return ("habibi come to Dubai");
                //return ($parms['role_name']);
                $role = new Role();
                $role->name = $parms['role_name'];
                $role->created_by = Auth::user()->id;
                if ($role->save()) {
                    $role_id = $role->id;
                }
            }
            // return response($role_id);


            // if ($permissionRole) {
            //     return response()->json(['status' => 'Success', 'message' => 'Role Permission deleted successfully'], 200);
            // }
            //return ($role_id);
            for ($i = 0; $i < count($parms['permissions']); $i++) {
                //  return response($parms['permissions'][$i]);
                $rolePermission = new RolePermission();
                $rolePermission->permission_id = $parms['permissions'][$i];
                $rolePermission->role_id = $role_id;
                $rolePermission->created_by = Auth::user()->id;
                $rolePermission->save();
            }
            //return response($role_id);
            //  return response($rolePermission);

            return response()->json(['status' => 'Success', 'message' => 'Role Permission created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function update($parms, $id)
    {
       
    }

    public function destroy($id)
    {
        RolePermission::find($id)->delete();
        return response()->json(['status' => 'Success', 'message' => 'Role Permission deleted successfully'], 200);
    }

    public function getRolePermissionByRoleId($roleId)
    {
        return RolePermission::where('role_id', $roleId)->get();
    }
}
