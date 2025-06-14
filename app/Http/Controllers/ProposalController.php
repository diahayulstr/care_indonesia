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
    public function cari_proposal(Request $request) {
        $keyword = $request->cari;
        $proposal = Proposal::select('proposals.*', 'donors.nama_organisasi AS nama_organisasi',
                            'tabel_tujuan_pendanaans.name AS tujuan_name', 'tabel_jenis_penerimaans.name AS jenis_name',
                            'tabel_saluran_pendanaans.name AS saluran_pendanaan_name', 'tabel_jenis_intermediaries.name AS intermediaries_name',
                            'tabel_klasifikasi_portfolios.name AS klasifikasi_name', 'tabel_status_kemajuans.name AS kemajuan_name',
                            'tabel_impact_goals.name AS impact_name')
                    ->leftJoin('donors', 'proposals.donor_id', '=', 'donors.id')
                    ->leftJoin('tabel_tujuan_pendanaans', 'proposals.tujuan_pendanaan_id', '=', 'tabel_tujuan_pendanaans.id')
                    ->leftJoin('tabel_jenis_penerimaans', 'proposals.jenis_penerimaan_id', '=', 'tabel_jenis_penerimaans.id')
                    ->leftJoin('tabel_saluran_pendanaans', 'proposals.saluran_pendanaan_id', '=', 'tabel_saluran_pendanaans.id')
                    ->leftJoin('tabel_jenis_intermediaries', 'proposals.jenis_intermediaries_id', '=', 'tabel_jenis_intermediaries.id')
                    ->leftJoin('tabel_klasifikasi_portfolios', 'proposals.klasifikasi_portfolio_id', '=', 'tabel_klasifikasi_portfolios.id')
                    ->leftJoin('tabel_status_kemajuans', 'proposals.status_kemajuan_id', '=', 'tabel_status_kemajuans.id')
                    ->leftJoin('tabel_impact_goals', 'proposals.impact_goals_id', '=', 'tabel_impact_goals.id')
                    ->where(function($query) use ($keyword) {
                        $query->where('donors.nama_organisasi', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.nama_proyek', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.donor_id', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.tujuan_pendanaan_id', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.jenis_penerimaan_id', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.saluran_pendanaan_id', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.jenis_intermediaries_id', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.klasifikasi_portfolio_id', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.impact_goals_id', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.estimasi_nilai_usd', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.estimasi_nilai_idr', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.usulan_durasi', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.status_kemajuan_id', 'LIKE', '%' . $keyword . '%')
                              ->orWhere('proposals.dokumen_proposal', 'LIKE', '%' . $keyword . '%');
                    })
                    ->orWhere('tabel_tujuan_pendanaans.name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('tabel_jenis_penerimaans.name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('tabel_saluran_pendanaans.name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('tabel_jenis_intermediaries.name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('tabel_klasifikasi_portfolios.name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('tabel_status_kemajuans.name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere(function($query) use ($keyword) {
                        $impactGoalsValues = explode(',', $keyword);
                        foreach ($impactGoalsValues as $value) {
                            $query->orWhere('proposals.impact_goals_id', 'LIKE', '%' . trim($value) . '%');
                        }
                    })
                    ->distinct()
                    ->get();

        return view('pages.proposal-cari', compact('proposal'));
    }


    public function proposal() {
        $proposal = Proposal::paginate(2);
        return view('pages.proposal', compact('proposal'));
    }

    // public function addProposal() {
    //     $donorID = Donor::all();
    //     $impactGoals = TabelImpactGoals::all();
    //     $jenisIntermediaries = TabelJenisIntermediaries::all();
    //     $jenisPenerimaan = TabelJenisPenerimaan::all();
    //     $klasifikasiPortfolios = TabelKlasifikasiPortfolios::all();
    //     $saluranPendanaan = TabelSaluranPendanaan::all();
    //     $statusKemajuan = TabelStatusKemajuan::all();
    //     $tujuanPendanaan = TabelTujuanPendanaan::all();
    //     return view('proposal.add', compact('donorID', 'impactGoals', 'jenisIntermediaries',
    //     'jenisPenerimaan', 'klasifikasiPortfolios', 'saluranPendanaan', 'statusKemajuan',
    //     'tujuanPendanaan'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'donor_id'                  =>  'required|exists:donors,id',
    //         'tujuan_pendanaan_id'       =>  'required|exists:tabel_tujuan_pendanaans,id',
    //         'jenis_penerimaan_id'       =>  'required|exists:tabel_jenis_penerimaans,id',
    //         'saluran_pendanaan_id'      =>  'required|exists:tabel_saluran_pendanaans,id',
    //         'jenis_intermediaries_id'   =>  'required|exists:tabel_jenis_intermediaries,id',
    //         'nama_proyek'               =>  'required',
    //         'klasifikasi_portfolio_id'  =>  'required|exists:tabel_klasifikasi_portfolios,id',
    //         'impact_goals_id'           =>  'required|exists:tabel_impact_goals,id',
    //         'estimasi_nilai_usd'        =>  'required',
    //         'estimasi_nilai_idr'        =>  'required',
    //         'usulan_durasi'             =>  'required',
    //         'status_kemajuan_id'        =>  'required|exists:tabel_status_kemajuans,id',
    //         'dokumen_proposal'          =>  'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif',
    //     ]);

    //     $proposal = new Proposal([
    //         'donor_id'                   =>   $request->donor_id,
    //         'tujuan_pendanaan_id'        =>   $request->tujuan_pendanaan_id,
    //         'jenis_penerimaan_id'        =>   $request->jenis_penerimaan_id,
    //         'saluran_pendanaan_id'       =>   $request->saluran_pendanaan_id,
    //         'jenis_intermediaries_id'    =>   $request->jenis_intermediaries_id,
    //         'nama_proyek'                =>   $request->nama_proyek,
    //         'klasifikasi_portfolio_id'   =>   $request->klasifikasi_portfolio_id,
    //         'impact_goals_id'            =>   json_encode($request->impact_goals_id),
    //         'estimasi_nilai_usd'         =>   $request->estimasi_nilai_usd,
    //         'estimasi_nilai_idr'         =>   $request->estimasi_nilai_idr,
    //         'usulan_durasi'              =>   $request->usulan_durasi,
    //         'status_kemajuan_id'         =>   $request->status_kemajuan_id,
    //     ]);

    //     if ($request->hasFile('dokumen_proposal')) {
    //         $namaFile = $request->dokumen_proposal->getClientOriginalName();
    //         $path = 'assets/proposal/dokumen/' . $namaFile;
    //         $counter = 1;
    //         while (file_exists($path)) {
    //             $namaFile = pathinfo($namaFile, PATHINFO_FILENAME) . " ($counter)." . pathinfo($namaFile, PATHINFO_EXTENSION);
    //             $path = 'assets/proposal/dokumen/' . $namaFile;
    //             $counter++;
    //         }
    //         $request->dokumen_proposal->move('assets/proposal/dokumen', $namaFile);
    //         $proposal->dokumen_proposal = $path;
    //     }
    //     $proposal->save();
    //     return redirect()->route('pages.proposal')->with('success', 'Data proposal berhasil ditambahkan');
    // }

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
            'dokumen_proposal'          =>  'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif',
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

        if ($request->hasFile('dokumen_proposal')) {
            $donor = Donor::find($proposal->donor_id);
            if ($donor) {
                $namaDonor = $donor->nama_organisasi;
                $extension = $request->dokumen_proposal->getClientOriginalExtension();
                $tanggalUpdate = now()->format('d-m-Y');
                $proposal->save();
                $idProposal = $proposal->id; 
                $namaFileBaru = $namaDonor . '_ID-' . $idProposal . '_' . $tanggalUpdate . '.' . $extension;
                $request->dokumen_proposal->move('assets/proposal/dokumen', $namaFileBaru);
                $proposal->dokumen_proposal = 'assets/proposal/dokumen/' . $namaFileBaru;
            }
        }

        $proposal->save();
        return redirect()->route('pages.proposal', ['proposal' => $proposal->id])
        ->with('toast_success', 'Data proposal berhasil diupdate');
    }

    public function destroy($id) {
        $proposal = Proposal::findOrFail($id);
        File::delete($proposal->dokumen_proposal);
        $proposal->delete();
        return redirect()->route('pages.proposal')->with('success', 'Data proposal berhasil dihapus');
    }

    public function grid_add_proposal() {
        $donorID = Donor::all();
        $impactGoals = TabelImpactGoals::all();
        $jenisIntermediaries = TabelJenisIntermediaries::all();
        $jenisPenerimaan = TabelJenisPenerimaan::all();
        $klasifikasiPortfolios = TabelKlasifikasiPortfolios::all();
        $saluranPendanaan = TabelSaluranPendanaan::all();
        $statusKemajuan = TabelStatusKemajuan::all();
        $tujuanPendanaan = TabelTujuanPendanaan::all();
        return view('proposal.gridAdd', compact('donorID', 'impactGoals', 'jenisIntermediaries',
        'jenisPenerimaan', 'klasifikasiPortfolios', 'saluranPendanaan', 'statusKemajuan',
        'tujuanPendanaan'));
    }

    public function store_grid_add_proposal(Request $request) {
        $request->validate([
            'inputs_proposal.*.donor_id'                  =>  'required|exists:donors,id',
            'inputs_proposal.*.tujuan_pendanaan_id'       =>  'required|exists:tabel_tujuan_pendanaans,id',
            'inputs_proposal.*.jenis_penerimaan_id'       =>  'required|exists:tabel_jenis_penerimaans,id',
            'inputs_proposal.*.saluran_pendanaan_id'      =>  'required|exists:tabel_saluran_pendanaans,id',
            'inputs_proposal.*.jenis_intermediaries_id'   =>  'required|exists:tabel_jenis_intermediaries,id',
            'inputs_proposal.*.nama_proyek'               =>  'required',
            'inputs_proposal.*.klasifikasi_portfolio_id'  =>  'required|exists:tabel_klasifikasi_portfolios,id',
            'inputs_proposal.*.impact_goals_id'           =>  'required|exists:tabel_impact_goals,id',
            'inputs_proposal.*.estimasi_nilai_usd'        =>  'required',
            'inputs_proposal.*.estimasi_nilai_idr'        =>  'required',
            'inputs_proposal.*.usulan_durasi'             =>  'required',
            'inputs_proposal.*.status_kemajuan_id'        =>  'required|exists:tabel_status_kemajuans,id',
            'inputs_proposal.*.dokumen_proposal'          =>  'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif',
        ]);
        foreach($request->inputs_proposal as $key => $value) {
            $proposal = new Proposal([
                'donor_id'                  => $value['donor_id'],
                'tujuan_pendanaan_id'       => $value['tujuan_pendanaan_id'],
                'jenis_penerimaan_id'       => $value['jenis_penerimaan_id'],
                'saluran_pendanaan_id'      => $value['saluran_pendanaan_id'],
                'jenis_intermediaries_id'   => $value['jenis_intermediaries_id'],
                'nama_proyek'               => $value['nama_proyek'],
                'klasifikasi_portfolio_id'  => $value['klasifikasi_portfolio_id'],
                'impact_goals_id'           => json_encode($value['impact_goals_id']),
                'estimasi_nilai_usd'        => $value['estimasi_nilai_usd'],
                'estimasi_nilai_idr'        => $value['estimasi_nilai_idr'],
                'usulan_durasi'             => $value['usulan_durasi'],
                'status_kemajuan_id'        => $value['status_kemajuan_id'],
            ]);

            if ($request->hasFile('inputs_proposal.'.$key.'.dokumen_proposal')) {
                $donor = Donor::find($proposal->donor_id);
                if ($donor) {
                    $namaDonor = $donor->nama_organisasi;
                    $extension = $request->file('inputs_proposal.'.$key.'.dokumen_proposal')->getClientOriginalExtension();
                    $tanggalUpdate = now()->format('d-m-Y');
                    $proposal->save();
                    $idProposal = $proposal->id; 
                    $namaFileBaru = $namaDonor . '_ID-' . $idProposal . '_' . $tanggalUpdate . '.' . $extension;
                    $request->file('inputs_proposal.'.$key.'.dokumen_proposal')->move('assets/proposal/dokumen', $namaFileBaru);
                    $proposal->dokumen_proposal = 'assets/proposal/dokumen/' . $namaFileBaru;
                }
            }    
            $proposal->save();
        }
        return redirect()->route('pages.proposal')
            ->with('toast_success', 'Data proposal berhasil ditambahkan.');
    }

    public function edit_grid_proposal() {
        $donorID = Donor::all();
        $tujuanPendanaan = TabelTujuanPendanaan::all();
        $jenisPenerimaan = TabelJenisPenerimaan::all();
        $saluranPendanaan = TabelSaluranPendanaan::all();
        $jenisIntermediaries = TabelJenisIntermediaries::all();
        $proposal = Proposal::all();
        $klasifikasiPortfolios = TabelKlasifikasiPortfolios::all();
        $impactGoals = TabelImpactGoals::all();
        $statusKemajuan = TabelStatusKemajuan::all();
        return view('proposal.gridEdit', compact('donorID', 'tujuanPendanaan',
        'jenisPenerimaan', 'saluranPendanaan', 'jenisIntermediaries','proposal',
        'klasifikasiPortfolios', 'impactGoals', 'statusKemajuan'));
    }

    public function update_grid_proposal(Request $request) {
        $request -> validate ([
            'inputs_proposal.*.donor_id'                  =>  'required|exists:donors,id',
            'inputs_proposal.*.tujuan_pendanaan_id'       =>  'required|exists:tabel_tujuan_pendanaans,id',
            'inputs_proposal.*.jenis_penerimaan_id'       =>  'required|exists:tabel_jenis_penerimaans,id',
            'inputs_proposal.*.saluran_pendanaan_id'      =>  'required|exists:tabel_saluran_pendanaans,id',
            'inputs_proposal.*.jenis_intermediaries_id'   =>  'required|exists:tabel_jenis_intermediaries,id',
            'inputs_proposal.*.nama_proyek'               =>  'required',
            'inputs_proposal.*.klasifikasi_portfolio_id'  =>  'required|exists:tabel_klasifikasi_portfolios,id',
            'inputs_proposal.*.impact_goals_id'           =>  'required|exists:tabel_impact_goals,id',
            'inputs_proposal.*.estimasi_nilai_usd'        =>  'required',
            'inputs_proposal.*.estimasi_nilai_idr'        =>  'required',
            'inputs_proposal.*.usulan_durasi'             =>  'required',
            'inputs_proposal.*.status_kemajuan_id'        =>  'required|exists:tabel_status_kemajuans,id',
            'inputs_proposal.*.dokumen_proposal'          =>  'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif',
        ]);

        foreach ($request->input('inputs_proposal') as $key => $item) {
            $proposal = Proposal::findOrFail($key);
            $proposal->update([
                'donor_id'                  => $item['donor_id'],
                'tujuan_pendanaan_id'       => $item['tujuan_pendanaan_id'],
                'jenis_penerimaan_id'       => $item['jenis_penerimaan_id'],
                'saluran_pendanaan_id'      => $item['saluran_pendanaan_id'],
                'jenis_intermediaries_id'   => $item['jenis_intermediaries_id'],
                'nama_proyek'               => $item['nama_proyek'],
                'klasifikasi_portfolio_id'  => $item['klasifikasi_portfolio_id'],
                'impact_goals_id'           => json_encode($item['impact_goals_id']),
                'estimasi_nilai_usd'        => $item['estimasi_nilai_usd'],
                'estimasi_nilai_idr'        => $item['estimasi_nilai_idr'],
                'usulan_durasi'             => $item['usulan_durasi'],
                'status_kemajuan_id'        => $item['status_kemajuan_id'],
            ]);
            if ($request->hasFile('inputs_proposal.'.$key.'.dokumen_proposal')) {
                $donor = Donor::find($proposal->donor_id);
                if ($donor) {
                    $namaDonor = $donor->nama_organisasi;
                    $extension = $request->file('inputs_proposal.'.$key.'.dokumen_proposal')->getClientOriginalExtension();
                    $tanggalUpdate = now()->format('d-m-Y');
                    $proposal->save();
                    $idProposal = $proposal->id; 
                    $namaFileBaru = $namaDonor . '_ID-' . $idProposal . '_' . $tanggalUpdate . '.' . $extension;
                    $request->file('inputs_proposal.'.$key.'.dokumen_proposal')->move('assets/proposal/dokumen', $namaFileBaru);
                    $proposal->dokumen_proposal = 'assets/proposal/dokumen/' . $namaFileBaru;
                }
            }    
            $proposal->save();
        }
        return redirect()->route('pages.proposal', ['proposal' => $proposal->id])
        ->with('toast_success', 'Data proposal berhasil diupdate');
    }

    public function destroy_grid_edit_proposal($id) {
        $proposal = Proposal::findOrFail($id);
        $donorId = $proposal->donor_id;
        File::delete($proposal->dokumen_proposal);
        $proposal->delete();
        return redirect()->route('proposal.gridEdit')
                         ->with('success', 'Data proposal berhasil dihapus.');
    }
}
