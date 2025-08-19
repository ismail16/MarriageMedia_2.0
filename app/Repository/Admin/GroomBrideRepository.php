<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\GroomBrideInterface;
use App\Http\Resources\Admin\User as UserResource;
use App\Models\Admin\UserWarehouse;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Exception;

class GroomBrideRepository implements GroomBrideInterface
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
            $user = new User;
            $sortBy = ['id', 'first_name', 'last_name', 'email'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $user = $user->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $user = $user->searchParameter($_GET['searchParameter']);
            }

            if (isset($_GET['status']) && $_GET['status'] != '') {
                $user = $user->where('status', $_GET['status']);
            }
            if (isset($_GET['activation']) && $_GET['activation'] != '') {
                $user = $user->where('activation', $_GET['activation']);
            }

            // dd($user);

            // Eager load latest and all profile images
            $user = $user->with(['profileImages']);
            $user = $user->with(['user_info']);

            return $this->successResponse(UserResource::collection($user->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {

            dd($e);

            return $this->errorResponse();
        }
    }

    public function show($id)
    {
        $user = new User();
        $user = $user->with('user_info');
        $user = $user->with('profileImages');
        $user = $user->with('preference');
        $user = $user->with('country');
        $user = $user->with('division');
        $user = $user->with('district');
        $user = $user->with('upazila');
        $user = $user->findOrFail($id);
        try {
            return $this->successResponse($user, 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        $parms['password'] = bcrypt($parms['password']);
        try {
            DB::beginTransaction();
            $sql = new User;
            $sql = $sql->create($parms);
            if (isset($parms['warehouse_id'])) {
                foreach ($parms['warehouse_id'] as $warehouse) {
                    $data = [
                        'user_id' => $sql->id,
                        'warehouse_id' =>  $warehouse['warehouse_id']
                    ];
                    $UserWarehouse = UserWarehouse::create($data);
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new UserResource($sql), 'User Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $id)
    {

        $user = User::find($id);
        if ($request->user_status) {
            $user->status = $request->user_status;
            Mail::to($user->email)->queue(new VerifySuccessfulMail($user));
        } else {
            $user->status = 0;
        }

        $PersonalInfo = PersonalInfo::where('user_id', $id)->first();
        if ($request->user_status && $request->activation) {
            $PersonalInfo->status = 1;
            $user->activation = 1;
            $PersonalInfo->save();
        } elseif ($PersonalInfo) {
            $PersonalInfo->status = 0;
            $PersonalInfo->save();
        } else {
            $user->activation = 0;
        }
        $user->save();

        // DB::beginTransaction();
        // try {

        //     $user = User::find($id);
        //     // return $user;
        //     $user->name = $parms['name'];
        //     $user->email = $parms['email'];
        //     $user->status = $parms['status'];
        //     $user->role_id = $parms['role_id'];
        //     if (isset($parms['password']) && $parms['password'] != '' && $parms['password'] != null) {
        //         $user->password = bcrypt($parms['password']);
        //     }
        //     $user->updated_by = auth()->user()->id;
        //     $user->save();

        //     if (isset($parms['warehouse_id'])) {
        //         UserWarehouse::where('user_id', $user->id)->delete();

        //         foreach ($parms['warehouse_id'] as $warehouse) {
        //             // dd($warehouse);s
        //             $data = [
        //                 'user_id' => $user->id,
        //                 'warehouse_id' => $warehouse['warehouse_id']
        //             ];
        //             $UserWarehouse = UserWarehouse::create($data);
        //         }
        //     }
        //     DB::commit();
        //     return $this->successResponse(new UserResource($user), 'Data Update Successfully!');
        // } catch (Exception $e) {
        //     DB::rollBack();
        //     return $this->errorResponse();
        // }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->delete();
            DB::commit();
            return $this->successResponse(new UserResource($user), 'Data Delete Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }
}
