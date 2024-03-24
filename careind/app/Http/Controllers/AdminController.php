<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabelImpactGoals;
use App\Models\TabelJenisIntermediaries;
use App\Models\TabelJenisOrganisasi;
use App\Models\TabelJenisPenerimaan;
use App\Models\TabelJenjangKomunikasi;
use App\Models\TabelKlasifikasiPortfolios;
use App\Models\TabelKomitmenSdg;
use App\Models\TabelSaluran;
use App\Models\TabelSaluranPendanaan;
use App\Models\TabelStatus;
use App\Models\TabelStatusKemajuan;
use App\Models\TabelTindakLanjut;
use App\Models\TabelTujuanPendanaan;

class AdminController extends Controller
{
    // LOGIN
    public function login() {
        return view('auth.login');
    }

    // IMPACT GOALS
    public function store_impact_goals(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $impact_goals = new TabelImpactGoals();
        $impact_goals->name     = $request->name;
        $impact_goals->save();
        return redirect()->route('admin.impactGoals')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_impact_goals(Request $request, TabelImpactGoals $impact_goals) {
        $request->validate([
            'name'  => 'required',
        ]);
        $impact_goals -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.impactGoals', ['impact_goals' => $impact_goals->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_impact_goals($id) {
        $impact_goals = TabelImpactGoals::findOrFail($id);
        $impact_goals->delete();
        return redirect()->route('admin.impactGoals')
        ->with('success', 'Data berhasil dihapus');
    }


    // JENIS INTERMEDIARY
    public function store_jenis_intermediary(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $jenis_intermediary = new TabelJenisIntermediaries();
        $jenis_intermediary->name     = $request->name;
        $jenis_intermediary->save();
        return redirect()->route('admin.jenisIntermediary')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_jenis_intermediary(Request $request, TabelJenisIntermediaries $jenis_intermediary) {
        $request->validate([
            'name'  => 'required',
        ]);
        $jenis_intermediary -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.jenisIntermediary', ['jenis_intermediary' => $jenis_intermediary->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_jenis_intermediary($id) {
        $jenis_intermediary = TabelJenisIntermediaries::findOrFail($id);
        $jenis_intermediary->delete();
        return redirect()->route('admin.jenisIntermediary')
        ->with('success', 'Data berhasil dihapus');
    }

    // JENIS ORGANISASI
    public function store_jenis_organisasi(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $jenis_organisasi = new TabelJenisOrganisasi();
        $jenis_organisasi->name     = $request->name;
        $jenis_organisasi->save();
        return redirect()->route('admin.jenisOrganisasi')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_jenis_organisasi(Request $request, TabelJenisOrganisasi $jenis_organisasi) {
        $request->validate([
            'name'  => 'required',
        ]);
        $jenis_organisasi -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.jenisOrganisasi', ['jenis_organisasi' => $jenis_organisasi->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_jenis_organisasi($id) {
        $jenis_organisasi = TabelJenisOrganisasi::findOrFail($id);
        $jenis_organisasi->delete();
        return redirect()->route('admin.jenisOrganisasi')
        ->with('success', 'Data berhasil dihapus');
    }

    // JENIS PENERIMAAN
    public function store_jenis_penerimaan(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $jenis_penerimaan = new TabelJenisPenerimaan();
        $jenis_penerimaan->name     = $request->name;
        $jenis_penerimaan->save();
        return redirect()->route('admin.jenisPenerimaan')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_jenis_penerimaan(Request $request, TabelJenisPenerimaan $jenis_penerimaan) {
        $request->validate([
            'name'  => 'required',
        ]);
        $jenis_penerimaan -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.jenisPenerimaan', ['jenis_penerimaan' => $jenis_penerimaan->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_jenis_penerimaan($id) {
        $jenis_penerimaan = TabelJenisPenerimaan::findOrFail($id);
        $jenis_penerimaan->delete();
        return redirect()->route('admin.jenisPenerimaan')->with('success', 'Data berhasil dihapus');
    }

    // JENJANG KOMUNIKASI
    public function store_jenjang_komunikasi(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $jenjang_komunikasi = new TabelJenjangKomunikasi();
        $jenjang_komunikasi->name     = $request->name;
        $jenjang_komunikasi->save();
        return redirect()->route('admin.jenjangKomunikasi')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_jenjang_komunikasi(Request $request, TabelJenjangKomunikasi $jenjang_komunikasi) {
        $request->validate([
            'name'  => 'required',
        ]);
        $jenjang_komunikasi -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.jenjangKomunikasi', ['jenjang_komunikasi' => $jenjang_komunikasi->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_jenjang_komunikasi($id) {
        $jenjang_komunikasi = TabelJenjangKomunikasi::findOrFail($id);
        $jenjang_komunikasi->delete();
        return redirect()->route('admin.jenjangKomunikasi')->with('success', 'Data berhasil dihapus');
    }

    // KLASIFIKASI PORTFOLIO
    public function store_klasifikasi_portfolio(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $klasifikasi_portfolio          = new TabelKlasifikasiPortfolios();
        $klasifikasi_portfolio->name    = $request->name;
        $klasifikasi_portfolio->save();
        return redirect()->route('admin.klasifikasiPortfolio')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_klasifikasi_portfolio(Request $request, TabelKlasifikasiPortfolios $klasifikasi_portfolio) {
        $request->validate([
            'name'  => 'required',
        ]);
        $klasifikasi_portfolio -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.klasifikasiPortfolio', ['klasifikasi_portfolio' => $klasifikasi_portfolio->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_klasifikasi_portfolio($id) {
        $klasifikasi_portfolio = TabelKlasifikasiPortfolios::findOrFail($id);
        $klasifikasi_portfolio->delete();
        return redirect()->route('admin.klasifikasiPortfolio')->with('success', 'Data berhasil dihapus');
    }

    // KOMITMEN SDGS
    public function store_komitmen_sdgs(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $komitmen_sdgs          = new TabelKomitmenSdg();
        $komitmen_sdgs->name    = $request->name;
        $komitmen_sdgs->save();
        return redirect()->route('admin.komitmenSdgs')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_komitmen_sdgs(Request $request, TabelKomitmenSdg $komitmen_sdgs) {
        $request->validate([
            'name'  => 'required',
        ]);
        $komitmen_sdgs -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.komitmenSdgs', ['komitmen_sdgs' => $komitmen_sdgs->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_komitmen_sdgs($id) {
        $komitmen_sdgs = TabelKomitmenSdg::findOrFail($id);
        $komitmen_sdgs->delete();
        return redirect()->route('admin.komitmenSdgs')->with('success', 'Data berhasil dihapus');
    }

    // SALURAN
    public function store_saluran(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $saluran         = new TabelSaluran();
        $saluran->name    = $request->name;
        $saluran->save();
        return redirect()->route('admin.saluran')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_saluran(Request $request, TabelSaluran $saluran) {
        $request->validate([
            'name'  => 'required',
        ]);
        $saluran -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.saluran', ['saluran' => $saluran->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_saluran($id) {
        $saluran = TabelSaluran::findOrFail($id);
        $saluran->delete();
        return redirect()->route('admin.saluran')->with('success', 'Data berhasil dihapus');
    }

    // SALURAN PENDANAAN
    public function store_saluran_pendanaan(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $saluran_pendanaan         = new TabelSaluranPendanaan();
        $saluran_pendanaan->name    = $request->name;
        $saluran_pendanaan->save();
        return redirect()->route('admin.saluranPendanaan')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_saluran_pendanaan(Request $request, TabelSaluranPendanaan $saluran_pendanaan) {
        $request->validate([
            'name'  => 'required',
        ]);
        $saluran_pendanaan -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.saluranPendanaan', ['saluran_pendanaan' => $saluran_pendanaan->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_saluran_pendanaan($id) {
        $saluran_pendanaan = TabelSaluranPendanaan::findOrFail($id);
        $saluran_pendanaan->delete();
        return redirect()->route('admin.saluranPendanaan')->with('success', 'Data berhasil dihapus');
    }

    // STATUS
    public function store_status(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $status         = new TabelStatus();
        $status->name    = $request->name;
        $status->save();
        return redirect()->route('admin.status')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_status(Request $request, TabelStatus $status) {
        $request->validate([
            'name'  => 'required',
        ]);
        $status -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.status', ['status' => $status->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_status($id) {
        $status = TabelStatus::findOrFail($id);
        $status->delete();
        return redirect()->route('admin.status')->with('success', 'Data berhasil dihapus');
    }

    // STATUS KEMAJUAN
    public function store_status_kemajuan(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $status_kemajuan         = new TabelStatusKemajuan();
        $status_kemajuan->name    = $request->name;
        $status_kemajuan->save();
        return redirect()->route('admin.statusKemajuan')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_status_kemajuan(Request $request, TabelStatusKemajuan $status_kemajuan) {
        $request->validate([
            'name'  => 'required',
        ]);
        $status_kemajuan -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.statusKemajuan', ['status_kemajuan' => $status_kemajuan->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_status_kemajuan($id) {
        $status_kemajuan = TabelStatusKemajuan::findOrFail($id);
        $status_kemajuan->delete();
        return redirect()->route('admin.statusKemajuan')->with('success', 'Data berhasil dihapus');
    }

    // TINDAK LANJUT
    public function store_tindak_lanjut(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $tindak_lanjut        = new TabelTindakLanjut();
        $tindak_lanjut->name    = $request->name;
        $tindak_lanjut->save();
        return redirect()->route('admin.tindakLanjut')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_tindak_lanjut(Request $request, TabelTindakLanjut $tindak_lanjut) {
        $request->validate([
            'name'  => 'required',
        ]);
        $tindak_lanjut -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.tindakLanjut', ['tindak_lanjut' => $tindak_lanjut->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_tindak_lanjut($id) {
        $tindak_lanjut = TabelTindakLanjut::findOrFail($id);
        $tindak_lanjut->delete();
        return redirect()->route('admin.tindakLanjut')->with('success', 'Data berhasil dihapus');
    }

    // TUJUAN PENDANAAN
    public function store_tujuan_pendanaan(Request $request) {
        $request->validate([
            'name'  =>  'required',
        ]);
        $tujuan_pendanaan        = new TabelTujuanPendanaan();
        $tujuan_pendanaan->name    = $request->name;
        $tujuan_pendanaan->save();
        return redirect()->route('admin.tujuanPendanaan')->
        with('toast_success', 'Data berhasil ditambahkan');
    }

    public function update_tujuan_pendanaan(Request $request, TabelTujuanPendanaan $tujuan_pendanaan) {
        $request->validate([
            'name'  => 'required',
        ]);
        $tujuan_pendanaan -> update($request->only([
            'name',
        ]));
        return redirect()->route('admin.tujuanPendanaan', ['tujuan_pendanaan' => $tujuan_pendanaan->id])
        ->with('toast_success', 'Data berhasil diupdate');
    }

    public function destroy_tujuan_pendanaan($id) {
        $tujuan_pendanaan = TabelTujuanPendanaan::findOrFail($id);
        $tujuan_pendanaan->delete();
        return redirect()->route('admin.tujuanPendanaan')->with('success', 'Data berhasil dihapus');
    }
}
