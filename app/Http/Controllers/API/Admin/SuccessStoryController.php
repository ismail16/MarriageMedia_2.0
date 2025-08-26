<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuccessStoryStoreRequest;
use App\Http\Requests\SuccessStoryUpdateRequest;
use App\Interfaces\Admin\SuccessStoryInterface;

class SuccessStoryController extends Controller
{
    use ApiResponser;

    private $successStoryRepository;

    public function __construct(SuccessStoryInterface $successStoryRepository)
    {
        $this->successStoryRepository = $successStoryRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->successStoryRepository->all();
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
    public function store(SuccessStoryStoreRequest $request)
    {
        $parms = $request->all();
        return $this->successStoryRepository->store($parms);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->successStoryRepository->show($id);
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
    public function update(SuccessStoryUpdateRequest $request, $id)
    {
        $parms = $request->all();
        return $this->successStoryRepository->update($parms, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->successStoryRepository->destroy($id);
    }
}
