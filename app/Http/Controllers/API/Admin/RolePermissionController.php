<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\RolePermissionInterface;
use App\Http\Requests\RolePermission\RolePermissionStoreRequest;
use App\Http\Resources\Admin\RolePermissionResource as RolePermissionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;

class RolePermissionController extends Controller
{
    private $rolePermissionInterface;

    public function __construct(RolePermissionInterface $rolePermissionInterface)
    {
        $this->rolePermissionInterface = $rolePermissionInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (isset($_GET['role_id'])) {
            return RolePermissionResource::collection($this->rolePermissionInterface->getRolePermissionByRoleId($_GET['role_id']));
        } else {
            return RolePermissionResource::collection($this->rolePermissionInterface->all());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolePermissionStoreRequest $request)
    {
        return $this->rolePermissionInterface->store($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        return new RolePermissionResource($this->rolePermissionInterface->show($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
