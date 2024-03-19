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
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\TabelJenisOrganisasi;
use App\Models\TabelKomitmenSdg;
use File;


class MasterController extends Controller
{
    public function master_add() {
        $provinces = Province::all();
        $jenisOrganisasis = TabelJenisOrganisasi::all();
        $komitmenSdgs = TabelKomitmenSdg::all();
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
        return view('donor.master.add_master', compact('jenisOrganisasis', 'komitmenSdgs', 'provinces',
        'impactGoals', 'jenisIntermediaries', 'jenisPenerimaan', 'klasifikasiPortfolios', 'saluranPendanaan', 'statusKemajuan',
        'tujuanPendanaan', 'status', 'saluran', 'jenjangKomunikasi', 'tindakLanjut'
        ));
    }

    public function store_master_add (Request $request) {
        $validatedData = $request->validate([
            // Donor
            'nama_organisasi'           => 'required',
            'alamat'                    => 'required',
            'negara'                    => 'required',
            'provinsi_id'               => 'required|exists:provinces,id',
            'kabupaten_id'              => 'required|exists:regencies,id',
            'kecamatan_id'              => 'required|exists:districts,id',
            'desa_id'                   => 'required|exists:villages,id',
            'website'                   => 'required',
            'informasi_singkat'         => 'required',
            'jenis_organisasi_id'       => 'required|exists:tabel_jenis_organisasis,id',
            'komitmen_sdgs'             => 'required|exists:tabel_komitmen_sdgs,id',
            'date'                      => 'required',
            'dokumen_donor'             => 'required|file|mimes:pdf,jpg,jpeg,png,gif',

            // Narahubung
            // 'donor_id'                  => 'required|exists:donors,id',
            'nama_kontak'               => 'required',
            'jabatan'                   => 'required',
            'email'                     => 'required|max:15',
            'no_telp'                   => 'required',
            'status_id'                 => 'required|exists:tabel_statuses,id',

            // Komunikasi
            'tanggal'                   =>  'required',
            'saluran_id'                =>  'required|exists:tabel_salurans,id',
            'jenjang_komunikasi_id'     =>  'required|exists:tabel_jenjang_komunikasis,id',
            'tindak_lanjut_id'          =>  'required|exists:tabel_tindak_lanjuts,id',
            'catatan'                   =>  'required',
            'tgl_selanjutnya'           =>  'required',
            'dokumen_komunikasi'        => 'required|file|mimes:pdf,jpg,jpeg,png,gif',

            // Proposal
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
            'dokumen_proposal'          => 'required|file|mimes:pdf,jpg,jpeg,png,gif',
        ]);

        // Donor
        $donor = Donor::create([
            'nama_organisasi'   => $validatedData['nama_organisasi'],
            'alamat'            => $validatedData['alamat'],
            'negara'            => $validatedData['negara'],
            'provinsi_id'       => $validatedData['provinsi_id'],
            'kabupaten_id'      => $validatedData['kabupaten_id'],
            'kecamatan_id'      => $validatedData['kecamatan_id'],
            'desa_id'           => $validatedData['desa_id'],
            'website'           => $validatedData['website'],
            'informasi_singkat' => $validatedData['informasi_singkat'],
            'jenis_organisasi_id' => $validatedData['jenis_organisasi_id'],
            'komitmen_sdgs'     => json_encode($validatedData['komitmen_sdgs']),
            'date'              => $validatedData['date'],
        ]);
        if ($request->hasFile('dokumen_donor')) {
            $namaFile = $request->dokumen_donor->getClientOriginalName();
            $path = $request->dokumen_donor->move('assets/donor/dokumen', $namaFile);
            $donor->dokumen_donor = 'assets/donor/dokumen/' . $namaFile;
            $donor->save();
        }
        // $donor->save();

        // Narahubung
        $narahubung = Narahubung::create([
            'donor_id'       => $donor->id,
            'nama_kontak'    => $request->input('nama_kontak'),
            'jabatan'        => $request->input('jabatan'),
            'email'          => $request->input('email'),
            'no_telp'        => $request->input('no_telp'),
            'status_id'      => $request->input('status_id'),
        ]);
        // $narahubung->save();

        // Komunikasi
        $komunikasi = Komunikasi::create([
            'donor_id'               =>   $donor->id,
            'tanggal'                =>   $request->input('tanggal'),
            'saluran_id'             =>   $request->input('saluran_id'),
            'jenjang_komunikasi_id'  =>   $request->input('jenjang_komunikasi_id'),
            'tindak_lanjut_id'       =>   $request->input('tindak_lanjut_id'),
            'catatan'                =>   $request->input('catatan'),
            'tgl_selanjutnya'        =>   $request->input('tgl_selanjutnya'),

        ]);
        if ($request->hasFile('dokumen_komunikasi')) {
            $namaFile = $request->dokumen_komunikasi->getClientOriginalName();
            $path = $request->dokumen_komunikasi->move('assets/komunikasi/dokumen', $namaFile);
            $komunikasi->dokumen_komunikasi = 'assets/komunikasi/dokumen/' . $namaFile;
            $komunikasi->save();
        }
        // $komunikasi->save();

        // Proposal
        $proposal = Proposal::create([
            'donor_id'                   =>   $donor->id,
            'tujuan_pendanaan_id'        =>   $request->input('tujuan_pendanaan_id'),
            'jenis_penerimaan_id'        =>   $request->input('jenis_penerimaan_id'),
            'saluran_pendanaan_id'       =>   $request->input('saluran_pendanaan_id'),
            'jenis_intermediaries_id'    =>   $request->input('jenis_intermediaries_id'),
            'nama_proyek'                =>   $request->input('nama_proyek'),
            'klasifikasi_portfolio_id'   =>   $request->input('klasifikasi_portfolio_id'),
            'impact_goals_id'            =>   json_encode($request->input('impact_goals_id')),
            'estimasi_nilai_usd'         =>   $request->input('estimasi_nilai_usd'),
            'estimasi_nilai_idr'         =>   $request->input('estimasi_nilai_idr'),
            'usulan_durasi'              =>   $request->input('usulan_durasi'),
            'status_kemajuan_id'         =>   $request->input('status_kemajuan_id'),
        ]);
        if ($request->hasFile('dokumen_proposal')) {
            $namaFile = $request->dokumen_proposal->getClientOriginalName();
            $path = $request->dokumen_proposal->move('assets/proposal/dokumen', $namaFile);
            $proposal->dokumen_proposal = 'assets/proposal/dokumen/' . $namaFile;
            $proposal->save();
        }
        // $proposal->save();

        if ($donor && $narahubung && $komunikasi && $proposal) {
            return redirect()->route('donor.master.view_master', ['master' => $donor->id])->with('success', 'Data berhasil disimpan.');
        } else {
            return redirect()->route('donor.master.add_master')->with('error', 'Gagal menyimpan data.');
        }
    }


    public function getkabupaten (request $request) {
        $id_provinsi = $request->id_provinsi;
        $kabupatens = Regency::where('province_id', $id_provinsi)->get();
        $option = "<option>-- Pilih Kabupaten --</option>";
        foreach($kabupatens as $kabupaten) {
            $option.= "<option value= '$kabupaten->id'> $kabupaten->name</option>";
        }
        echo $option;
    }

    public function getkecamatan (request $request) {
        $id_kabupaten = $request->id_kabupaten;
        $kecamatans = District::where('regency_id', $id_kabupaten)->get();
        $option = "<option>-- Pilih Kecamatan --</option>";
        foreach($kecamatans as $kecamatan) {
            $option.= "<option value= '$kecamatan->id'> $kecamatan->name</option>";
        }
        echo $option;
    }

    public function getdesa (request $request) {
        $id_kecamatan = $request->id_kecamatan;
        $desas = Village::where('district_id', $id_kecamatan)->get();
        $option = "<option>-- Pilih Desa --</option>";
        foreach($desas as $desa) {
            $option.="<option value= '$desa->id'> $desa->name</option>";
        }
        echo $option;
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

    public function storeOrUpdate_narahubung(Request $request, $donor_id)
    {
        $request->validate([
            'nama_kontak'   => 'required',
            'jabatan'       => 'required',
            'email'         => 'required|email',
            'no_telp'       => 'required',
            'status_id'     => 'required|exists:tabel_statuses,id',
        ]);
        if ($request->filled('narahubung_id')) {
            $narahubung = Narahubung::findOrFail($request->narahubung_id);
        } else {
            $narahubung = new Narahubung;
        }
        $narahubung->donor_id    = $donor_id;
        $narahubung->nama_kontak = $request->nama_kontak;
        $narahubung->jabatan     = $request->jabatan;
        $narahubung->email       = $request->email;
        $narahubung->no_telp     = $request->no_telp;
        $narahubung->status_id   = $request->status_id;
        $narahubung->save();
        return redirect()->route('donor.master.view_master', $donor_id)
        ->with('success', 'Data narahubung berhasil disimpan atau diperbarui.');
    }

    public function destroy_narahubung($id) {
        $narahubung = Narahubung::findOrFail($id);
        $donorId = $narahubung->donor_id;
        $narahubung->delete();
        return redirect()->route('donor.master.view_master', ['master' => $donorId])
                         ->with('success', 'Data narahubung berhasil dihapus.');
    }

    public function storeOrUpdate_komunikasi(Request $request, $donor_id) {
        $request->validate([
            'tanggal'               => 'required',
            'saluran_id'            => 'required|exists:tabel_salurans,id',
            'jenjang_komunikasi_id' => 'required|exists:tabel_jenjang_komunikasis,id',
            'tindak_lanjut_id'      => 'required|exists:tabel_tindak_lanjuts,id',
            'catatan'               => 'required',
            'tgl_selanjutnya'       => 'required',
            'dokumen_komunikasi'    => 'file',
        ]);
        if ($request->filled('komunikasi_id')) {
            $komunikasi = Komunikasi::findOrFail($request->komunikasi_id);
        } else {
            $komunikasi = new Komunikasi;
        }
        $komunikasi->donor_id                = $donor_id;
        $komunikasi->tanggal                 = $request->tanggal;
        $komunikasi->saluran_id              = $request->saluran_id;
        $komunikasi->jenjang_komunikasi_id   = $request->jenjang_komunikasi_id;
        $komunikasi->tindak_lanjut_id        = $request->tindak_lanjut_id;
        $komunikasi->catatan                 = $request->catatan;
        $komunikasi->tgl_selanjutnya         = $request->tgl_selanjutnya;
        if ($request->hasFile('dokumen_komunikasi')) {
            $namaFile = $request->dokumen_komunikasi->getClientOriginalName();
            $path = $request->dokumen_komunikasi->move('assets/komunikasi/dokumen', $namaFile);
            File::delete($komunikasi->dokumen_komunikasi);
            $komunikasi->dokumen_komunikasi = 'assets/komunikasi/dokumen/' . $namaFile;
        }
        $komunikasi->save();
        return redirect()->route('donor.master.view_master', $donor_id)
            ->with('success', 'Data komunikasi berhasil disimpan atau diperbarui.');
    }

    public function destroy_komunikasi($id) {
        $komunikasi = Komunikasi::findOrFail($id);
        $donorId = $komunikasi->donor_id;
        $komunikasi->delete();
        return redirect()->route('donor.master.view_master', ['master' => $donorId])
                         ->with('success', 'Data komunikasi berhasil dihapus.');
    }

    public function storeOrUpdate_proposal(Request $request, $donor_id) {
        $request->validate([
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
            'dokumen_proposal'          =>  'file',
        ]);
        if ($request->filled('proposal_id')) {
            $proposal = Proposal::findOrFail($request->proposal_id);
        } else {
            $proposal = new Proposal;
        }
        $proposal->donor_id                 = $donor_id;
        $proposal->tujuan_pendanaan_id      = $request->tujuan_pendanaan_id;
        $proposal->jenis_penerimaan_id      = $request->jenis_penerimaan_id;
        $proposal->saluran_pendanaan_id     = $request->saluran_pendanaan_id;
        $proposal->jenis_intermediaries_id  = $request->jenis_intermediaries_id;
        $proposal->nama_proyek              = $request->nama_proyek;
        $proposal->klasifikasi_portfolio_id = $request->klasifikasi_portfolio_id;
        $proposal->impact_goals_id          = json_encode($request->impact_goals_id);
        $proposal->estimasi_nilai_usd       = $request->estimasi_nilai_usd;
        $proposal->estimasi_nilai_idr       = $request->estimasi_nilai_idr;
        $proposal->usulan_durasi            = $request->usulan_durasi;
        $proposal->status_kemajuan_id       = $request->status_kemajuan_id;

        if ($request->hasFile('dokumen_proposal')) {
            $namaFile = $request->dokumen_proposal->getClientOriginalName();
            $path = $request->dokumen_proposal->move('assets/proposal/dokumen', $namaFile);
            File::delete($proposal->dokumen_proposal);
            $proposal->dokumen_proposal = 'assets/proposal/dokumen/' . $namaFile;
        }
        $proposal->save();
        return redirect()->route('donor.master.view_master', $donor_id)
            ->with('success', 'Data proposal berhasil disimpan atau diperbarui.');
    }

    public function destroy_proposal($id) {
        $proposal = Proposal::findOrFail($id);
        $donorId = $proposal->donor_id;
        $proposal->delete();
        return redirect()->route('donor.master.view_master', ['master' => $donorId])
                         ->with('success', 'Data proposal berhasil dihapus.');
    }

}

