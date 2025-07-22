<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\District;
use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\Admin\DistrictInterface;

class DistrictController extends Controller
{

    private $districtRepository;

    public function __construct(DistrictInterface $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->districtRepository->all();
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
    public function store(DistrictRequest $request)
    {
        $parms = $request->all();
        return $this->districtRepository->store($parms);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->districtRepository->show($id);
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
    public function update(DistrictRequest $request, $id)
    {
        $parms = $request->all();
        return $this->districtRepository->update($parms, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->districtRepository->destroy($id);
    }
}
