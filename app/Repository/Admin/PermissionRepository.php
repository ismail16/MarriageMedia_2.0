<?php

namespace App\Repository\Admin;

use App\Models\Admin\Permission;
use App\Interfaces\Admin\PermissionInterface;

class PermissionRepository implements PermissionInterface
{
    private $model;

    public function __construct(Permission $permissionModel)
    {
        $this->model = $permissionModel;
    }

    public function all()
    {
        return Permission::orderBy('id', 'desc')->get();
    }

    public function show($id)
    {
        $parent = Permission::with('children')->find($id);
        if (!$parent) {
            return response()->json(['error' => 'Permission not found'], 404);
        }
        return response()->json($parent);
    }

    public function store(array $parms)
    {
        try {

            if ($parms['parentPermissionName']) {
                $permission = new Permission();
                $permission->key = $parms['parentPermissionName'];
                $permission->value = $parms['parentPermissionValue'];
                $permission->parent_id = 0;
                $permission->save();
                $insertedId = $permission->id;
            }
            if (!empty($insertedId) && !empty($parms['childPermissions'])) {
                foreach ($parms['childPermissions'] as $child) {
                    $permissionChild = new Permission();
                    $permissionChild->key = $child['key'];
                    $permissionChild->value = $child['value'];
                    $permissionChild->parent_id = $insertedId;
                    $permissionChild->save();
                }
            }

            return response()->json(['status' => 'Success', 'message' => 'Permission created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Error', 'message' => $e->getMessage()], 500);
        }
    }

    public function update($parms, $id)
    {
        try {
            // Step 1: Update parent permission
            $permission = Permission::find($id);
            if (!$permission) {
                return response()->json(['status' => 'Error', 'message' => 'Parent permission not found'], 404);
            }

            $permission->key = $parms['parentPermissionName'];
            $permission->value = $parms['parentPermissionValue'];
            $permission->parent_id = 0;
            $permission->save();

            $insertedId = $permission->id;

            // Step 2: Optional — delete existing children first
            Permission::where('parent_id', $insertedId)->delete();

            // Step 3: Insert new children
            if (!empty($parms['childPermissions'])) {
                foreach ($parms['childPermissions'] as $child) {
                    $permissionChild = new Permission();
                    $permissionChild->key = $child['key'];
                    $permissionChild->value = $child['value'];
                    $permissionChild->parent_id = $insertedId;
                    $permissionChild->save();
                }
            }

            return response()->json(['status' => 'Success', 'message' => 'Permission updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Error', 'message' => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        try {
            // Delete all child permissions first
            Permission::where('parent_id', $id)->delete();

            // Then delete the parent permission
            Permission::find($id)?->delete();

            return response()->json(['status' => 'Success', 'message' => 'Permission and its children deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Error', 'message' => $e->getMessage()], 500);
        }
    }
}
