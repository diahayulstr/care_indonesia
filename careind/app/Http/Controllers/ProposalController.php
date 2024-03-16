<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Donor;
use App\Models\TabelImpactGoals;
use App\Models\TabelJenisIntermediaries;
use App\Models\TabelJenisPenerimaan;
use App\Models\TabelKlasifikasiPortfolios;
use App\Models\TabelSaluranPendanaan;
use App\Models\TabelStatusKemajuan;
use App\Models\TabelTujuanPendanaan;
use File;

class ProposalController extends Controller
{
    public function proposal() {
        $proposal = Proposal::paginate(2);
        return view('pages.proposal', compact('proposal'));
    }

    public function addProposal() {
        $donorID = Donor::all();
        $impactGoals = TabelImpactGoals::all();
        $jenisIntermediaries = TabelJenisIntermediaries::all();
        $jenisPenerimaan = TabelJenisPenerimaan::all();
        $klasifikasiPortfolios = TabelKlasifikasiPortfolios::all();
        $saluranPendanaan = TabelSaluranPendanaan::all();
        $statusKemajuan = TabelStatusKemajuan::all();
        $tujuanPendanaan = TabelTujuanPendanaan::all();
        return view('proposal.add', compact('donorID', 'impactGoals', 'jenisIntermediaries',
        'jenisPenerimaan', 'klasifikasiPortfolios', 'saluranPendanaan', 'statusKemajuan',
        'tujuanPendanaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'donor_id'                  =>  'required|exists:donors,id',
            'tujuan_pendanaan_id'       =>  'required|exists:tabel_tujuan_pendanaans,id',
            'jenis_penerimaan_id'       =>  'required|exists:tabel_jenis_penerimaans,id',
            'saluran_pendanaan_id'      =>  'required|exists:tabel_saluran_pendanaans,id',
            'jenis_intermediaries_id'   =>  'required|exists:tabel_jenis_intermediaries,id',
            'nama_proyek'               =>  'required',
            'klasifikasi_portfolio_id'  =>  'required|exists:tabel_klasifikasi_portfolios,id',
            'impact_goals_id'           =>  'required|exists:tabel_impact_goals,id',
            'estimasi_nilai_usd'        =>  'required',
            'estimasi_nilai_idr'        =>  'required',
            'usulan_durasi'             =>  'required',
            'status_kemajuan_id'        =>  'required|exists:tabel_status_kemajuans,id',
            'dokumen'                   =>  'required|file|mimes:pdf,jpg,jpeg,png,gif',
        ]);

        $proposal = new Proposal([
            'donor_id'                   =>   $request->donor_id,
            'tujuan_pendanaan_id'        =>   $request->tujuan_pendanaan_id,
            'jenis_penerimaan_id'        =>   $request->jenis_penerimaan_id,
            'saluran_pendanaan_id'       =>   $request->saluran_pendanaan_id,
            'jenis_intermediaries_id'    =>   $request->jenis_intermediaries_id,
            'nama_proyek'                =>   $request->nama_proyek,
            'klasifikasi_portfolio_id'   =>   $request->klasifikasi_portfolio_id,
            'impact_goals_id'            =>   json_encode($request->impact_goals_id),
            'estimasi_nilai_usd'         =>   $request->estimasi_nilai_usd,
            'estimasi_nilai_idr'         =>   $request->estimasi_nilai_idr,
            'usulan_durasi'              =>   $request->usulan_durasi,
            'status_kemajuan_id'         =>   $request->status_kemajuan_id,
            'dokumen'                    =>   $request->dokumen,
        ]);

        if ($request->hasFile('dokumen')) {
            $namaFile = $request->dokumen->getClientOriginalName();
            $path = $request->dokumen->move('assets/proposal/dokumen', $namaFile);
            $proposal->dokumen = 'assets/proposal/dokumen/' . $namaFile;
        }
        $proposal->save();
        return redirect()->route('pages.proposal')->with('success', 'Proposal berhasil disimpan.');
    }

    public function show($id) {
        $proposal = Proposal::findOrFail($id);
        return view('proposal.view', compact('proposal'));
    }

    public function edit($id) {
        $donorID = Donor::all();
        $tujuanPendanaan = TabelTujuanPendanaan::all();
        $jenisPenerimaan = TabelJenisPenerimaan::all();
        $saluranPendanaan = TabelSaluranPendanaan::all();
        $jenisIntermediaries = TabelJenisIntermediaries::all();
        $proposal = Proposal::findOrFail($id);
        $klasifikasiPortfolios = TabelKlasifikasiPortfolios::all();
        $impactGoals = TabelImpactGoals::all();
        $statusKemajuan = TabelStatusKemajuan::all();
        return view('proposal.edit', compact('donorID', 'tujuanPendanaan',
        'jenisPenerimaan', 'saluranPendanaan', 'jenisIntermediaries','proposal',
        'klasifikasiPortfolios', 'impactGoals', 'statusKemajuan'));
    }

    public function update(Request $request, Proposal $proposal) {
        $request -> validate ([
            'donor_id'                  =>  'required|exists:donors,id',
            'tujuan_pendanaan_id'       =>  'required|exists:tabel_tujuan_pendanaans,id',
            'jenis_penerimaan_id'       =>  'required|exists:tabel_jenis_penerimaans,id',
            'saluran_pendanaan_id'      =>  'required|exists:tabel_saluran_pendanaans,id',
            'jenis_intermediaries_id'   =>  'required|exists:tabel_jenis_intermediaries,id',
            'nama_proyek'               =>  'required',
            'klasifikasi_portfolio_id'  =>  'required|exists:tabel_klasifikasi_portfolios,id',
            'impact_goals_id'           =>  'required|exists:tabel_impact_goals,id',
            'estimasi_nilai_usd'        =>  'required',
            'estimasi_nilai_idr'        =>  'required',
            'usulan_durasi'             =>  'required',
            'status_kemajuan_id'        =>  'required|exists:tabel_status_kemajuans,id',
            'dokumen'                   =>  'file',
        ]);

        $proposal -> update($request->only([
            'donor_id',
            'tujuan_pendanaan_id',
            'jenis_penerimaan_id',
            'saluran_pendanaan_id',
            'jenis_intermediaries_id',
            'nama_proyek',
            'klasifikasi_portfolio_id',
            'impact_goals_id',
            'estimasi_nilai_usd',
            'estimasi_nilai_idr',
            'usulan_durasi',
            'status_kemajuan_id',
        ]));

        if ($request->hasFile('dokumen')) {
            $namaFile = $request->dokumen->getClientOriginalName();
            $path = $request->dokumen->move('assets/proposal/dokumen', $namaFile);
            File::delete($proposal->dokumen);
            $proposal->dokumen = 'assets/proposal/dokumen/' . $namaFile;
        }
        $proposal->save();
        return redirect()->route('pages.proposal', ['proposal' => $proposal->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy($id) {
        $proposal = Proposal::findOrFail($id);
        File::delete($proposal->dokumen);
        $proposal->delete();
        return redirect()->route('pages.proposal')->with('success', 'Date berhasil dihapus');
    }

}
