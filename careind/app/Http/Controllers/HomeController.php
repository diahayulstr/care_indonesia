<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabelImpactGoals;

class HomeController extends Controller
{
    public function impact_goals() {
        $impactGoals = TabelImpactGoals::all();
        return view('admin.impactGoals', compact('impactGoals'));
    }

    public function jenis_intermediaries() {
        return view('admin.jenisIntermediary');
    }

    public function jenis_organisasi() {
        return view('admin.jenisOrganisasi');
    }

    public function jenis_penerimaan() {
        return view('admin.jenisPenerimaan');
    }

    public function jenjang_komunikasi() {
        return view('admin.jenjangKomunikasi');
    }

    public function klasifikasi_portfolio() {
        return view('admin.klasifikasiPortfolio');
    }

    public function komitmen_sdgs() {
        return view('admin.komitmenSdgs');
    }

    public function saluran() {
        return view('admin.saluran');
    }

    public function saluran_pendanaan() {
        return view('admin.saluranPendanaan');
    }

    public function status() {
        return view('admin.status');
    }

    public function status_kemajuan() {
        return view('admin.statusKemajuan');
    }

    public function tindak_lanjut() {
        return view('admin.tindakLanjut');
    }

    public function tujuan_pendanaan() {
        return view('admin.tujuanPendanaan');
    }

}
