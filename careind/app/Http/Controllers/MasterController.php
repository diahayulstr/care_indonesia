<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'inputs_narahubung.*.nama_kontak'   => 'required',
            'inputs_narahubung.*.jabatan'       => 'required',
            'inputs_narahubung.*.email'         => 'required|email',
            'inputs_narahubung.*.status_id'     => 'required|exists:tabel_statuses,id',

            // Komunikasi
            'inputs_komunikasi.*.tanggal'               =>  'required',
            'inputs_komunikasi.*.saluran_id'            =>  'required|exists:tabel_salurans,id',
            'inputs_komunikasi.*.jenjang_komunikasi_id' =>  'required|exists:tabel_jenjang_komunikasis,id',
            'inputs_komunikasi.*.tindak_lanjut_id'      =>  'required|exists:tabel_tindak_lanjuts,id',
            'inputs_komunikasi.*.catatan'               =>  'required',
            'inputs_komunikasi.*.tgl_selanjutnya'       =>  'required',
            'inputs_komunikasi.*.dokumen_komunikasi'    =>  'required|file|mimes:pdf,jpg,jpeg,png,gif',

            // Proposal
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
            'inputs_proposal.*.dokumen_proposal'          =>  'required|file|mimes:pdf,jpg,jpeg,png,gif',
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
            $path = 'assets/donor/dokumen/' . $namaFile;
            $counter = 1;
            while (file_exists($path)) {
                $namaFile = pathinfo($namaFile, PATHINFO_FILENAME) . " ($counter)." . pathinfo($namaFile, PATHINFO_EXTENSION);
                $path = 'assets/donor/dokumen/' . $namaFile;
                $counter++;
            }
            $request->dokumen_donor->move('assets/donor/dokumen', $namaFile);
            $donor->dokumen_donor = $path;
        }
        $donor->save();

        // Narahubung
        foreach ($request->input('inputs_narahubung') as $key => $item) {
            $narahubung = Narahubung::create([
                'donor_id'       => $donor->id,
                'nama_kontak'    => $item['nama_kontak'],
                'jabatan'        => $item['jabatan'],
                'email'          => $item['email'],
                'no_telp'        => $item['no_telp'],
                'status_id'      => $item['status_id'],
            ]);
            $narahubung->save();
        }

        // Komunikasi
        foreach ($request->input('inputs_komunikasi') as $key => $item) {
            $komunikasi = Komunikasi::create([
                'donor_id'               =>   $donor->id,
                'tanggal'                =>   $item['tanggal'],
                'saluran_id'             =>   $item['saluran_id'],
                'jenjang_komunikasi_id'  =>   $item['jenjang_komunikasi_id'],
                'tindak_lanjut_id'       =>   $item['tindak_lanjut_id'],
                'catatan'                =>   $item['catatan'],
                'tgl_selanjutnya'        =>   $item['tgl_selanjutnya'],
            ]);
            if ($request->file('inputs_komunikasi.'.$key.'.dokumen_komunikasi')) {
                $file = $request->file('inputs_komunikasi.'.$key.'.dokumen_komunikasi');
                $namaFile = $file->getClientOriginalName();
                $path = 'assets/komunikasi/dokumen/' . $namaFile;
                $counter = 1;
                while (file_exists($path)) {
                    $namaFile = pathinfo($namaFile, PATHINFO_FILENAME) . " ($counter)." . pathinfo($namaFile, PATHINFO_EXTENSION);
                    $path = 'assets/komunikasi/dokumen/' . $namaFile;
                    $counter++;
                }
                $file->move('assets/komunikasi/dokumen', $namaFile);
                $komunikasi->dokumen_komunikasi = $path;
            }
            $komunikasi->save();
        }

        // Proposal
        foreach ($request->input('inputs_proposal') as $key => $item) {
            $proposal = Proposal::create([
                'donor_id'                   =>   $donor->id,
                'tujuan_pendanaan_id'        =>   $item['tujuan_pendanaan_id'],
                'jenis_penerimaan_id'        =>   $item['jenis_penerimaan_id'],
                'saluran_pendanaan_id'       =>   $item['saluran_pendanaan_id'],
                'jenis_intermediaries_id'    =>   $item['jenis_intermediaries_id'],
                'nama_proyek'                =>   $item['nama_proyek'],
                'klasifikasi_portfolio_id'   =>   $item['klasifikasi_portfolio_id'],
                'impact_goals_id'            => json_encode($item['impact_goals_id']),
                'estimasi_nilai_usd'         =>   $item['estimasi_nilai_usd'],
                'estimasi_nilai_idr'         =>   $item['estimasi_nilai_idr'],
                'usulan_durasi'              =>   $item['usulan_durasi'],
                'status_kemajuan_id'         =>   $item['status_kemajuan_id'],
            ]);
            if ($request->file('inputs_proposal.'.$key.'.dokumen_proposal')) {
                $file = $request->file('inputs_proposal.'.$key.'.dokumen_proposal');
                $namaFile = $file->getClientOriginalName();
                $path = 'assets/proposal/dokumen/' . $namaFile;
                $counter = 1;
                while (file_exists($path)) {
                    $namaFile = pathinfo($namaFile, PATHINFO_FILENAME) . " ($counter)." . pathinfo($namaFile, PATHINFO_EXTENSION);
                    $path = 'assets/proposal/dokumen/' . $namaFile;
                    $counter++;
                }
                $file->move('assets/proposal/dokumen', $namaFile);
                $proposal->dokumen_proposal = $path;
            }
            $proposal->save();
        }

        if ($donor && $narahubung && $komunikasi && $proposal) {
            return redirect()->route('donor.master.view_master', ['master' => $donor->id])->with('toast_success', 'Data berhasil disimpan.');
        } else {
            return redirect()->route('donor.master.add_master')->with('error', 'Gagal menyimpan data.');
        }
    }

    public function update_master_add (Request $request, $id) {
        $request   ->  validate([
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
            'dokumen_donor'             => 'file',

            // Narahubung
            // 'donor_id'                  => 'required|exists:donors,id',
            'items.*.nama_kontak'       => 'required',
            'items.*.jabatan'           => 'required',
            'items.*.email'             => 'required|max:15',
            'items.*.no_telp'           => 'required',
            'items.*.status_id'         => 'required|exists:tabel_statuses,id',

            // Komunikasi
            'items.*.tanggal'               => 'required',
            'items.*.saluran_id'            => 'required|exists:tabel_salurans,id',
            'items.*.jenjang_komunikasi_id' => 'required|exists:tabel_jenjang_komunikasis,id',
            'items.*.tindak_lanjut_id'      => 'required|exists:tabel_tindak_lanjuts,id',
            'items.*.catatan'               => 'required',
            'items.*.tgl_selanjutnya'       => 'required',
            'items.*.dokumen_komunikasi'    => 'file',

            // Proposal
            'items.*.tujuan_pendanaan_id'       => 'required|exists:tabel_tujuan_pendanaans,id',
            'items.*.jenis_penerimaan_id'       => 'required|exists:tabel_jenis_penerimaans,id',
            'items.*.saluran_pendanaan_id'      => 'required|exists:tabel_saluran_pendanaans,id',
            'items.*.jenis_intermediaries_id'   => 'required|exists:tabel_jenis_intermediaries,id',
            'items.*.nama_proyek'               => 'required',
            'items.*.klasifikasi_portfolio_id'  => 'required|exists:tabel_klasifikasi_portfolios,id',
            'items.*.impact_goals_id'           => 'required|exists:tabel_impact_goals,id',
            'items.*.estimasi_nilai_usd'        => 'required',
            'items.*.estimasi_nilai_idr'        => 'required',
            'items.*.usulan_durasi'             => 'required',
            'items.*.status_kemajuan_id'        => 'required|exists:tabel_status_kemajuans,id',
            'items.*.dokumen_proposal'          => 'file',
        ]);

        // Donor
        $donorData = $request->only([
            'nama_organisasi',
            'alamat',
            'negara',
            'provinsi_id',
            'kabupaten_id',
            'kecamatan_id',
            'desa_id',
            'website',
            'informasi_singkat',
            'jenis_organisasi_id',
            'komitmen_sdgs',
            'date',
        ]);
        $donor = Donor::findOrFail($id);
        $donor->update($donorData);
        if ($request->hasFile('dokumen_donor')) {
            $namaFile = $request->dokumen_donor->getClientOriginalName();
            $path = 'assets/donor/dokumen/' . $namaFile;
            $counter = 1;
            while (file_exists($path)) {
                $namaFile = pathinfo($namaFile, PATHINFO_FILENAME) . " ($counter)." . pathinfo($namaFile, PATHINFO_EXTENSION);
                $path = 'assets/donor/dokumen/' . $namaFile;
                $counter++;
            }
            $request->dokumen_donor->move('assets/donor/dokumen', $namaFile);
	        File::delete($donor->dokumen_donor);
            $donor->dokumen_donor = $path;
        }
        $donor->save();

        foreach ($request->input('items_narahubung') as $key => $item) {
            // Narahubung
            $narahubung = Narahubung::findOrFail($item['id']);
            $narahubung->update([
                'nama_kontak'   => $item['nama_kontak'],
                'jabatan'       => $item['jabatan'],
                'email'         => $item['email'],
                'no_telp'       => $item['no_telp'],
                'status_id'     => $item['status_id'],
            ]);
        }


        foreach ($request->input('items_komunikasi') as $key => $item) {
            // Komunikasi
            $komunikasi = Komunikasi::findOrFail($item['id']);
            $komunikasi->update([
                'tanggal'               => $item['tanggal'],
                'saluran_id'            => $item['saluran_id'],
                'jenjang_komunikasi_id' => $item['jenjang_komunikasi_id'],
                'tindak_lanjut_id'      => $item['tindak_lanjut_id'],
                'catatan'               => $item['catatan'],
                'tgl_selanjutnya'       => $item['tgl_selanjutnya'],
            ]);
            if ($request->file('items_komunikasi.'.$key.'.dokumen_komunikasi')) {
                $file = $request->file('items_komunikasi.'.$key.'.dokumen_komunikasi');
                $namaFile = $file->getClientOriginalName();
                $path = 'assets/komunikasi/dokumen/' . $namaFile;
                $counter = 1;
                while (file_exists($path)) {
                    $namaFile = pathinfo($namaFile, PATHINFO_FILENAME) . " ($counter)." . pathinfo($namaFile, PATHINFO_EXTENSION);
                    $path = 'assets/komunikasi/dokumen/' . $namaFile;
                    $counter++;
                }
                $file->move('assets/komunikasi/dokumen', $namaFile);
                File::delete($komunikasi->dokumen_komunikasi);
                $komunikasi->dokumen_komunikasi = $path;
            }
            $komunikasi->save();
        }

        foreach ($request->input('items_proposal') as $key => $item) {
            // Proposal
            $proposal = Proposal::findOrFail($item['id']);
            $proposal->update([
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
            if ($request->file('items_proposal.'.$key.'.dokumen_proposal')) {
                $file = $request->file('items_proposal.'.$key.'.dokumen_proposal');
                $namaFile = $file->getClientOriginalName();
                $path = 'assets/proposal/dokumen/' . $namaFile;
                $counter = 1;
                while (file_exists($path)) {
                    $namaFile = pathinfo($namaFile, PATHINFO_FILENAME) . " ($counter)." . pathinfo($namaFile, PATHINFO_EXTENSION);
                    $path = 'assets/proposal/dokumen/' . $namaFile;
                    $counter++;
                }
                $file->move('assets/proposal/dokumen', $namaFile);
                File::delete($proposal->dokumen_proposal);
                $proposal->dokumen_proposal = $path;
            }
            $proposal->save();
        }

        if ($donor && $narahubung && $komunikasi && $proposal) {
            return redirect()->route('donor.master.view_master', ['master' => $donor->id])->with('toast_success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('donor.master.add_master')->with('error', 'Gagal menyimpan data.');
        }
    }

    public function destroy_master_narahubung($id) {
        $narahubung = Narahubung::findOrFail($id);
        $donorId = $narahubung->donor_id;
        $narahubung->delete();

        return redirect()->route('donor.master.edit_master', ['master' => $donorId])
                         ->with('success', 'Data narahubung berhasil dihapus.');
    }

    public function destroy_master_komunikasi($id) {
        $komunikasi = Komunikasi::findOrFail($id);
        $donorId = $komunikasi->donor_id;
        File::delete($komunikasi->dokumen_komunikasi);
        $komunikasi->delete();

        return redirect()->route('donor.master.edit_master', ['master' => $donorId])
                         ->with('success', 'Data komunikasi berhasil dihapus.');
    }

    public function destroy_master_proposal($id) {
        $proposal = Proposal::findOrFail($id);
        $donorId = $proposal->donor_id;
        File::delete($proposal->dokumen_proposal);
        $proposal->delete();

        return redirect()->route('donor.master.edit_master', ['master' => $donorId])
                         ->with('success', 'Data proposal berhasil dihapus.');
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

    public function storeOrUpdate_narahubung(Request $request, $donor_id) {
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
        ->with('toast_success', 'Data narahubung berhasil disimpan atau diperbarui.');
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
            $path = 'assets/komunikasi/dokumen/' . $namaFile;
            $counter = 1;
            while (file_exists($path)) {
                $namaFile = pathinfo($namaFile, PATHINFO_FILENAME) . " ($counter)." . pathinfo($namaFile, PATHINFO_EXTENSION);
                $path = 'assets/komunikasi/dokumen/' . $namaFile;
                $counter++;
            }
            $request->dokumen_komunikasi->move('assets/komunikasi/dokumen', $namaFile);
	        File::delete($komunikasi->dokumen_komunikasi);
            $komunikasi->dokumen_komunikasi = $path;
        }
        $komunikasi->save();
        return redirect()->route('donor.master.view_master', $donor_id)
            ->with('toast_success', 'Data komunikasi berhasil disimpan atau diperbarui.');
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
            $path = 'assets/proposal/dokumen/' . $namaFile;
            $counter = 1;
            while (file_exists($path)) {
                $namaFile = pathinfo($namaFile, PATHINFO_FILENAME) . " ($counter)." . pathinfo($namaFile, PATHINFO_EXTENSION);
                $path = 'assets/proposal/dokumen/' . $namaFile;
                $counter++;
            }
            $request->dokumen_proposal->move('assets/proposal/dokumen', $namaFile);
	        File::delete($proposal->dokumen_proposal);
            $proposal->dokumen_proposal = $path;
        }
        $proposal->save();
        return redirect()->route('donor.master.view_master', $donor_id)
            ->with('toast_success', 'Data proposal berhasil disimpan atau diperbarui.');
    }

    public function destroy_proposal($id) {
        $proposal = Proposal::findOrFail($id);
        $donorId = $proposal->donor_id;
        $proposal->delete();
        return redirect()->route('donor.master.view_master', ['master' => $donorId])
                         ->with('success', 'Data proposal berhasil dihapus.');
    }

}

