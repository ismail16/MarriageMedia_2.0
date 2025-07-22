<?php

namespace App\Repository\Admin;

use Exception;
use App\Models\Admin;
use App\Traits\ApiResponser;
use App\Models\Admin\District;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\UserWarehouse;
use App\Interfaces\Admin\DistrictInterface;
use App\Http\Resources\Admin\District as DistrictResource;

class DistrictRepository implements DistrictInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            $user = new District;

            $sortBy = ['id', 'name'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $user = $user->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $user = $user->searchParameter($_GET['searchParameter']);
            }

            return $this->successResponse(DistrictResource::collection($user->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($id)
    {
        $user = District::findOrFail($id);
        try {
            return $this->successResponse($user, 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            DB::beginTransaction();
            $sql = new District;
            $sql = $sql->create($parms);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new DistrictResource($sql), 'District Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $id)
    {
        DB::beginTransaction();
        try {

            $District = District::find($id);
            $District->name = $parms['name'];
            $District->slug = $parms['slug'];
            $District->status = $parms['status'];
            $District->save();
            DB::commit();
            return $this->successResponse(new DistrictResource($District), 'Data Update Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $District = District::findOrFail($id);
            $District->delete();
            DB::commit();
            return $this->successResponse(new DistrictResource($District), 'Data Delete Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }
}
