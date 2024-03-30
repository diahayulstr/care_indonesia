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
            'email'          => 'required|email',
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
            'email'         =>  'required|email',
            'no_telp'       =>  'required',
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

    public function grid_add_narahubung() {
        $donorID = Donor::all();
        $status = TabelStatus::all();
        return view('narahubung.gridAdd', compact('donorID', 'status'));
    }

    public function store_grid_add_narahubung(Request $request) {
        $request->validate([
            'inputs_narahubung.*.donor_id'      => 'required|exists:donors,id',
            'inputs_narahubung.*.nama_kontak'   => 'required',
            'inputs_narahubung.*.jabatan'       => 'required',
            'inputs_narahubung.*.email'         => 'required|email',
            'inputs_narahubung.*.status_id'     => 'required|exists:tabel_statuses,id',
        ]);

        foreach($request->inputs_narahubung as $key => $value) {
            Narahubung::create($value);
        }
        return redirect()->route('pages.narahubung')
            ->with('toast_success', 'Data narahubung berhasil ditambahkan.');
    }

    public function edit_grid_narahubung() {
        $narahubung = Narahubung::all();
        $donorID = Donor::all();
        $status = TabelStatus::all();
        return view('narahubung.gridEdit', compact('narahubung','donorID', 'status'));
    }

    public function update_grid_narahubung(Request $request) {
        $request -> validate ([
            'inputs_narahubung.*.donor_id'      => 'required|exists:donors,id',
            'inputs_narahubung.*.nama_kontak'   => 'required',
            'inputs_narahubung.*.jabatan'       => 'required',
            'inputs_narahubung.*.email'         => 'required|email',
            'inputs_narahubung.*.status_id'     => 'required|exists:tabel_statuses,id',
        ]);

        foreach ($request->input('inputs_narahubung') as $key => $item) {
            $narahubung = Narahubung::findOrFail($key);
            $narahubung->update([
                'donor_id'      => $item['donor_id'],
                'nama_kontak'   => $item['nama_kontak'],
                'jabatan'       => $item['jabatan'],
                'email'         => $item['email'],
                'no_telp'       => $item['no_telp'],
                'status_id'     => $item['status_id'],
            ]);
        }
        return redirect()->route('pages.narahubung', ['narahubung' => $narahubung->id])
        ->with('toast_success', 'Data narahubung berhasil diupdate');
    }

    public function destroy_grid_edit_narahubung($id) {
        $narahubung = Narahubung::findOrFail($id);
        $donorId = $narahubung->donor_id;
        $narahubung->delete();
        return redirect()->route('narahubung.gridEdit')
                         ->with('success', 'Data narahubung berhasil dihapus.');
    }

}
