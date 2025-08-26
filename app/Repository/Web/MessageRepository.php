<?php

namespace App\Repository\Web;

use Exception;
use App\Models\Contact;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Web\MessageInterface;
use App\Http\Resources\Web\ContactResource;

class MessageRepository implements MessageInterface
{
    use ApiResponser;

    public function all()
    {
        try {
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            $contact = new Contact;

            $sortBy = ['id', 'email'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $contact = $contact->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $contact = $contact->searchParameter($_GET['searchParameter']);
            }

            return $this->successResponse(ContactResource::collection($contact->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        try {
            return $this->successResponse($contact, 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        $parms['password'] = bcrypt($parms['password']);
        try {
            DB::beginTransaction();
            $sql = new Contact;
            $sql = $sql->create($parms);
            DB::commit();

            return $this->successResponse(new ContactResource($sql), 'User Save Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $id)
    {
        DB::beginTransaction();
        try {
            $contact = Contact::find($id);
            $contact->name = $parms['name'];
            $contact->email = $parms['email'];
            $contact->subject = $parms['subject'];
            $contact->status = $parms['status'];
            $contact->message = $parms['message'];
            $contact->save();
            DB::commit();
            return $this->successResponse(new ContactResource($contact), 'Data Update Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();
            DB::commit();
            return $this->successResponse(new ContactResource($contact), 'Data Delete Successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }
}
