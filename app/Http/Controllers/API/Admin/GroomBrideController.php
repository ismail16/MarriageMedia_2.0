<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Admin\GroomBrideInterface;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class GroomBrideController extends Controller
{

    private $groomBrideRepository;

    public function __construct(GroomBrideInterface $groomBrideRepository)
    {
        $this->groomBrideRepository = $groomBrideRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->groomBrideRepository->all();
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
    public function store(UserStoreRequest $request)
    {
        $parms = $request->all();
        return $this->groomBrideRepository->store($parms);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->groomBrideRepository->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $parms = $request->all();
        return $this->groomBrideRepository->update($parms, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->groomBrideRepository->destroy($id);
    }
}
