<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\Narahubung;
use App\Models\Komunikasi;
use App\Models\Proposal;
use App\Models\TabelStatus;
use App\Models\TabelSaluran;
use App\Models\TabelJenjangKomunikasi;
use App\Models\TabelTindakLanjut;
use App\Models\TabelImpactGoals;
use App\Models\TabelJenisIntermediaries;
use App\Models\TabelJenisPenerimaan;
use App\Models\TabelKlasifikasiPortfolios;
use App\Models\TabelSaluranPendanaan;
use App\Models\TabelStatusKemajuan;
use App\Models\TabelTujuanPendanaan;
use App\Models\Province;
use App\Models\TabelJenisOrganisasi;
use App\Models\TabelKomitmenSdg;


class MasterController extends Controller
{
    public function master_add() {
        return view('donor.master.add_master');
    }

    public function master_show(Request $request, $id) {
        $donor = Donor::findOrFail($id);
        $narahubungs = $donor->narahubungs;
        $komunikasis = $donor->komunikasis;
        $proposals = $donor->proposals;
        $status = TabelStatus::all();
        $saluran = TabelSaluran::all();
        $jenjangKomunikasi = TabelJenjangKomunikasi::all();
        $tindakLanjut = TabelTindakLanjut::all();
        $impactGoals = TabelImpactGoals::all();
        $jenisIntermediaries = TabelJenisIntermediaries::all();
        $jenisPenerimaan = TabelJenisPenerimaan::all();
        $klasifikasiPortfolios = TabelKlasifikasiPortfolios::all();
        $saluranPendanaan = TabelSaluranPendanaan::all();
        $statusKemajuan = TabelStatusKemajuan::all();
        $tujuanPendanaan = TabelTujuanPendanaan::all();
        return view('donor.master.view_master', compact('donor', 'narahubungs',
        'komunikasis', 'proposals', 'status', 'saluran', 'jenjangKomunikasi','tindakLanjut',
        'impactGoals', 'jenisIntermediaries',
        'jenisPenerimaan', 'klasifikasiPortfolios', 'saluranPendanaan', 'statusKemajuan',
        'tujuanPendanaan'));
    }

    public function master_edit($id) {
        $donor = Donor::findOrFail($id);
        $narahubung = Narahubung::where('donor_id', $id)->get();
        $komunikasi = Komunikasi::where('donor_id', $id)->get();
        $proposal = Proposal::where('donor_id', $id)->get();

        $provinces = Province::all();
        $jenisOrganisasis = TabelJenisOrganisasi::all();
        $komitmenSdgs = TabelKomitmenSdg::all();
        $status = TabelStatus::all();
        $saluran = TabelSaluran::all();
        $jenjangKomunikasi = TabelJenjangKomunikasi::all();
        $tindakLanjut = TabelTindakLanjut::all();
        $tujuanPendanaan = TabelTujuanPendanaan::all();
        $jenisPenerimaan = TabelJenisPenerimaan::all();
        $saluranPendanaan = TabelSaluranPendanaan::all();
        $jenisIntermediaries = TabelJenisIntermediaries::all();
        $klasifikasiPortfolios = TabelKlasifikasiPortfolios::all();
        $impactGoals = TabelImpactGoals::all();
        $statusKemajuan = TabelStatusKemajuan::all();

        return view('donor.master.edit_master', compact(
            'donor', 'narahubung', 'komunikasi', 'proposal',
            'provinces', 'jenisOrganisasis', 'komitmenSdgs', 'status', 'saluran', 'jenjangKomunikasi', 'tindakLanjut',
            'tujuanPendanaan', 'jenisPenerimaan', 'saluranPendanaan', 'jenisIntermediaries',
            'klasifikasiPortfolios', 'impactGoals', 'statusKemajuan'
        ));
    }

    public function store_narahubung(Request $request) {
        $request->validate([
            'donor_id'       => 'required|exists:donors,id',
            'nama_kontak'    => 'required',
            'jabatan'        => 'required',
            'email'          => 'required|max:15',
            'no_telp'        => 'required',
            'status_id'      => 'required|exists:tabel_statuses,id',
        ]);
        $narahubung = new Narahubung();
        $narahubung->donor_id       = $request->donor_id;
        $narahubung->nama_kontak    = $request->nama_kontak;
        $narahubung->jabatan        = $request->jabatan;
        $narahubung->email          = $request->email;
        $narahubung->no_telp        = $request->no_telp;
        $narahubung->status_id      = $request->status_id;
        $narahubung->save();
        $donorId = $request->donor_id;
        return redirect()->route('donor.master.view_master', ['master' => $donorId])
        ->with('toast_success', 'Data narahubung berhasil ditambahkan.');
    }

    public function update_narahubung(Request $request, $master_narahubung)
{
    // Validasi input
    $request->validate([
        'donor_id'      =>  'required|exists:donors,id',
        'nama_kontak'   =>  'required',
        'jabatan'       =>  'required',
        'email'         =>  'required',
        'no_telp'       =>  'required|max:15',
        'status_id'     =>  'required|exists:tabel_statuses,id',
    ]);

    // Dapatkan data Narahubung berdasarkan ID
    $narahubung = Narahubung::findOrFail($master_narahubung);

    // Perbarui data Narahubung dengan data yang diterima dari request
    $narahubung->update([
        'donor_id'      => $request->donor_id,
        'nama_kontak'   => $request->nama_kontak,
        'jabatan'       => $request->jabatan,
        'email'         => $request->email,
        'no_telp'       => $request->no_telp,
        'status_id'     => $request->status_id,
    ]);

    // Redirect kembali dengan pesan sukses
    return redirect()->route('donor.master.view_master', ['master' => $narahubung->id])
        ->with('toast_success', 'Data berhasil diupdate');
}



    public function destroy_narahubung($id) {
        $narahubung = Narahubung::findOrFail($id);
        $donorId = $narahubung->donor_id;
        $narahubung->delete();
        return redirect()->route('donor.master.view_master', ['master' => $donorId])
                         ->with('success', 'Data narahubung berhasil dihapus.');
    }

    public function store_komunikasi(Request $request) {
        $request -> validate ([
            'donor_id'              =>  'required|exists:donors,id',
            'tanggal'               =>  'required',
            'saluran_id'            =>  'required|exists:tabel_salurans,id',
            'jenjang_komunikasi_id' =>  'required|exists:tabel_jenjang_komunikasis,id',
            'tindak_lanjut_id'      =>  'required|exists:tabel_tindak_lanjuts,id',
            'catatan'               =>  'required',
            'tgl_selanjutnya'       =>  'required',
            'dokumen'               =>  'required|file|mimes:pdf,jpg,jpeg,png,gif',
        ]);
        $komunikasi = new Komunikasi();
        $komunikasi->donor_id               =   $request->donor_id;
        $komunikasi->tanggal                =   $request->tanggal;
        $komunikasi->saluran_id             =   $request->saluran_id;
        $komunikasi->jenjang_komunikasi_id  =   $request->jenjang_komunikasi_id;
        $komunikasi->tindak_lanjut_id       =   $request->tindak_lanjut_id;
        $komunikasi->catatan                =   $request->catatan;
        $komunikasi->tgl_selanjutnya        =   $request->tgl_selanjutnya;
        if ($request->hasFile('dokumen')) {
            $extFile = $request->dokumen->getClientOriginalExtension();
            $namaFile = 'user-'.time().".".$extFile;
            $path = $request->dokumen->move('assets/komunikasi/dokumen',$namaFile);
            $komunikasi->dokumen = $path;
        }
        $komunikasi->save();
        $donorId = $request->donor_id;
        return redirect()->route('donor.master.view_master', ['master' => $donorId])->
        with('toast_success', 'Data komunikasi berhasil ditambahkan');
    }

    public function destroy_komunikasi($id) {
        $komunikasi = Komunikasi::findOrFail($id);
        $donorId = $komunikasi->donor_id;
        $komunikasi->delete();
        return redirect()->route('donor.master.view_master', ['master' => $donorId])
                         ->with('success', 'Data komunikasi berhasil dihapus.');
    }

    public function store_proposal(Request $request) {
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
            $extFile = $request->dokumen->getClientOriginalExtension();
            $namaFile = 'user-' . time() . "." . $extFile;
            $path = $request->dokumen->move('assets/proposal/dokumen', $namaFile);
            $proposal->dokumen = $path;
        }
        $proposal->save();
        $donorId = $request->donor_id;
        return redirect()->route('donor.master.view_master', ['master' => $donorId])
        ->with('success', 'Proposal berhasil disimpan.');
    }

}

