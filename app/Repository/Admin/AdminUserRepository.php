<?php

namespace App\Repository\Admin;

use Exception;
use App\Models\Admin;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\UserWarehouse;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Admin\AdminUserInterface;
use App\Http\Resources\Admin\AdminUser as AdminUserResource;

class AdminUserRepository implements AdminUserInterface
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

            $user = new Admin;

            $sortBy = ['id', 'first_name', 'last_name', 'email'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $user = $user->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $user = $user->searchParameter($_GET['searchParameter']);
            }

            return $this->successResponse(AdminUserResource::collection($user->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($id)
    {
        $adminUser = Admin::findOrFail($id);
        try {
            return $this->successResponse($adminUser, 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        $parms['password'] = bcrypt($parms['password']);
        $parms['createdby'] = Auth::id();

        $parms['country'] = (int)$parms['country'];

        if (Admin::orderBy('id', 'desc')->first()) {
            $last_id = Admin::orderBy('id', 'desc')->first()->id;
            $parms['aid'] = 'A' . $last_id + 1;
            $parms['id'] = $last_id + 1;
        } else {
            $parms['aid'] = 'A1';
            $parms['id'] = 1;
        }

        // dd($parms);

        try {
            DB::beginTransaction();
            $sql = new Admin;
            $sql = $sql->create($parms);
            DB::commit();
        } catch (Exception $e) {

            dd($e);

            DB::rollBack();
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new AdminUserResource($sql), 'Admin User Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $id)
    {
        DB::beginTransaction();
        try {

            $user = Admin::find($id);

            $user->first_name = $parms['first_name'];
            $user->last_name = $parms['last_name'];
            $user->mobile = $parms['mobile'];
            $user->email = $parms['email'];
            $user->gender = $parms['gender'];
            $user->marital_status = $parms['marital_status'];
            $user->profession = $parms['profession'];
            $user->country = $parms['country'];
            $user->district = $parms['district'];
            $user->birthday = $parms['birthday'];
            $user->religion = $parms['religion'];
            $user->social_order = $parms['social_order'];
            $user->address = $parms['address'];
            $user->status = $parms['status'];
            $user->role_id = $parms['role_id'];

            if (isset($parms['password']) && $parms['password'] != '' && $parms['password'] != null) {
                $user->password = bcrypt($parms['password']);
            }

            $user->updated_by = auth()->user()->id;
            $user->save();

            DB::commit();
            return $this->successResponse(new AdminUserResource($user), 'Data Update Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $adminUser = Admin::findOrFail($id);
            $adminUser->delete();
            DB::commit();
            return $this->successResponse(new AdminUserResource($adminUser), 'Data Delete Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }
}
