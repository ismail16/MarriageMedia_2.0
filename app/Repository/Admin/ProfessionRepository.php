<?php

namespace App\Repository\Admin;

use Exception;
use App\Models\Admin;
use App\Traits\ApiResponser;
use App\Models\Admin\Profession;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\UserWarehouse;
use App\Interfaces\Admin\ProfessionInterface;
use App\Http\Resources\Admin\Profession as ProfessionResource;

class ProfessionRepository implements ProfessionInterface
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

            $user = new Profession;

            $sortBy = ['id', 'name'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $user = $user->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $user = $user->searchParameter($_GET['searchParameter']);
            }

            return $this->successResponse(ProfessionResource::collection($user->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($id)
    {
        $user = Profession::findOrFail($id);
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
            $sql = new Profession;
            $sql = $sql->create($parms);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new ProfessionResource($sql), 'Profession Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $id)
    {
        DB::beginTransaction();
        try {

            $profession = Profession::find($id);
            $profession->name = $parms['name'];
            $profession->slug = $parms['slug'];
            $profession->status = $parms['status'];
            $profession->save();
            DB::commit();
            return $this->successResponse(new ProfessionResource($profession), 'Data Update Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $profession = Profession::findOrFail($id);
            $profession->delete();
            DB::commit();
            return $this->successResponse(new ProfessionResource($profession), 'Data Delete Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }
}
