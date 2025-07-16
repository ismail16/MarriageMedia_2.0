<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Admin\Proposal;

class ReceiveProposalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $receive_proposals = Proposal::where('receive_proposal_user', Auth::user()->id)->get();
        return view('author.proposal.receive_proposal', compact('receive_proposals'));
    }

    public function create()
    {
        return view('author.preference.create');
    }

    public function store(Request $request) {}


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
