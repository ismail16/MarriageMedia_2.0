<?php

namespace App\Repository\Admin;

use Exception;
use App\Models\Admin;
use App\Traits\ApiResponser;
use App\Models\Web\SuccessStory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\UserWarehouse;
use App\Interfaces\Admin\SuccessStoryInterface;
use App\Http\Resources\Admin\SuccessStoryResource;
use App\Http\Resources\Admin\AdminUser as AdminUserResource;

class SuccessStoryRepository implements SuccessStoryInterface
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

            $user = new SuccessStory;

            $sortBy = ['id', 'first_name', 'last_name', 'email'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $user = $user->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $user = $user->searchParameter($_GET['searchParameter']);
            }

            return $this->successResponse(SuccessStoryResource::collection($user->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($id)
    {
        $user = Admin::with('deliveryAgent')->whereHas('deliveryAgent')->findOrFail($id);
        try {
            return $this->successResponse($user, 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {

        // dd($parms);
        try {
            DB::beginTransaction();
            // Handle image upload
            if (isset($parms['image']) && $parms['image'] instanceof \Illuminate\Http\UploadedFile) {
                $filename = time() . '.' . $parms['image']->getClientOriginalExtension();
                $parms['image']->move(public_path('images/successStory'), $filename);
                $parms['image'] = $filename; // replace file with filename for DB
            }

            $sql = SuccessStory::create($parms);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }

        if ($sql) {
            return $this->successResponse(new SuccessStoryResource($sql), 'Success Story Saved Successfully!');
        }

        return $this->errorResponse();
    }

    public function update(array $parms, $id)
    {
        DB::beginTransaction();
        try {
            $successStory = SuccessStory::findOrFail($id);

            $successStory->bride_name = $parms['bride_name'];
            $successStory->groom_name = $parms['groom_name'];
            $successStory->location = $parms['location'];
            $successStory->marriage_date = $parms['marriage_date'];
            $successStory->comment = $parms['comment'];
            $successStory->status = $parms['status'];

            // Handle image
            if (isset($parms['image']) && $parms['image'] instanceof \Illuminate\Http\UploadedFile) {
                // Delete old image if exists
                if ($successStory->image && file_exists(public_path('images/successStory' . $successStory->image))) {
                    unlink(public_path('images/successStory' . $successStory->image));
                }

                $filename = time() . '.' . $parms['image']->getClientOriginalExtension();
                $parms['image']->move(public_path('images/successStory'), $filename);

                $successStory->image = $filename;
            }


            // elseif (isset($parms['old_image'])) {
            //     // Keep old image if no new file uploaded
            //     $successStory->image = $parms['old_image'];
            // }

            $successStory->save();

            DB::commit();
            return $this->successResponse(new SuccessStoryResource($successStory), 'Data Updated Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }


    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = SuccessStory::findOrFail($id);
            $user->delete();
            DB::commit();
            return $this->successResponse(new SuccessStoryResource($user), 'Data Delete Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }
}
