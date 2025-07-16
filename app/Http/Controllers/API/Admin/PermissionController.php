<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Admin\PermissionInterface;
use App\Http\Resources\Admin\PermissionResource as PermissionResource;

class PermissionController extends Controller
{

    private $permissionRepository;

    public function __construct(PermissionInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PermissionResource::collection($this->permissionRepository->all());
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
    public function store(Request $request)
    {
        return $this->permissionRepository->store($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->permissionRepository->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // return $this->permissionRepository->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return $this->permissionRepository->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->permissionRepository->destroy($id);
    }
}
