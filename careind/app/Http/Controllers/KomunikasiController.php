<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komunikasi;
use App\Models\Donor;
use App\Models\TabelSaluran;
use App\Models\TabelJenjangKomunikasi;
use App\Models\TabelTindakLanjut;
use File;

class KomunikasiController extends Controller
{
    public function komunikasi() {
        $komunikasi = Komunikasi::paginate(2);
        return view('pages.komunikasi', compact('komunikasi'));
    }

    public function addKomunikasi() {
        $donorID = Donor::all();
        $saluran = TabelSaluran::all();
        $jenjangKomunikasi = TabelJenjangKomunikasi::all();
        $tindakLanjut = TabelTindakLanjut::all();
        return view('komunikasi.add', compact('donorID', 'saluran', 'jenjangKomunikasi', 'tindakLanjut'));
    }

    public function store(Request $request) {
        $request -> validate ([
            'donor_id'              =>  'required|exists:donors,id',
            'tanggal'               =>  'required',
            'saluran_id'            =>  'required|exists:tabel_salurans,id',
            'jenjang_komunikasi_id' =>  'required|exists:tabel_jenjang_komunikasis,id',
            'tindak_lanjut_id'      =>  'required|exists:tabel_tindak_lanjuts,id',
            'catatan'               =>  'required',
            'tgl_selanjutnya'       =>  'required',
            'dokumen_komunikasi'    =>  'required|file|mimes:pdf,jpg,jpeg,png,gif',
        ]);
        $komunikasi = new Komunikasi();
        $komunikasi->donor_id               =   $request->donor_id;
        $komunikasi->tanggal                =   $request->tanggal;
        $komunikasi->saluran_id             =   $request->saluran_id;
        $komunikasi->jenjang_komunikasi_id  =   $request->jenjang_komunikasi_id;
        $komunikasi->tindak_lanjut_id       =   $request->tindak_lanjut_id;
        $komunikasi->catatan                =   $request->catatan;
        $komunikasi->tgl_selanjutnya        =   $request->tgl_selanjutnya;

        if ($request->hasFile('dokumen_komunikasi')) {
            $namaFile = $request->dokumen_komunikasi->getClientOriginalName();
            $path = $request->dokumen_komunikasi->move('assets/komunikasi/dokumen', $namaFile);
            $komunikasi->dokumen_komunikasi = 'assets/komunikasi/dokumen/' . $namaFile;
        }
        $komunikasi->save();
        return redirect()->route('pages.komunikasi')->with('toast_success', 'Data komunikasi berhasil ditambahkan');
    }

    public function show($id) {
        $komunikasi = Komunikasi::findOrFail($id);
        return view('komunikasi.view', compact('komunikasi'));
    }

    public function edit($id) {
        $donorID = Donor::all();
        $saluran = TabelSaluran::all();
        $jenjangKomunikasi = TabelJenjangKomunikasi::all();
        $tindakLanjut = TabelTindakLanjut::all();
        $komunikasi = Komunikasi::findOrFail($id);
        return view('komunikasi.edit', compact('donorID', 'saluran', 'jenjangKomunikasi', 'tindakLanjut', 'komunikasi'));
    }

    public function update(Request $request, Komunikasi $komunikasi) {
        $request -> validate ([
            'donor_id'              =>  'required|exists:donors,id',
            'tanggal'               =>  'required',
            'saluran_id'            =>  'required|exists:tabel_salurans,id',
            'jenjang_komunikasi_id' =>  'required|exists:tabel_jenjang_komunikasis,id',
            'tindak_lanjut_id'      =>  'required|exists:tabel_tindak_lanjuts,id',
            'catatan'               =>  'required',
            'tgl_selanjutnya'       =>  'required',
            'dokumen_komunikasi'    =>  'file',
        ]);

        $komunikasi -> update($request->only([
            'donor_id',
            'tanggal',
            'saluran_id',
            'jenjang_komunikasi_id',
            'tindak_lanjut_id',
            'catatan',
            'tgl_selanjutnya',
        ]));

        if ($request->hasFile('dokumen_komunikasi')) {
            $namaFile = $request->dokumen_komunikasi->getClientOriginalName();
            $path = $request->dokumen_komunikasi->move('assets/komunikasi/dokumen', $namaFile);
            File::delete($komunikasi->dokumen_komunikasi);
            $komunikasi->dokumen_komunikasi = 'assets/komunikasi/dokumen/' . $namaFile;
        }
        $komunikasi->save();
        return redirect()->route('pages.komunikasi', ['komunikasi' => $komunikasi->id])
        ->with('toast_success', 'Data komunikasi berhasil diupdate');
    }

    public function destroy($id) {
        $komunikasi = Komunikasi::findOrFail($id);
        File::delete($komunikasi->dokumen_komunikasi);
        $komunikasi->delete();
        return redirect()->route('pages.komunikasi')->with('success', 'Data komunikasi berhasil dihapus');
    }
}
