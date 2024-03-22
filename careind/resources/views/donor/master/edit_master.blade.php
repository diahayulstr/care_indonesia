<!DOCTYPE html>
<html lang="en">

<head>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    @include('layouts.template')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
                <div class="sidebar-brand-text mx-3">Care Indonesia</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('donor') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Donor</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('narahubung') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Narahubung</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('komunikasi') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Komunikasi</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ url('proposal') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Proposal</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('style/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    {{-- <h1 class="h3 mb-2 text-gray-800">Donor</h1> --}}

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="m-0 font-weight-bold text-danger">Master/Detail Edit</h6>
                            </div>
                            <div>
                                <a href="{{ url('master/'.$donor->id) }}" class="btn btn-outline-info btn-circle me-2" data-bs-toggle="tooltip" title="Master/Detail View">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                        <form action="{{ route('master.update_master_add', ['master' => $donor->id]) }}" method="POST" id="form-edit-master"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                <!-- Default Tabs -->
                                <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100 active" id="donor-tab" data-bs-toggle="tab"
                                            data-bs-target="#donor-justified" type="button" role="tab"
                                            aria-controls="donor" aria-selected="true">Donor</button>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100" id="narahubung-tab" data-bs-toggle="tab"
                                            data-bs-target="#narahubung-justified" type="button" role="tab"
                                            aria-controls="narahubung" aria-selected="false">Narahubung</button>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100" id="komunikasi-tab" data-bs-toggle="tab"
                                            data-bs-target="#komunikasi-justified" type="button" role="tab"
                                            aria-controls="komunikasi" aria-selected="false">Komunikasi</button>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100" id="proposal-tab" data-bs-toggle="tab"
                                            data-bs-target="#proposal-justified" type="button" role="tab"
                                            aria-controls="proposal" aria-selected="false">Proposal</button>
                                    </li>
                                </ul>


                                <div class="tab-content pt-4" id="myTabjustifiedContent">
                                    {{-- DONOR --}}
                                    <div class="tab-pane fade show active" id="donor-justified" role="tabpanel"
                                        aria-labelledby="donor-tab">
                                        <div class="row">
                                            <div class="col-8">
                                                <!-- Nama Organisasi -->
                                                <div class="form-group">
                                                    <label for="nama_organisasi">Nama Organisasi</label>
                                                    <input type="text" placeholder="Nama Organisasi"
                                                        class="form-control @error('nama_organisasi') is-invalid @enderror"
                                                        id="nama_organisasi" name="nama_organisasi"
                                                        value="{{ old('nama_organisasi') ?? $donor->nama_organisasi }}">
                                                    @error('nama_organisasi')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Alamat -->
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" placeholder="Alamat"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        id="alamat" name="alamat"
                                                        value="{{ old('alamat') ?? $donor->alamat }}">
                                                    @error('alamat')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Negara -->
                                                <div class="form-group">
                                                    <label for="negara">Negara</label>
                                                    <input type="text" placeholder="Negara"
                                                        class="form-control @error('negara') is-invalid @enderror"
                                                        id="negara" name="negara"
                                                        value="{{ old('negara') ?? $donor->negara }}">
                                                    @error('negara')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Provinsi -->
                                                <div class="form-group">
                                                    <label for="provinsi_id">Provinsi</label>
                                                    <select class="form-select" name="provinsi_id" id="provinsi_id">
                                                        <option value="">Pilih Provinsi</option>
                                                        @foreach ($provinces as $provinsi)
                                                            <option value="{{ $provinsi->id }}"
                                                                {{ $provinsi->id == old('provinsi_id', $donor->provinsi_id) ? 'selected' : '' }}>
                                                                {{ $provinsi->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('provinsi_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Kabupaten -->
                                                <div class="form-group">
                                                    <label for="kabupaten_id">Kabupaten</label>
                                                    <select class="form-select" name="kabupaten_id"
                                                        id="kabupaten_id">
                                                        <option value="{{ $donor->kabupaten->id }}"
                                                            {{ $donor->kabupaten->id == old('kabupaten_id', $donor->kabupaten_id) ? 'selected' : '' }}>
                                                            {{ $donor->kabupaten->name }}</option>
                                                    </select>
                                                    @error('kabupaten_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Kecamatan -->
                                                <div class="form-group">
                                                    <label for="kecamatan_id">Kecamatan</label>
                                                    <select class="form-select" name="kecamatan_id"
                                                        id="kecamatan_id">
                                                        <option value="{{ $donor->kecamatan->id }}"
                                                            {{ $donor->kecamatan->id == old('kecamatan_id', $donor->kecamatan_id) ? 'selected' : '' }}>
                                                            {{ $donor->kecamatan->name }}</option> }
                                                    </select>
                                                    @error('kecamatan_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Desa -->
                                                <div class="form-group">
                                                    <label for="desa_id">Desa</label>
                                                    <select class="form-select" name="desa_id" id="desa_id">
                                                        <option value="{{ $donor->desa->id }}"
                                                            {{ $donor->desa->id == old('desa_id', $donor->desa_id) ? 'selected' : '' }}>
                                                            {{ $donor->desa->name }}</option>
                                                    </select>
                                                    @error('desa_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Website -->
                                                <div class="form-group">
                                                    <label for="website">Website</label>
                                                    <input type="text" placeholder="Website"
                                                        class="form-control @error('website') is-invalid @enderror"
                                                        id="website" name="website"
                                                        value="{{ old('website') ?? $donor->website }}">
                                                    @error('website')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Informasi Singkat -->
                                                <div class="form-group">
                                                    <label for="informasi_singkat">Informasi Singkat</label>
                                                    <textarea placeholder="Informasi Singkat" class="form-control @error('informasi_singkat') is-invalid @enderror"
                                                        id="informasi_singkat" name="informasi_singkat">{{ old('informasi_singkat') ?? $donor->informasi_singkat }}</textarea>
                                                    @error('informasi_singkat')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Jenis Organisasi -->
                                                <div class="form-group">
                                                    <label for="jenis_organisasi_id">Jenis Organisasi</label>
                                                    <select class="form-select" name="jenis_organisasi_id"
                                                        id="jenis_organisasi_id">
                                                        <option value="">Pilih Jenis Organisasi</option>
                                                        @foreach ($jenisOrganisasis as $jenisOrganisasi)
                                                            <option value="{{ $jenisOrganisasi->id }}"
                                                                {{ $jenisOrganisasi->id == old('jenis_organisasi_id', $donor->jenis_organisasi_id) ? 'selected' : '' }}>
                                                                {{ $jenisOrganisasi->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('jenis_organisasi_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Komitmen SDGs -->
                                                <div class="form-group">
                                                    <label for="komitmen_sdgs">Komitmen SDGs</label>
                                                    <select class="form-select form-control" name="komitmen_sdgs[]"
                                                        id="komitmen_sdgs" multiple>
                                                        <option value="">Pilih Komitmen SDGs</option>
                                                        @php $komitSdgs = json_decode($donor->komitmen_sdgs); @endphp
                                                        @foreach ($komitmenSdgs as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ in_array($item->id, $komitSdgs) ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('komitmen_sdgs')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Date -->
                                                <div class="form-group">
                                                    <label for="date">Date</label>
                                                    <input type="date"
                                                        class="form-control @error('date') is-invalid @enderror"
                                                        id="date" name="date"
                                                        value="{{ old('date') ?? $donor->date }}">
                                                    @error('date')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Dokumen -->
                                                <div class="form-group mb-4">
                                                    <label for="dokumen_donor" class="form-label">Dokumen</label>
                                                    <input type="file" class="form-control" id="dokumen_donor"
                                                        name="dokumen_donor">
                                                    <br>
                                                    @if ($donor->dokumen_donor)
                                                        <input type="text" class="form-control"
                                                            value="{{ basename($donor->dokumen_donor) }}" readonly>
                                                        <br>
                                                        @php
                                                            $extension = pathinfo(
                                                                $donor->dokumen_donor,
                                                                PATHINFO_EXTENSION,
                                                            );
                                                        @endphp
                                                        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                            <img src="{{ url('') }}/{{ $donor->dokumen_donor }}"
                                                                alt="Pratinjau Gambar"
                                                                style="max-width: 300px; max-height: 300px;">
                                                        @elseif ($extension === 'pdf')
                                                            <embed
                                                                src="{{ url('') }}/{{ $donor->dokumen_donor }}"
                                                                type="application/pdf" width="500" height="500">
                                                        @else
                                                            Tidak ada pratinjau
                                                        @endif
                                                    @else
                                                        <p>Tidak ada dokumen</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- NARAHUBUNG --}}
                                    <div class="tab-pane fade" id="narahubung-justified" role="tabpanel"
                                        aria-labelledby="narahubung-tab">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr class="text-center fw-bold" style="width: 250px;">
                                                        <th>Narahubung ID</th>
                                                        <th>Nama Kontak</th>
                                                        <th>Jabatan</th>
                                                        <th>Email</th>
                                                        <th>No Telepon</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($narahubung as $narahubungs)
                                                        <tr>
                                                            <td><input type="text" placeholder="Narahubung ID"
                                                                    class="form-control @error('items_narahubung.' . $narahubungs->id . '.id') is-invalid @enderror"
                                                                    id="id"
                                                                    name="items_narahubung[{{ $narahubungs->id }}][id]"
                                                                    value="{{ old('items_narahubung.' . $narahubungs->id . '.id') ?? $narahubungs->id }}"
                                                                    readonly></td>
                                                            <td>
                                                                <input type="text" placeholder="Nama Kontak"
                                                                    class="form-control @error('items_narahubung.' . $narahubungs->id . '.nama_kontak') is-invalid @enderror"
                                                                    id="nama_kontak"
                                                                    name="items_narahubung[{{ $narahubungs->id }}][nama_kontak]"
                                                                    value="{{ old('items_narahubung.' . $narahubungs->id . '.nama_kontak') ?? $narahubungs->nama_kontak }}">
                                                                @error('items_narahubung.' . $narahubungs->id . '.nama_kontak')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td><input type="text" placeholder=""
                                                                    class="form-control @error('items_narahubung.' . $narahubungs->id . '.jabatan') is-invalid @enderror"
                                                                    id="jabatan"
                                                                    name="items_narahubung[{{ $narahubungs->id }}][jabatan]"
                                                                    value="{{ old('items_narahubung.' . $narahubungs->id . '.jabatan') ?? $narahubungs->jabatan }}">
                                                                @error('items_narahubung.' . $narahubungs->id . '.jabatan')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td><input type="email" placeholder="Email"
                                                                    class="form-control @error('items_narahubung.' . $narahubungs->id . '.email') is-invalid @enderror"
                                                                    id="email"
                                                                    name="items_narahubung[{{ $narahubungs->id }}][email]"
                                                                    value="{{ old('items_narahubung.' . $narahubungs->id . '.email') ?? $narahubungs->email }}">
                                                                @error('items_narahubung.' . $narahubungs->id . '.email')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td><input type="tel" placeholder="Nomor Telepon"
                                                                    class="form-control @error('items_narahubung.' . $narahubungs->id . '.no_telp') is-invalid @enderror"
                                                                    id="no_telp"
                                                                    name="items_narahubung[{{ $narahubungs->id }}][no_telp]"
                                                                    value="{{ old('items_narahubung.' . $narahubungs->id . '.no_telp') ?? $narahubungs->no_telp }}">
                                                                @error('items_narahubung.' . $narahubungs->id . '.no_telp')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td><select class="form-select"
                                                                    name="items_narahubung[{{ $narahubungs->id }}][status_id]"
                                                                    id="status_id_{{ $narahubungs->id }}">
                                                                    <option value="">--Pilih Status--</option>
                                                                    @foreach ($status as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == old('items_narahubung.' . $narahubungs->id . '.status_id', $narahubungs->status_id) ? 'selected' : '' }}>
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('items_narahubung.' . $narahubungs->id . '.status_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <div class="d-inline-block">
                                                                    {{-- <form
                                                                        action="{{ route('master.destroy_master_narahubung', ['master' => $narahubungs->id]) }}"
                                                                        method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button
                                                                            class="btn btn-danger btn-circle delete-btn"
                                                                            data-confirm-delete="true"
                                                                            data-bs-toggle="tooltip" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form> --}}
                                                                    <a class="btn btn-danger btn-circle delete-btn-narahubung"
                                                                        onclick="deleteNarahubung()"
                                                                        data-narahubung-id="{{ $narahubungs->id }}" title="Delete"><i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        @empty
                                                            <td colspan="10" class="text-center">Tidak ada data...
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    {{-- KOMUNIKASI --}}
                                    <div class="tab-pane fade" id="komunikasi-justified" role="tabpanel"
                                        aria-labelledby="komunikasi-tab">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr class="text-center fw-bold">
                                                        <th>Komunikasi ID</th>
                                                        <th>Tanggal</th>
                                                        <th>Saluran</th>
                                                        <th>Jenjang Komunikasi</th>
                                                        <th>Tindak Lanjut</th>
                                                        <th>Catatan</th>
                                                        <th>Tanggal Selanjutnya</th>
                                                        <th>Dokumen</th>
                                                        <th colspan="4">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($komunikasi as $komunikasis)
                                                        <tr>
                                                            <td><input type="text" placeholder="Komunikasi ID"
                                                                    class="form-control" id="id"
                                                                    name="items_komunikasi[{{ $komunikasis->id }}][id]"
                                                                    value="{{ old('items_komunikasi.' . $komunikasis->id . '.id') ?? $komunikasis->id }}"
                                                                    readonly>
                                                            </td>
                                                            <td>
                                                                <input type="date" placeholder="Tanggal"
                                                                    class="form-control @error('tanggal') is-invalid @enderror"
                                                                    id="tanggal"
                                                                    name="items_komunikasi[{{ $komunikasis->id }}][tanggal]"
                                                                    value="{{ old('items_komunikasi.' . $komunikasis->id . '.tanggal') ?? $komunikasis->tanggal }}">
                                                                @error('tanggal')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-control"
                                                                    name="items_komunikasi[{{ $komunikasis->id }}][saluran_id]"
                                                                    id="saluran_id">
                                                                    <option value="">--Pilih Saluran--</option>
                                                                    @foreach ($saluran as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == old('items_komunikasi.' . $komunikasis->id . '.saluran_id', $komunikasis->saluran_id) ? 'selected' : '' }}>
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-control"
                                                                    name="items_komunikasi[{{ $komunikasis->id }}][jenjang_komunikasi_id]"
                                                                    id="jenjang_komunikasi_id">
                                                                    <option value="">--Pilih Jenjang Komunikasi--
                                                                    </option>
                                                                    @foreach ($jenjangKomunikasi as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == old('items_komunikasi.' . $komunikasis->id . '.jenjang_komunikasi_id', $komunikasis->jenjang_komunikasi_id) ? 'selected' : '' }}>
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-control"
                                                                    name="items_komunikasi[{{ $komunikasis->id }}][tindak_lanjut_id]"
                                                                    id="tindak_lanjut_id">
                                                                    <option value="">--Pilih Tindak Lanjut--
                                                                    </option>
                                                                    @foreach ($tindakLanjut as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == old('items_komunikasi.' . $komunikasis->id . '.tindak_lanjut_id', $komunikasis->tindak_lanjut_id) ? 'selected' : '' }}>
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <textarea type="text" placeholder="Catatan" class="form-control @error('catatan') is-invalid @enderror"
                                                                    id="catatan" name="items_komunikasi[{{ $komunikasis->id }}][catatan]">{{ old('items_komunikasi.' . $komunikasis->id . '.catatan') ?? $komunikasis->catatan }}</textarea>
                                                                @error('catatan')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input type="date"
                                                                    placeholder="Tanggal Selanjutnya"
                                                                    class="form-control @error('tgl_selanjutnya') is-invalid @enderror"
                                                                    id="tgl_selanjutnya"
                                                                    name="items_komunikasi[{{ $komunikasis->id }}][tgl_selanjutnya]"
                                                                    value="{{ old('items_komunikasi.' . $komunikasis->id . '.tgl_selanjutnya') ?? $komunikasis->tgl_selanjutnya }}">
                                                                @error('tgl_selanjutnya')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input type="file" class="form-control"
                                                                    id="dokumen_komunikasi"
                                                                    name="items_komunikasi[{{ $komunikasis->id }}][dokumen_komunikasi]">
                                                                <br>
                                                                @if ($komunikasis->dokumen_komunikasi)
                                                                    <input type="text" class="form-control"
                                                                        value="{{ basename($komunikasis->dokumen_komunikasi) }}"
                                                                        readonly>
                                                                    <br>
                                                                    @php
                                                                        $extension = pathinfo(
                                                                            $komunikasis->dokumen_komunikasi,
                                                                            PATHINFO_EXTENSION,
                                                                        );
                                                                    @endphp
                                                                @else
                                                                    <p>Tidak ada dokumen</p>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <div class="d-inline-block">
                                                                    {{-- <form
                                                                        action="{{ route('master.destroy_master_komunikasi', ['master' => $komunikasis->id]) }}"
                                                                        method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button
                                                                            class="btn btn-danger btn-circle delete-btn"
                                                                            data-confirm-delete="true"
                                                                            data-bs-toggle="tooltip" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form> --}}
                                                                    <a class="btn btn-danger btn-circle delete-btn-komunikasi"
                                                                        onclick="deleteKomunikasi()"
                                                                        data-komunikasi-id="{{ $komunikasis->id }}" title="Delete"><i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        @empty
                                                            <td colspan="10" class="text-center">Tidak ada data...
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- PROPOSAL --}}
                                    <div class="tab-pane fade" id="proposal-justified" role="tabpanel"
                                        aria-labelledby="proposal-tab">
                                        <div class="table-responsive" id="table_select2">
                                            <table class="table table-hover table-bordered" id="table_id">
                                                <thead>
                                                    <tr class="text-center fw-bold">
                                                        <th>Proposal ID</th>
                                                        <th>Tujuan Pendanaan</th>
                                                        <th>Jenis Penerimaan</th>
                                                        <th>Saluran Pendanaan</th>
                                                        <th>Jenis Intermediary</th>
                                                        <th>Nama Proyek</th>
                                                        <th>Klasifikasi Portfolio</th>
                                                        <th>Impact Goals</th>
                                                        <th>Estimasi Nilai USD</th>
                                                        <th>Estimasi Nilai IDR</th>
                                                        <th>Usulan Durasi</th>
                                                        <th>Status Kemajuan</th>
                                                        <th>Dokumen</th>
                                                        <th colspan="4">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($proposal as $proposals)
                                                        <tr>
                                                            <td>
                                                                <input type="text" placeholder="Proposal ID"
                                                                    class="form-control @error('id') is-invalid @enderror"
                                                                    id="id"
                                                                    name="items_proposal[{{ $proposals->id }}][id]"
                                                                    value="{{ old('id') ?? $proposals->id }}"
                                                                    readonly>
                                                                @error('id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-control"
                                                                    name="items_proposal[{{ $proposals->id }}][tujuan_pendanaan_id]"
                                                                    id="tujuan_pendanaan_id">
                                                                    <option value="">--Pilih Tujuan Pendanaan--
                                                                    </option>
                                                                    @foreach ($tujuanPendanaan as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == old('tujuan_pendanaan_id', $proposals->tujuan_pendanaan_id) ? 'selected' : '' }}>
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('tujuan_pendanaan_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-control"
                                                                    name="items_proposal[{{ $proposals->id }}][jenis_penerimaan_id]"
                                                                    id="jenis_penerimaan_id">
                                                                    <option value="">--Pilih Jenis Penerimaan--
                                                                    </option>
                                                                    @foreach ($jenisPenerimaan as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == old('jenis_penerimaan_id', $proposals->jenis_penerimaan_id) ? 'selected' : '' }}>
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('jenis_penerimaan_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-control"
                                                                    name="items_proposal[{{ $proposals->id }}][saluran_pendanaan_id]"
                                                                    id="saluran_pendanaan_id">
                                                                    <option value="">--Pilih Saluran Pendanaan--
                                                                    </option>
                                                                    @foreach ($saluranPendanaan as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == old('saluran_pendanaan_id', $proposals->saluran_pendanaan_id) ? 'selected' : '' }}>
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('saluran_pendanaan_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-control"
                                                                    name="items_proposal[{{ $proposals->id }}][jenis_intermediaries_id]"
                                                                    id="jenis_intermediaries_id">
                                                                    <option value="">--Pilih Jenis Intermediary--
                                                                    </option>
                                                                    @foreach ($jenisIntermediaries as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == old('jenis_intermediaries_id', $proposals->jenis_intermediaries_id) ? 'selected' : '' }}>
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('jenis_intermediaries_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="Nama Proyek"
                                                                    class="form-control @error('nama_proyek') is-invalid @enderror"
                                                                    id="nama_proyek"
                                                                    name="items_proposal[{{ $proposals->id }}][nama_proyek]"
                                                                    value="{{ old('nama_proyek') ?? $proposals->nama_proyek }}">
                                                                @error('nama_proyek')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-control"
                                                                    name="items_proposal[{{ $proposals->id }}][klasifikasi_portfolio_id]"
                                                                    id="klasifikasi_portfolio_id">
                                                                    <option value="">--Pilih Klasifikasi
                                                                        Portfolio--
                                                                    </option>
                                                                    @foreach ($klasifikasiPortfolios as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == old('klasifikasi_portfolio_id', $proposals->klasifikasi_portfolio_id) ? 'selected' : '' }}>
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('klasifikasi_portfolio_id')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td id="group-select2">
                                                                <select class="impact-goals-select form-select form-control"
                                                                    name="items_proposal[{{ $proposals->id }}][impact_goals_id][]"
                                                                    id="impact_goals_id_{{ $proposals->id }}" multiple>
                                                                    <option value="">--Pilih Impact Goals--
                                                                    </option>
                                                                    @php $impactGoalsIds = json_decode($proposals->impact_goals_id); @endphp
                                                                    @foreach ($impactGoals as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ in_array($item->id, $impactGoalsIds) ? 'selected' : '' }}>
                                                                            {{ $item->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="Estimasi Nilai USD"
                                                                    class="form-control @error('estimasi_nilai_usd') is-invalid @enderror"
                                                                    id="estimasi_nilai_usd"
                                                                    name="items_proposal[{{ $proposals->id }}][estimasi_nilai_usd]"
                                                                    value="{{ old('estimasi_nilai_usd') ?? $proposals->estimasi_nilai_usd }}">
                                                                @error('estimasi_nilai_usd')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="Estimasi Nilai IDR"
                                                                    class="form-control @error('estimasi_nilai_idr') is-invalid @enderror"
                                                                    id="estimasi_nilai_idr"
                                                                    name="items_proposal[{{ $proposals->id }}][estimasi_nilai_idr]"
                                                                    value="{{ old('estimasi_nilai_idr') ?? $proposals->estimasi_nilai_idr }}">
                                                                @error('estimasi_nilai_idr')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input type="number" placeholder="Usulan Durasi"
                                                                    class="form-control @error('usulan_durasi') is-invalid @enderror"
                                                                    id="usulan_durasi"
                                                                    name="items_proposal[{{ $proposals->id }}][usulan_durasi]"
                                                                    value="{{ old('usulan_durasi') ?? $proposals->usulan_durasi }}">
                                                                @error('usulan_durasi')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <select class="form-select form-control"
                                                                    name="items_proposal[{{ $proposals->id }}][status_kemajuan_id]" id="status_kemajuan_id">
                                                                    <option value="">--Pilih Status Kemajuan--
                                                                    </option>
                                                                    @foreach ($statusKemajuan as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == old('status_kemajuan_id', $proposals->status_kemajuan_id) ? 'selected' : '' }}>
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="file" class="form-control"
                                                                    id="dokumen_proposal"
                                                                    name="items_proposal[{{ $proposals->id }}][dokumen_proposal]">
                                                                <br>
                                                                @if ($proposals->dokumen_proposal)
                                                                    <input type="text" class="form-control"
                                                                        value="{{ basename($proposals->dokumen_proposal) }}"
                                                                        readonly>
                                                                    <br>
                                                                    @php
                                                                        $extension = pathinfo(
                                                                            $proposals->dokumen_proposal,
                                                                            PATHINFO_EXTENSION,
                                                                        );
                                                                    @endphp
                                                                @else
                                                                    <p>Tidak ada dokumen</p>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="d-inline-block">
                                                                    {{-- <form
                                                                        action="{{ route('master.destroy_master_proposal', ['master' => $proposals->id]) }}"
                                                                        method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button
                                                                            class="btn btn-danger btn-circle delete-btn"
                                                                            data-confirm-delete="true"
                                                                            data-bs-toggle="tooltip" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form> --}}
                                                                    <a class="btn btn-danger btn-circle delete-btn-proposal"
                                                                        onclick="deleteProposal()"
                                                                        data-proposal-id="{{ $proposals->id }}" title="Delete"><i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        @empty
                                                            <td colspan="15" class="text-center">Tidak ada data...
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ url('donor') }}" class="btn btn-outline-primary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Care Indonesia 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <form id="deleteFormNarahubung" action="{{ url('master/'.$narahubungs->id.'/narahubung') }}" method="POST" style="display: none;">
        @method('DELETE')
        @csrf
    </form>

    <form id="deleteFormKomunikasi" action="{{ url('master/'.$komunikasis->id.'/komunikasi') }}" method="POST" style="display: none;">
        @method('DELETE')
        @csrf
    </form>

    <form id="deleteFormProposal" action="{{ url('master/'.$proposals->id.'/proposal') }}" method="POST" style="display: none;">
        @method('DELETE')
        @csrf
    </form>


    @include('layouts.template')

</body>

</html>
