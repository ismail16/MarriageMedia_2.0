<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Profession;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfessionRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\Admin\ProfessionInterface;

class ProfessionController extends Controller
{

    private $professionRepository;

    public function __construct(ProfessionInterface $professionRepository)
    {
        $this->professionRepository = $professionRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->professionRepository->all();
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
    public function store(ProfessionRequest $request)
    {
        $parms = $request->all();
        return $this->professionRepository->store($parms);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->professionRepository->show($id);
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
    public function update(ProfessionRequest $request, $id)
    {
        $parms = $request->all();
        return $this->professionRepository->update($parms, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->professionRepository->destroy($id);
    }
}
