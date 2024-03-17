<!-- Modal Add Master/Detail Komunikasi -->
<div class="modal fade" id="form-add-master-komunikasi" data-bs-backdrop="static" data-bs-keyboard="false"
tabindex="-1" aria-labelledby="formAddLabelKomunikasi" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <form id="addmasterFormKomunikasi" action="{{ url('master_komunikasi/' . $donor->id) }}" method="POST"
        enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formAddLabelKomunikasi">Add Komunikasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="donor_id">Donor ID</label>
                    <input type="text" class="form-control" name="donor_id" id="donor_id-master-komunikasi"
                        readonly value="{{ $item->donor_id ?? '' }}">
                    @error('donor_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" placeholder="Tanggal"
                        class="form-control @error('tanggal') is-invalid @enderror"
                        id="tanggal" name="tanggal"
                        value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="saluran_id">Saluran</label>
                    <select class="form-select form-control" name="saluran_id" id="saluran_id">
                        <option value="">--Pilih Saluran--</option>
                        @foreach($saluran as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenjang_komunikasi_id">Jenjang Komunikasi</label>
                    <select class="form-select form-control" name="jenjang_komunikasi_id" id="jenjang_komunikasi_id">
                        <option value="">--Pilih Jenjang Komunikasi--</option>
                        @foreach($jenjangKomunikasi as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tindak_lanjut_id">Tindak Lanjut</label>
                    <select class="form-select form-control" name="tindak_lanjut_id" id="tindak_lanjut_id">
                        <option value="">--Pilih Tindak Lanjut--</option>
                        @foreach($tindakLanjut as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea type="text" placeholder="Catatan"
                        class="form-control @error('catatan') is-invalid @enderror"
                        id="catatan" name="catatan"
                        value="{{ old('catatan') }}"></textarea>
                    @error('catatan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tgl_selanjutnya">Tanggal Selanjutnya</label>
                    <input type="date" placeholder="Tanggal Selanjutnya"
                        class="form-control @error('tgl_selanjutnya') is-invalid @enderror"
                        id="tgl_selanjutnya" name="tgl_selanjutnya"
                        value="{{ old('tgl_selanjutnya') }}">
                    @error('tgl_selanjutnya')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="dokumen" class="form-label">Dokumen</label>
                    <input type="file" class="form-control" id="dokumen" name="dokumen" onchange="validateFile()">
                    <small class="text-muted">File harus berupa gambar (jpg, jpeg, png, gif) atau PDF.</small>
                    <span id="file-error" class="text-danger"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
</div>
</div>


<!-- Modal Add Master/Detail Proposal -->
<div class="modal fade" id="form-add-master-proposal" data-bs-backdrop="static" data-bs-keyboard="false"
tabindex="-1" aria-labelledby="formAddLabelProposal" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <form id="addmasterFormProposal" action="{{ url('master_proposal/' . $donor->id) }}" method="POST"
        enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formAddLabelProposal">Add Proposal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="donor_id">Donor ID</label>
                    <input type="text" class="form-control" name="donor_id" id="donor_id-master-proposal"
                        readonly value="{{ $item->donor_id ?? '' }}">
                    @error('donor_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tujuan_pendanaan_id">Tujuan Pendanaan</label>
                    <select class="form-select form-control" name="tujuan_pendanaan_id" id="tujuan_pendanaan_id">
                        <option value="">--Pilih Tujuan Pendanaan--</option>
                        @foreach($tujuanPendanaan as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_penerimaan_id">Jenis Penerimaan</label>
                    <select class="form-select form-control" name="jenis_penerimaan_id" id="jenis_penerimaan_id">
                        <option value="">--Pilih Jenis Penerimaan--</option>
                        @foreach($jenisPenerimaan as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="saluran_pendanaan_id">Saluran Pendanaan</label>
                    <select class="form-select form-control" name="saluran_pendanaan_id" id="saluran_pendanaan_id">
                        <option value="">--Pilih Saluran Pendanaan--</option>
                        @foreach($saluranPendanaan as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_intermediaries_id">Jenis Intermediary</label>
                    <select class="form-select form-control" name="jenis_intermediaries_id" id="jenis_intermediaries_id">
                        <option value="">--Pilih Jenis Intermediary--</option>
                        @foreach($jenisIntermediaries as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_proyek">Nama Proyek</label>
                    <input type="text" placeholder="Nama Proyek"
                        class="form-control @error('nama_proyek') is-invalid @enderror"
                        id="nama_proyek" name="nama_proyek"
                        value="{{ old('nama_proyek') }}">
                    @error('nama_proyek')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="klasifikasi_portfolio_id">Klasifikasi Portfolio</label>
                    <select class="form-select form-control" name="klasifikasi_portfolio_id" id="klasifikasi_portfolio_id">
                        <option value="">--Pilih Klasifikasi Portfolio--</option>
                        @foreach($klasifikasiPortfolios as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="impact_goals_id">Impact Goals</label>
                    <select class="form-select form-control" name="impact_goals_id[]
                    " id="impact_goals_id" multiple>
                        <option value="">--Pilih Impact Goals--</option>
                        @foreach($impactGoals as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="estimasi_nilai_usd">Estimasi Nilai USD</label>
                    <input type="text" placeholder="Estimasi Nilai USD"
                        class="form-control @error('estimasi_nilai_usd') is-invalid @enderror"
                        id="estimasi_nilai_usd" name="estimasi_nilai_usd"
                        value="{{ old('estimasi_nilai_usd') }}">
                    @error('estimasi_nilai_usd')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="estimasi_nilai_idr">Estimasi Nilai IDR</label>
                    <input type="text" placeholder="Estimasi Nilai IDR"
                        class="form-control @error('estimasi_nilai_idr') is-invalid @enderror"
                        id="estimasi_nilai_idr" name="estimasi_nilai_idr"
                        value="{{ old('estimasi_nilai_idr') }}">
                    @error('estimasi_nilai_idr')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="usulan_durasi">Usulan Durasi</label>
                    <input type="text" placeholder="Usulan Durasi"
                        class="form-control @error('usulan_durasi') is-invalid @enderror"
                        id="usulan_durasi" name="usulan_durasi"
                        value="{{ old('usulan_durasi') }}">
                    @error('usulan_durasi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_kemajuan_id">Status Kemajuan</label>
                    <select class="form-select form-control" name="status_kemajuan_id" id="status_kemajuan_id">
                        <option value="">--Pilih Status Kemajuan--</option>
                        @foreach($statusKemajuan as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="dokumen" class="form-label">Dokumen</label>
                    <input type="file" class="form-control" id="dokumen" name="dokumen" onchange="validateFile()">
                    <small class="text-muted">File harus berupa gambar (jpg, jpeg, png, gif) atau PDF.</small>
                    <span id="file-error" class="text-danger"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
</div>
</div>


<!-- Modal Edit Master/Detail Narahubung -->
<div class="modal fade" id="form-edit-master-narahubung" data-bs-backdrop="static" data-bs-keyboard="false"
tabindex="-1" aria-labelledby="formEditLabelNarahubung" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <form id="editmasterFormNarahubung" action="{{ route('master.update_narahubung', ['master_narahubung' => $narahubung->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formEditLabelNarahubung">Edit Narahubung</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-16">
                        <div class="form-group">
                            <label for="id">Narahubung ID</label>
                            <input type="text" class="form-control" name="id"
                                id="narahubung_id-master-narahubung" readonly
                                value="{{ $item->id ?? '' }}"
                                >
                            @error('id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="donor_id">Donor ID</label>
                            <input type="text" class="form-control" name="donor_id"
                                id="donor_id-masteredit-narahubung" readonly
                                value="{{ $item->donor_id ?? '' }}"
                                >
                            @error('donor_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_kontak">Nama Kontak</label>

                            <input type="text" placeholder="Nama Kontak"
                                class="form-control @error('nama_kontak') is-invalid @enderror"
                                id="nama_kontak_edit" name="nama_kontak" value="{{ old('nama_kontak') ?? '' }}">

                            @error('nama_kontak')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" placeholder="Jabatan"
                                class="form-control @error('jabatan') is-invalid @enderror" id="jabatan_edit"
                                name="jabatan" value="{{ old('jabatan') ?? '' }}">
                            @error('jabatan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Email</label>
                            <input type="email" placeholder="Email"
                                class="form-control @error('email') is-invalid @enderror" id="email_edit"
                                name="email" value="{{ old('email') ?? '' }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telepon</label>
                            <input type="tel" placeholder="No Telepon"
                                class="form-control @error('no_telp') is-invalid @enderror" id="no_telp_edit"
                                name="no_telp" value="{{ old('no_telp') ?? '' }}">
                            @error('no_telp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @php
                            $statusId = isset($selectedStatusId) ? $selectedStatusId : null;
                        @endphp
                        <div class="form-group">
                            <label for="status_id">Status</label>
                            <select class="form-select" name="status_id" id="status_id_edit">
                                <option value="">--Pilih Status--</option>
                                @foreach ($status as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $statusId ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
</div>


<!-- Modal Edit Master/Detail Komunikasi -->
<div class="modal fade" id="form-edit-master-komunikasi" data-bs-backdrop="static" data-bs-keyboard="false"
tabindex="-1" aria-labelledby="formEditLabelKomunikasi" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <form id="editmasterFormKomunikasi" action="" method="POST"
        enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formEditLabelKomunikasi">Edit Komunikasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-16">
                        <div class="form-group">
                            <label for="id">Komunikasi ID</label>
                            <input type="text" class="form-control" name="id"
                                id="komunikasi_id-master-komunikasi" readonly
                                value="{{ $item->id ?? '' }}"
                                >
                            @error('id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="donor_id">Donor ID</label>
                            <input type="text" class="form-control" name="donor_id"
                                id="donor_id-masteredit-komunikasi" readonly
                                {{-- value="{{ $item->donor_id ?? '' }}" --}}
                                >
                            @error('donor_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
</div>


<!-- Modal Edit Master/Detail Proposal -->
<div class="modal fade" id="form-edit-master-proposal" data-bs-backdrop="static" data-bs-keyboard="false"
tabindex="-1" aria-labelledby="formEditLabelProposal" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <form id="editmasterFormProposal" action="" method="POST"
        enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formEditLabelProposal">Edit Proposal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-16">
                        <div class="form-group">
                            <label for="id">Proposal ID</label>
                            <input type="text" class="form-control" name="id"
                                id="proposal_id-master-proposal" readonly
                                value="{{ $item->id ?? '' }}"
                                >
                            @error('id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="donor_id">Donor ID</label>
                            <input type="text" class="form-control" name="donor_id"
                                id="donor_id-masteredit-proposal" readonly
                                {{-- value="{{ $item->donor_id ?? '' }}" --}}
                                >
                            @error('donor_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
</div>
