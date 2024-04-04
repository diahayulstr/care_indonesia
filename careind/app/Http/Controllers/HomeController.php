<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Donor;
use App\Models\Proposal;
use App\Models\Komunikasi;
use App\Models\Narahubung;
use App\Models\TabelStatus;
use App\Models\TabelSaluran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\TabelImpactGoals;
use App\Models\TabelKomitmenSdg;
use App\Models\TabelTindakLanjut;
use App\Models\TabelStatusKemajuan;
use App\Models\TabelJenisOrganisasi;
use App\Models\TabelJenisPenerimaan;
use App\Models\TabelTujuanPendanaan;
use App\Models\TabelSaluranPendanaan;
use App\Models\TabelJenjangKomunikasi;
use App\Models\TabelJenisIntermediaries;
use App\Models\TabelKlasifikasiPortfolios;

class HomeController extends Controller
{
    public function home() {
        return view('home',[
            'donor' => Donor::count(),
            'narahubung' => Narahubung::count(),
            'komunikasi' => Komunikasi::count(),
            'proposal' => Proposal::count(),
            'update_proposal' => Proposal::latest('updated_at')->paginate(5),
            'approach' => Komunikasi::orderBy('tgl_selanjutnya', 'asc')
            ->where('tgl_selanjutnya', '>=', Carbon::today())
            ->get(),
            'past' => Komunikasi::orderBy('tgl_selanjutnya', 'asc')
            ->where('tgl_selanjutnya', '<', Carbon::today())
            ->get(),
        ]);
    }

    public function user() {
        $user = User::paginate(4);
        $roleID = Role::all();
        return view('admin.user', compact('user', 'roleID'));
    }

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
