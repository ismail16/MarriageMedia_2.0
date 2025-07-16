<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Admin\Proposal;

class SentProposalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $proposals = Proposal::where('sent_proposal_user', Auth::user()->id)->get();
        return view('author.proposal.sent_proposal', compact('proposals'));
    }

    public function create()
    {
        return view('author.preference.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sent_proposal_user' => 'required',
            'receive_proposal_user' => 'required',
        ]);

        $proposal_users = Proposal::where('sent_proposal_user', $request->sent_proposal_user)->get();

        foreach ($proposal_users as $proposal_user) {
            if ($proposal_user->sent_proposal_user == $request->sent_proposal_user) {
                return back()->with('message', 'Proposal Already Sent');
            }
        }
        $Proposal = new Proposal();
        $Proposal->receive_proposal_user = $request->receive_proposal_user;
        $Proposal->sent_proposal_user = $request->sent_proposal_user;
        $Proposal->save();
        return back()->with('message', 'Proposal Sent Successfully.');
    }


    public function imageAccessApproved(Request $request) {}

    public function show($id)
    {
        $Proposal = Proposal::find($id);
        $Proposal->approved = 1;
        $Proposal->declined = 0;
        $Proposal->save();
        return back()->with('message', 'Proposal Approved Successfully.');
    }

    public function edit($id)
    {

        $Proposal = Proposal::find($id);
        $Proposal->declined = 1;
        $Proposal->approved = 0;
        $Proposal->save();
        return back()->with('message', 'Proposal Declined Successfully.');
    }

    public function update(Request $request, $id) {}

    public function destroy($id)
    {

        $Proposal = Proposal::find($id);
        $Proposal->delete();
        return back()->with('message', 'Proposal Deleted Successfully.');
    }
}
