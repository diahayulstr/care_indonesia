<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;

class ProposalController extends Controller
{
    public function proposal() {
        $proposal = Proposal::all();
        return view('pages.proposal', compact('proposal'));
    }

    public function addProposal() {
        return view('proposal.add');
    }
}
