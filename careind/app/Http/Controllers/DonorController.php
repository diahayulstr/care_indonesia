<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TabelJenisOrganisasi;
use App\Models\TabelKomitmenSdg;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\Donor;
use File;

class DonorController extends Controller
{
    public function cari_donor(Request $request) {
        $keyword = $request->cari;

        $donor = Donor::select('donors.*', 'provinces.name AS provinsi_name', 'regencies.name AS kabupaten_name',
                    'districts.name AS kecamatan_name', 'villages.name AS desa_name', 'tabel_jenis_organisasis.name AS organisasi_name',
                    'tabel_komitmen_sdgs.name AS komitmen_name')
                ->leftJoin('provinces', 'donors.provinsi_id', '=', 'provinces.id')
                ->leftJoin('regencies', 'donors.kabupaten_id', '=', 'regencies.id')
                ->leftJoin('districts', 'donors.kecamatan_id', '=', 'districts.id')
                ->leftJoin('villages', 'donors.desa_id', '=', 'villages.id')
                ->leftJoin('tabel_jenis_organisasis', 'donors.jenis_organisasi_id', '=', 'tabel_jenis_organisasis.id')
                ->leftJoin('tabel_komitmen_sdgs', 'donors.komitmen_sdgs', '=', 'tabel_komitmen_sdgs.id')
                ->where(function($query) use ($keyword) {
                    $query->where('donors.nama_organisasi', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('donors.alamat', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('donors.negara', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('donors.provinsi_id', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('donors.kabupaten_id', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('donors.kecamatan_id', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('donors.desa_id', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('donors.website', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('donors.informasi_singkat', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('donors.jenis_organisasi_id', 'LIKE', '%' . $keyword . '%')
                        ->orWhereJsonContains('donors.komitmen_sdgs', $keyword) // Mencari nilai dalam array JSON
                        ->orWhere('donors.date', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('donors.dokumen_donor', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhere(function($query) use ($keyword) {
                    $query->where('provinces.name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('regencies.name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('districts.name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('villages.name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('tabel_jenis_organisasis.name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('tabel_komitmen_sdgs.name', 'LIKE', '%' . $keyword . '%');
                })
                ->distinct()
                ->get();
        return view('pages.donor-cari', compact('donor'));
    }

    public function donor() {
        $donor = Donor::paginate(2);
        $donor->load('narahubungs', 'komunikasis', 'proposals');
        return view('pages.donor', compact('donor'));
    }

    // public function donor($id) {
    //     $donors = Donor::findOrFail($id);
    //     $narahubungs = $donors->narahubungs;
    //     $komunikasis = $donors->komunikasis;
    //     $proposals = $donors->proposals;
    //     $allDonors = Donor::paginate(2);

    //     return view('pages.donor', compact('donors', 'narahubungs', 'komunikasis', 'proposals', 'allDonors'));
    // }


    public function addDonor() {
        $provinces = Province::all();
        $jenisOrganisasis = TabelJenisOrganisasi::all();
        $komitmenSdgs = TabelKomitmenSdg::all();
        return view('donor.add', compact('jenisOrganisasis', 'komitmenSdgs', 'provinces'));
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

    public function store(Request $request) {
        $request->validate([
            'nama_organisasi'       => 'required',
            'alamat'                => 'required',
            'negara'                => 'required',
            'provinsi_id'           => 'required|exists:provinces,id',
            'kabupaten_id'          => 'required|exists:regencies,id',
            'kecamatan_id'          => 'required|exists:districts,id',
            'desa_id'               => 'required|exists:villages,id',
            'website'               => 'required',
            'informasi_singkat'     => 'required',
            'jenis_organisasi_id'   => 'required|exists:tabel_jenis_organisasis,id',
            'komitmen_sdgs'         => 'required|exists:tabel_komitmen_sdgs,id',
            'date'                  => 'required',
            'dokumen_donor'         => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,gif',
        ]);
        $donor = new Donor();
        $donor->nama_organisasi     = $request->nama_organisasi;
        $donor->alamat              = $request->alamat;
        $donor->negara              = $request->negara;
        $donor->provinsi_id         = $request->provinsi_id;
        $donor->kabupaten_id        = $request->kabupaten_id;
        $donor->kecamatan_id        = $request->kecamatan_id;
        $donor->desa_id             = $request->desa_id;
        $donor->website             = $request->website;
        $donor->informasi_singkat   = $request->informasi_singkat;
        $donor->jenis_organisasi_id = $request->jenis_organisasi_id;
        $donor->komitmen_sdgs       = json_encode($request->komitmen_sdgs);
        $donor->date                = $request->date;

        if ($request->hasFile('dokumen_donor')) {
            $idDonor = $donor->nama_organisasi;
            $tanggalUpdate = now()->format('d-m-Y');
            $extension = $request->dokumen_donor->getClientOriginalExtension();
            $namaFileBaru = $idDonor . '_' . $tanggalUpdate . '.' . $extension;
            $request->dokumen_donor->move('assets/donor/dokumen', $namaFileBaru);
            $donor->dokumen_donor = 'assets/donor/dokumen/' . $namaFileBaru;
        }
        $donor->save();
        return redirect()->route('pages.donor')->with('toast_success', 'Data donor berhasil ditambahkan');
    }

    public function show($id) {
        $donor = Donor::findOrFail($id);
        return view('donor.view', compact('donor'));
    }

    // public function edit($id) {
    //     $provinces = Province::all();
    //     $jenisOrganisasis = TabelJenisOrganisasi::all();
    //     $komitmenSdgs = TabelKomitmenSdg::all();
    //     $donor = Donor::findOrFail($id);
    //     return view('donor.edit', compact(
    //         'donor', 'provinces', 'jenisOrganisasis', 'komitmenSdgs'
    //     ));
    // }

    // public function update(Request $request, Donor $donor) {
    //     $request -> validate([
    //         'nama_organisasi'       => 'required',
    //         'alamat'                => 'required',
    //         'negara'                => 'required',
    //         'provinsi_id'           => 'required|exists:provinces,id',
    //         'kabupaten_id'          => 'required|exists:regencies,id',
    //         'kecamatan_id'          => 'required|exists:districts,id',
    //         'desa_id'               => 'required|exists:villages,id',
    //         'website'               => 'required',
    //         'informasi_singkat'     => 'required',
    //         'jenis_organisasi_id'   => 'required|exists:tabel_jenis_organisasis,id',
    //         'komitmen_sdgs'         => 'required|exists:tabel_komitmen_sdgs,id',
    //         'date'                  => 'required',
    //         'dokumen_donor'         => 'file',
    //     ]);

    //     $donor->update($request->only([
    //         'nama_organisasi',
    //         'alamat',
    //         'negara',
    //         'provinsi_id',
    //         'kabupaten_id',
    //         'kecamatan_id',
    //         'desa_id',
    //         'website',
    //         'informasi_singkat',
    //         'jenis_organisasi_id',
    //         'komitmen_sdgs',
    //         'date',
    //     ]));

    //     if ($request->hasFile('dokumen_donor')) {
    //         $namaFile = $request->dokumen_donor->getClientOriginalName();
    //         $path = 'assets/donor/dokumen/' . $namaFile;
    //         $counter = 1;
    //         while (file_exists($path)) {
    //             $namaFile = pathinfo($namaFile, PATHINFO_FILENAME) . " ($counter)." . pathinfo($namaFile, PATHINFO_EXTENSION);
    //             $path = 'assets/donor/dokumen/' . $namaFile;
    //             $counter++;
    //         }
    //         $request->dokumen_donor->move('assets/donor/dokumen', $namaFile);
	//         File::delete($donor->dokumen_donor);
    //         $donor->dokumen_donor = $path;
    //     }
    //     $donor->save();
    //     return redirect()->route('donor.master.view_master', ['donor' => $donor->id])
    //     ->with('toast_success', 'Data donor berhasil diupdate');
    // }

    public function destroy($id) {
        $donor = Donor::findOrFail($id);
        File::delete($donor->dokumen_donor);
        $donor->delete();
        // $title = 'Delete!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);
        // return redirect()->route('pages.donor');
        return redirect()->route('pages.donor')->with('success', 'Data donor berhasil dihapus');
    }




}
