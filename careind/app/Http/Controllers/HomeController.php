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
        $impactGoals = TabelImpactGoals::paginate(4);
        return view('admin.impactGoals', compact('impactGoals'));
    }

    public function jenis_intermediaries() {
        $jenisIntermediary = TabelJenisIntermediaries::paginate(4);
        return view('admin.jenisIntermediary', compact('jenisIntermediary'));
    }

    public function jenis_organisasi() {
        $jenisOrganisasi = TabelJenisOrganisasi::paginate(4);
        return view('admin.jenisOrganisasi', compact('jenisOrganisasi'));
    }

    public function jenis_penerimaan() {
        $jenisPenerimaan = TabelJenisPenerimaan::paginate(4);
        return view('admin.jenisPenerimaan', compact('jenisPenerimaan'));
    }

    public function jenjang_komunikasi() {
        $jenjangKomunikasi = TabelJenjangKomunikasi::paginate(4);
        return view('admin.jenjangKomunikasi', compact('jenjangKomunikasi'));
    }

    public function klasifikasi_portfolio() {
        $klasifikasiPortfolio = TabelKlasifikasiPortfolios::paginate(4);
        return view('admin.klasifikasiPortfolio', compact('klasifikasiPortfolio'));
    }

    public function komitmen_sdgs() {
        $komitmenSdgs = TabelKomitmenSdg::paginate(4);
        return view('admin.komitmenSdgs', compact('komitmenSdgs'));
    }

    public function saluran() {
        $saluran = TabelSaluran::paginate(4);
        return view('admin.saluran', compact('saluran'));
    }

    public function saluran_pendanaan() {
        $saluranPendanaan = TabelSaluranPendanaan::paginate(4);
        return view('admin.saluranPendanaan', compact('saluranPendanaan'));
    }

    public function status() {
        $status = TabelStatus::paginate(4);
        return view('admin.status', compact('status'));
    }

    public function status_kemajuan() {
        $statusKemajuan = TabelStatusKemajuan::paginate(4);
        return view('admin.statusKemajuan', compact('statusKemajuan'));
    }

    public function tindak_lanjut() {
        $tindakLanjut = TabelTindakLanjut::paginate(4);
        return view('admin.tindakLanjut', compact('tindakLanjut'));
    }

    public function tujuan_pendanaan() {
        $tujuanPendanaan = TabelTujuanPendanaan::paginate(4);
        return view('admin.tujuanPendanaan', compact('tujuanPendanaan'));
    }

}
