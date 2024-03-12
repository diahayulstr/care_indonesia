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

class HomeController extends Controller
{
    public function impact_goals() {
        $impactGoals = TabelImpactGoals::all();
        return view('admin.impactGoals', compact('impactGoals'));
    }

    public function jenis_intermediaries() {
        $jenisIntermediary = TabelJenisIntermediaries::all();
        return view('admin.jenisIntermediary', compact('jenisIntermediary'));
    }

    public function jenis_organisasi() {
        $jenisOrganisasi = TabelJenisOrganisasi::all();
        return view('admin.jenisOrganisasi', compact('jenisOrganisasi'));
    }

    public function jenis_penerimaan() {
        $jenisPenerimaan = TabelJenisPenerimaan::all();
        return view('admin.jenisPenerimaan', compact('jenisPenerimaan'));
    }

    public function jenjang_komunikasi() {
        $jenjangKomunikasi = TabelJenjangKomunikasi::all();
        return view('admin.jenjangKomunikasi', compact('jenjangKomunikasi'));
    }

    public function klasifikasi_portfolio() {
        $klasifikasiPortfolio = TabelKlasifikasiPortfolios::all();
        return view('admin.klasifikasiPortfolio', compact('klasifikasiPortfolio'));
    }

    public function komitmen_sdgs() {
        $komitmenSdgs = TabelKomitmenSdg::all();
        return view('admin.komitmenSdgs', compact('komitmenSdgs'));
    }

    public function saluran() {
        $saluran = TabelSaluran::all();
        return view('admin.saluran', compact('saluran'));
    }

    public function saluran_pendanaan() {
        $saluranPendanaan = TabelSaluranPendanaan::all();
        return view('admin.saluranPendanaan', compact('saluranPendanaan'));
    }

    public function status() {
        $status = TabelStatus::all();
        return view('admin.status', compact('status'));
    }

    public function status_kemajuan() {
        $statusKemajuan = TabelStatusKemajuan::all();
        return view('admin.statusKemajuan', compact('statusKemajuan'));
    }

    public function tindak_lanjut() {
        $tindakLanjut = TabelTindakLanjut::all();
        return view('admin.tindakLanjut', compact('tindakLanjut'));
    }

    public function tujuan_pendanaan() {
        $tujuanPendanaan = TabelTujuanPendanaan::all();
        return view('admin.tujuanPendanaan', compact('tujuanPendanaan'));
    }

}
