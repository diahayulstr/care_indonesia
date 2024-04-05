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
        $today = Carbon::today();
        $allKomunikasi = Komunikasi::orderBy('tgl_selanjutnya', 'asc')->get();
        $approach = [];
        $past = [];

        foreach ($allKomunikasi as $komunikasi) {
            $tglSelanjutnya = Carbon::parse($komunikasi->tgl_selanjutnya);

            if ($tglSelanjutnya >= $today) {
                $approach[] = $komunikasi;
            } else {
                if ($tglSelanjutnya->isSameDay($today)) {
                    $approach[] = $komunikasi;
                } else {
                    $past[] = $komunikasi;
                }
            }
        }
        return view('home',[
            'donor' => Donor::count(),
            'narahubung' => Narahubung::count(),
            'komunikasi' => Komunikasi::count(),
            'proposal' => Proposal::count(),
            'update_proposal' => Proposal::latest('updated_at')->paginate(5),
            'approach' => $approach,
            'past' => $past,
        ]);
    }

    // USER
    public function user() {
        $user = User::paginate(4);
        $roleID = Role::all();
        return view('admin.user', compact('user', 'roleID'));
    }

    public function cari_user(Request $request) {
        $roleID = Role::all();
        $keyword = $request->cari;
        $user = User::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.user-cari', compact('user', 'roleID'));
    }

    // IMPACT GOALS
    public function impact_goals() {
        $impactGoals = TabelImpactGoals::paginate(4);
        return view('admin.impactGoals', compact('impactGoals'));
    }

    public function cari_impact_goals(Request $request) {
        $keyword = $request->cari;
        $impactGoals = TabelImpactGoals::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.impactGoals-cari', compact('impactGoals'));
    }

    //  JENIS INTERMEDIARY
    public function jenis_intermediaries() {
        $jenisIntermediary = TabelJenisIntermediaries::paginate(4);
        return view('admin.jenisIntermediary', compact('jenisIntermediary'));
    }

    public function cari_jenis_intermediaries(Request $request) {
        $keyword = $request->cari;
        $jenisIntermediary = TabelJenisIntermediaries::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.jenisIntermediary-cari', compact('jenisIntermediary'));
    }

    // JENIS ORGANISASI
    public function jenis_organisasi() {
        $jenisOrganisasi = TabelJenisOrganisasi::paginate(4);
        return view('admin.jenisOrganisasi', compact('jenisOrganisasi'));
    }

    public function cari_jenis_organisasi(Request $request) {
        $keyword = $request->cari;
        $jenisOrganisasi = TabelJenisOrganisasi::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.jenisOrganisasi-cari', compact('jenisOrganisasi'));
    }

    // JENIS PENERIMAAN
    public function jenis_penerimaan() {
        $jenisPenerimaan = TabelJenisPenerimaan::paginate(4);
        return view('admin.jenisPenerimaan', compact('jenisPenerimaan'));
    }

    public function cari_jenis_penerimaan(Request $request) {
        $keyword = $request->cari;
        $jenisPenerimaan = TabelJenisPenerimaan::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.jenisPenerimaan-cari', compact('jenisPenerimaan'));
    }

    // JEJANG KOMUNIKASI
    public function jenjang_komunikasi() {
        $jenjangKomunikasi = TabelJenjangKomunikasi::paginate(4);
        return view('admin.jenjangKomunikasi', compact('jenjangKomunikasi'));
    }

    public function cari_jenjang_komunikasi(Request $request) {
        $keyword = $request->cari;
        $jenjangKomunikasi = TabelJenjangKomunikasi::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.jenjangKomunikasi-cari', compact('jenjangKomunikasi'));
    }

    // KLASIFIKASI PORTFOLIO
    public function klasifikasi_portfolio() {
        $klasifikasiPortfolio = TabelKlasifikasiPortfolios::paginate(4);
        return view('admin.klasifikasiPortfolio', compact('klasifikasiPortfolio'));
    }

    public function cari_klasifikasi_portfolio(Request $request) {
        $keyword = $request->cari;
        $klasifikasiPortfolio = TabelKlasifikasiPortfolios::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.klasifikasiPortfolio-cari', compact('klasifikasiPortfolio'));
    }

    // KOMITMEN SDGS
    public function komitmen_sdgs() {
        $komitmenSdgs = TabelKomitmenSdg::paginate(4);
        return view('admin.komitmenSdgs', compact('komitmenSdgs'));
    }

    public function cari_komitmen_sdgs(Request $request) {
        $keyword = $request->cari;
        $komitmenSdgs = TabelKomitmenSdg::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.komitmenSdgs-cari', compact('komitmenSdgs'));
    }

    // SALURAN
    public function saluran() {
        $saluran = TabelSaluran::paginate(4);
        return view('admin.saluran', compact('saluran'));
    }

    public function cari_saluran(Request $request) {
        $keyword = $request->cari;
        $saluran = TabelSaluran::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.saluran-cari', compact('saluran'));
    }

    // SALURAN PENDANAAN
    public function saluran_pendanaan() {
        $saluranPendanaan = TabelSaluranPendanaan::paginate(4);
        return view('admin.saluranPendanaan', compact('saluranPendanaan'));
    }

    public function cari_saluran_pendanaan(Request $request) {
        $keyword = $request->cari;
        $saluranPendanaan = TabelSaluranPendanaan::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.saluranPendanaan-cari', compact('saluranPendanaan'));
    }

    // STATUS
    public function status() {
        $status = TabelStatus::paginate(4);
        return view('admin.status', compact('status'));
    }

    public function cari_status(Request $request) {
        $keyword = $request->cari;
        $status = TabelStatus::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.status-cari', compact('status'));
    }

    // STATUS KEMAJUAN
    public function status_kemajuan() {
        $statusKemajuan = TabelStatusKemajuan::paginate(4);
        return view('admin.statusKemajuan', compact('statusKemajuan'));
    }

    public function cari_status_kemajuan(Request $request) {
        $keyword = $request->cari;
        $statusKemajuan = TabelStatusKemajuan::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.statusKemajuan-cari', compact('statusKemajuan'));
    }

    // TINDAK LANJUT
    public function tindak_lanjut() {
        $tindakLanjut = TabelTindakLanjut::paginate(4);
        return view('admin.tindakLanjut', compact('tindakLanjut'));
    }

    public function cari_tindak_lanjut(Request $request) {
        $keyword = $request->cari;
        $tindakLanjut = TabelTindakLanjut::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.tindakLanjut-cari', compact('tindakLanjut'));
    }

    // TUJUAN PENDANAAN
    public function tujuan_pendanaan() {
        $tujuanPendanaan = TabelTujuanPendanaan::paginate(4);
        return view('admin.tujuanPendanaan', compact('tujuanPendanaan'));
    }

    public function cari_tujuan_pendanaan(Request $request) {
        $keyword = $request->cari;
        $tujuanPendanaan = TabelTujuanPendanaan::where('name', 'LIKE', '%' . $keyword . '%')
                        -> orWhere('id', 'LIKE', '%' . $keyword . '%')
                        -> get();
        return view('admin.tujuanPendanaan-cari', compact('tujuanPendanaan'));
    }

}
