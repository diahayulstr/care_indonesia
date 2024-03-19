<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Narahubung;
use App\Models\TabelStatus;
use App\Models\Donor;

class NarahubungController extends Controller
{
    public function narahubung() {
        $narahubung = Narahubung::paginate(4);
        return view('pages.narahubung', compact('narahubung'));
    }

    public function addNarahubung() {
        $status = TabelStatus::all();
        $donorID = Donor::all();
        return view('narahubung.add', compact('status', 'donorID'));
    }

    public function store(Request $request) {
        $request->validate([
            'donor_id'       => 'required|exists:donors,id',
            'nama_kontak'    => 'required',
            'jabatan'        => 'required',
            'email'          => 'required|max:15',
            'no_telp'        => 'required',
            'status_id'      => 'required|exists:tabel_statuses,id',
        ]);
        $narahubung = new Narahubung();
        $narahubung->donor_id       = $request->donor_id;
        $narahubung->nama_kontak    = $request->nama_kontak;
        $narahubung->jabatan        = $request->jabatan;
        $narahubung->email          = $request->email;
        $narahubung->no_telp        = $request->no_telp;
        $narahubung->status_id      = $request->status_id;
        $narahubung->save();
        return redirect()->route('pages.narahubung')->
        with('toast_success', 'Data narahubung berhasil ditambahkan.');
    }

    public function show($id) {
        $narahubung = Narahubung::findOrFail($id);
        return view('narahubung.view', compact('narahubung'));
    }

    public function edit($id) {
        $donorID = Donor::all();
        $status = TabelStatus::all();
        $narahubung = Narahubung::findOrFail($id);
        return view('narahubung.edit', compact (
            'donorID', 'status', 'narahubung'
        ));

    }

    public function update(Request $request, Narahubung $narahubung) {
        $request -> validate ([
            'donor_id'      =>  'required|exists:donors,id',
            'nama_kontak'   =>  'required',
            'jabatan'       =>  'required',
            'email'         =>  'required',
            'no_telp'       =>  'required|max:15',
            'status_id'     =>  'required|exists:tabel_statuses,id',
        ]);

        $narahubung -> update($request->only([
            'donor_id',
            'nama_kontak',
            'jabatan',
            'email',
            'no_telp',
            'status_id',
        ]));
        return redirect()->route('pages.narahubung', ['narahubung' => $narahubung->id])
        ->with('toast_success', 'Data narahubung berhasil diupdate');
    }

    public function destroy($id) {
        $narahubung = Narahubung::findOrFail($id);
        $narahubung->delete();
        return redirect()->route('pages.narahubung')->with('success', 'Data narahubung berhasil dihapus');
    }
}
