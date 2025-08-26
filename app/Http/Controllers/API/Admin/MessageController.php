<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Mail\VerifySuccessfulMail;
use App\Models\Admin\PersonalInfo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\Web\MessageInterface;

class MessageController extends Controller
{
    use ApiResponser;

    private $messageRepository;

    public function __construct(MessageInterface $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->messageRepository->all();
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
    public function store(UserStoreRequest $request)
    {
        $parms = $request->all();
        return $this->messageRepository->store($parms);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->messageRepository->show($id);
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
    public function update(Request $request, $id)
    {
        // dd($request->activation);

        $user = User::find($id);
        $user->status = $request->user_status;
        $user->activation = $request->activation;


        if ($request->user_status == 1) {
            // Mail::to($user->email)->queue(new VerifySuccessfulMail($user));
        } else {
            $user->status = 0;
        }
        $PersonalInfo = PersonalInfo::where('user_id', $id)->first();
        if ($request->user_status == 1  && $request->activation == 1) {
            $PersonalInfo->status = 1;
            $PersonalInfo->save();
        } else {
            $PersonalInfo->status = 0;
            $PersonalInfo->save();
        }
        $user->save();

        return $this->successResponse($user, 'Data saved Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->messageRepository->destroy($id);
    }
}
