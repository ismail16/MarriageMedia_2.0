<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PackagePriceStoreRequest;
use App\Http\Requests\PackagePriceUpdateRequest;
use App\Interfaces\Admin\PackagePriceInterface;

class PackagePriceController extends Controller
{
    use ApiResponser;

    private $packagePriceRepository;

    public function __construct(PackagePriceInterface $packagePriceRepository)
    {
        $this->packagePriceRepository = $packagePriceRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->packagePriceRepository->all();
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
        $parms = $request->all();
        return $this->packagePriceRepository->store($parms);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->packagePriceRepository->show($id);
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
    public function update(PackagePriceUpdateRequest $request, $id)
    {
        $parms = $request->all();
        return $this->packagePriceRepository->update($parms, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->packagePriceRepository->destroy($id);
    }
}
