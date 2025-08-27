<?php

namespace App\Repository\Admin;

use Exception;
use App\Models\Admin;
use App\Traits\ApiResponser;
use App\Models\Web\PackagePrice;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Admin\PackagePriceInterface;
use App\Http\Resources\Admin\PackagePriceResource;

class PackagePriceRepository implements PackagePriceInterface
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

            $user = new PackagePrice;

            $sortBy = ['id', 'title', 'price'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $user = $user->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $user = $user->searchParameter($_GET['searchParameter']);
            }

            return $this->successResponse(PackagePriceResource::collection($user->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($id)
    {
        $user = PackagePrice::findOrFail($id);
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
            // Handle image upload
            if (isset($parms['image']) && $parms['image'] instanceof \Illuminate\Http\UploadedFile) {
                $filename = time() . '.' . $parms['image']->getClientOriginalExtension();
                $parms['image']->move(public_path('images/packagePrice'), $filename);
                $parms['image'] = $filename; // replace file with filename for DB
            }
            $sql = PackagePrice::create($parms);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }

        if ($sql) {
            return $this->successResponse(new PackagePriceResource($sql), 'Success Story Saved Successfully!');
        }

        return $this->errorResponse();
    }

    public function update(array $parms, $id)
    {
        DB::beginTransaction();
        try {
            $packagePrice = PackagePrice::findOrFail($id);

            $packagePrice->title = $parms['title'];
            $packagePrice->price = $parms['price'];
            $packagePrice->discount = $parms['discount'];
            $packagePrice->duration = $parms['duration'];
            $packagePrice->proposal = $parms['proposal'];
            $packagePrice->contact = $parms['contact'];
            $packagePrice->status = $parms['status'];

            // Handle image
            if (isset($parms['image']) && $parms['image'] instanceof \Illuminate\Http\UploadedFile) {
                // Delete old image if exists
                if ($packagePrice->image && file_exists(public_path('images/packagePrice' . $packagePrice->image))) {
                    unlink(public_path('images/packagePrice' . $packagePrice->image));
                }

                $filename = time() . '.' . $parms['image']->getClientOriginalExtension();
                $parms['image']->move(public_path('images/packagePrice'), $filename);
                $packagePrice->image = $filename;
            }
            $packagePrice->save();
            DB::commit();
            return $this->successResponse(new PackagePriceResource($packagePrice), 'Data Updated Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }


    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = PackagePrice::findOrFail($id);
            $user->delete();
            DB::commit();
            return $this->successResponse(new PackagePriceResource($user), 'Data Delete Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }
}
