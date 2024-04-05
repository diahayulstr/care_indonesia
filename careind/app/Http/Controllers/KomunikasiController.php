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

    public function cari_komunikasi(Request $request) {
        $keyword = $request->cari; 
        $komunikasi = Komunikasi::select('komunikasis.*', 'donors.nama_organisasi AS nama_organisasi',
                        'tabel_salurans.name AS saluran_name', 'tabel_jenjang_komunikasis.name AS jenjang_name',
                        'tabel_tindak_lanjuts.name AS tindak_lanjut_name')
                ->leftJoin('donors', 'komunikasis.donor_id', '=', 'donors.id')
                ->leftJoin('tabel_salurans', 'komunikasis.saluran_id', '=', 'tabel_salurans.id')
                ->leftJoin('tabel_jenjang_komunikasis', 'komunikasis.jenjang_komunikasi_id', '=', 'tabel_jenjang_komunikasis.id')
                ->leftJoin('tabel_tindak_lanjuts', 'komunikasis.tindak_lanjut_id', '=', 'tabel_tindak_lanjuts.id')
                ->where(function($query) use ($keyword) {
                    $query->where('donors.nama_organisasi', 'LIKE', '%' . $keyword . '%')
                          ->orWhere('komunikasis.donor_id', 'LIKE', '%' . $keyword . '%')
                          ->orWhere('komunikasis.tanggal', 'LIKE', '%' . $keyword . '%')
                          ->orWhere('komunikasis.saluran_id', 'LIKE', '%' . $keyword . '%')
                          ->orWhere('komunikasis.jenjang_komunikasi_id', 'LIKE', '%' . $keyword . '%')
                          ->orWhere('komunikasis.tindak_lanjut_id', 'LIKE', '%' . $keyword . '%')
                          ->orWhere('komunikasis.catatan', 'LIKE', '%' . $keyword . '%')
                          ->orWhere('komunikasis.tgl_selanjutnya', 'LIKE', '%' . $keyword . '%')
                          ->orWhere('komunikasis.dokumen_komunikasi', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhere('tabel_salurans.name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tabel_jenjang_komunikasis.name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tabel_tindak_lanjuts.name', 'LIKE', '%' . $keyword . '%')
                ->get();

        return view('pages.komunikasi-cari', compact('komunikasi'));
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
            $path = 'assets/komunikasi/dokumen/' . $namaFile;
            $counter = 1;
            while (file_exists($path)) {
                $namaFile = pathinfo($namaFile, PATHINFO_FILENAME) . " ($counter)." . pathinfo($namaFile, PATHINFO_EXTENSION);
                $path = 'assets/komunikasi/dokumen/' . $namaFile;
                $counter++;
            }
            $request->dokumen_komunikasi->move('assets/komunikasi/dokumen', $namaFile);
            $komunikasi->dokumen_komunikasi = $path;
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
        return redirect()->route('pages.komunikasi', ['komunikasi' => $komunikasi->id])
        ->with('toast_success', 'Data komunikasi berhasil diupdate');
    }

    public function destroy($id) {
        $komunikasi = Komunikasi::findOrFail($id);
        File::delete($komunikasi->dokumen_komunikasi);
        $komunikasi->delete();
        return redirect()->route('pages.komunikasi')->with('success', 'Data komunikasi berhasil dihapus');
    }

    public function grid_add_komunikasi() {
        $donorID = Donor::all();
        $saluran = TabelSaluran::all();
        $jenjangKomunikasi = TabelJenjangKomunikasi::all();
        $tindakLanjut = TabelTindakLanjut::all();
        return view('komunikasi.gridAdd', compact('donorID', 'saluran', 'jenjangKomunikasi', 'tindakLanjut'));
    }

    public function store_grid_add_komunikasi(Request $request) {
        $request->validate([
            'inputs_komunikasi.*.donor_id'              =>  'required|exists:donors,id',
            'inputs_komunikasi.*.tanggal'               =>  'required',
            'inputs_komunikasi.*.saluran_id'            =>  'required|exists:tabel_salurans,id',
            'inputs_komunikasi.*.jenjang_komunikasi_id' =>  'required|exists:tabel_jenjang_komunikasis,id',
            'inputs_komunikasi.*.tindak_lanjut_id'      =>  'required|exists:tabel_tindak_lanjuts,id',
            'inputs_komunikasi.*.catatan'               =>  'required',
            'inputs_komunikasi.*.tgl_selanjutnya'       =>  'required',
            'inputs_komunikasi.*.dokumen_komunikasi'    =>  'required|file|mimes:pdf,jpg,jpeg,png,gif',
        ]);

        foreach($request->inputs_komunikasi as $key => $value) {
            $komunikasi = Komunikasi::create($value);
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

        return redirect()->route('pages.komunikasi')
            ->with('toast_success', 'Data komunikasi berhasil ditambahkan.');
    }

    public function edit_grid_komunikasi() {
        $donorID = Donor::all();
        $saluran = TabelSaluran::all();
        $jenjangKomunikasi = TabelJenjangKomunikasi::all();
        $tindakLanjut = TabelTindakLanjut::all();
        $komunikasi = Komunikasi::all();
        return view('komunikasi.gridEdit', compact('donorID', 'saluran', 'jenjangKomunikasi', 'tindakLanjut', 'komunikasi'));
    }

    public function update_grid_komunikasi(Request $request) {
        $request -> validate ([
            'inputs_komunikasi.*.donor_id'              =>  'required|exists:donors,id',
            'inputs_komunikasi.*.tanggal'               =>  'required',
            'inputs_komunikasi.*.saluran_id'            =>  'required|exists:tabel_salurans,id',
            'inputs_komunikasi.*.jenjang_komunikasi_id' =>  'required|exists:tabel_jenjang_komunikasis,id',
            'inputs_komunikasi.*.tindak_lanjut_id'      =>  'required|exists:tabel_tindak_lanjuts,id',
            'inputs_komunikasi.*.catatan'               =>  'required',
            'inputs_komunikasi.*.tgl_selanjutnya'       =>  'required',
            'inputs_komunikasi.*.dokumen_komunikasi'    =>  'file',
        ]);

        foreach ($request->input('inputs_komunikasi') as $key => $item) {
            $komunikasi = Komunikasi::findOrFail($key);
            $komunikasi->update([
                'donor_id'      => $item['donor_id'],
                'tanggal'               => $item['tanggal'],
                'saluran_id'            => $item['saluran_id'],
                'jenjang_komunikasi_id' => $item['jenjang_komunikasi_id'],
                'tindak_lanjut_id'      => $item['tindak_lanjut_id'],
                'catatan'               => $item['catatan'],
                'tgl_selanjutnya'       => $item['tgl_selanjutnya'],
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
                File::delete($komunikasi->dokumen_komunikasi);
                $komunikasi->dokumen_komunikasi = $path;
            }
            $komunikasi->save();
        }
        return redirect()->route('pages.komunikasi', ['komunikasi' => $komunikasi->id])
        ->with('toast_success', 'Data komunikasi berhasil diupdate');
    }

    public function destroy_grid_edit_komunikasi($id) {
        $komunikasi = Komunikasi::findOrFail($id);
        $donorId = $komunikasi->donor_id;
        File::delete($komunikasi->dokumen_komunikasi);
        $komunikasi->delete();
        return redirect()->route('komunikasi.gridEdit')
                         ->with('success', 'Data komunikasi berhasil dihapus.');
    }
}
