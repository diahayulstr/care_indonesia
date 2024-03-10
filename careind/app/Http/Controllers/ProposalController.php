<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Donor;
use App\Models\TabelImpactGoals;
use App\Models\TabelJenisIntermediary;
use App\Models\TabelJenisPenerimaan;
use App\Models\TabelKlasifikasiPortofolio;
use App\Models\TabelSaluranPendanaan;
use App\Models\TabelStatusKemajuan;
use App\Models\TabelTujuanPendanaan;

class ProposalController extends Controller
{
    public function proposal() {
        $proposal = Proposal::all();
        return view('pages.proposal', compact('proposal'));
    }

    public function addProposal() {
        $donorID = Donor::all();
        $impactGoals = TabelImpactGoals::all();
        $jenisIntermediary = TabelJenisIntermediary::all();
        $jenisPenerimaan = TabelJenisPenerimaan::all();
        $klasifikasiPortofolio = TabelKlasifikasiPortofolio::all();
        $saluranPendanaan = TabelSaluranPendanaan::all();
        $statusKemajuan = TabelStatusKemajuan::all();
        $tujuanPendanaan = TabelTujuanPendanaan::all();
        return view('proposal.add', compact('donorID', 'impactGoals', 'jenisIntermediary',
        'jenisPenerimaan', 'klasifikasiPortofolio', 'saluranPendanaan', 'statusKemajuan',
        'tujuanPendanaan'));
    }
}
