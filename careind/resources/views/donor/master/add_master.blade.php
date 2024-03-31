<!DOCTYPE html>
<html lang="en">

<head>



    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('style/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('style/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css_2/style.css')}}">

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

            @if (Auth::user()->role_id != 1)
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
            @else
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Admin Only</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Pages</h6>
                            <a class="collapse-item" href="{{ url('impact_goals') }}">Impact Goals</a>
                            <a class="collapse-item" href="{{ url('jenis_intermediary') }}">Jenis Intermediary</a>
                            <a class="collapse-item" href="{{ url('jenis_organisasi') }}">Jenis Organisasi</a>
                            <a class="collapse-item" href="{{ url('jenis_penerimaan') }}">Jenis Penerimaan</a>
                            <a class="collapse-item" href="{{ url('jenjang_komunikasi') }}">Jenjang Komunikasi</a>
                            <a class="collapse-item" href="{{ url('klasifikasi_portfolio') }}">Klasifikasi
                                Portfolio</a>
                            <a class="collapse-item" href="{{ url('komitmen_sdgs') }}">Komitmen SDGs</a>
                            <a class="collapse-item" href="{{ url('saluran') }}">Saluran</a>
                            <a class="collapse-item" href="{{ url('saluran_pendanaan') }}">Saluran Pendanaan</a>
                            <a class="collapse-item" href="{{ url('status') }}">Status</a>
                            <a class="collapse-item" href="{{ url('status_kemajuan') }}">Status Kemajuan</a>
                            <a class="collapse-item" href="{{ url('tindak_lanjut') }}">Tindak Lanjut</a>
                            <a class="collapse-item" href="{{ url('tujuan_pendanaan') }}">Tujuan Pendanaan</a>
                            <a class="collapse-item" href="{{ url('user') }}">User</a>
                        </div>
                    </div>
                </li>
            @endif

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
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('style/img/user.png') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
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
                                <h6 class="m-0 font-weight-bold text-danger">Master/Detail Add</h6>
                            </div>
                        </div>
                        <form action="{{ url('master/add') }}" id="form-add-master" method="POST"
                            enctype="multipart/form-data">
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
                                            <div class="col-16">

                                                <div class="form-group">
                                                    <label for="nama_organisasi">Nama Organisasi</label>
                                                    <input type="text" placeholder="Nama Organisasi"
                                                        class="form-control @error('nama_organisasi') is-invalid @enderror"
                                                        id="nama_organisasi" name="nama_organisasi"
                                                        value="{{ old('nama_organisasi') }}">
                                                    @error('nama_organisasi')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" placeholder="Alamat"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        id="alamat" name="alamat" value="{{ old('alamat') }}">
                                                    @error('alamat')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="negara">Negara</label>
                                                    <input type="text" placeholder="Negara"
                                                        class="form-control @error('negara') is-invalid @enderror"
                                                        id="negara" name="negara" value="{{ old('negara') }}">
                                                    @error('negara')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="provinsi_id">Provinsi</label>
                                                    <select class="form-select" name="provinsi_id" id="provinsi_id">
                                                        <option value="">Pilih Provinsi</option>
                                                        @foreach ($provinces as $provinsi)
                                                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('provinsi')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="kabupaten_id">Kabupaten</label>
                                                    <select class="form-select" name="kabupaten_id"
                                                        id="kabupaten_id">
                                                    </select>
                                                    @error('kabupaten')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="kecamatan_id">Kecamatan</label>
                                                    <select class="form-select" name="kecamatan_id"
                                                        id="kecamatan_id">
                                                    </select>
                                                    @error('kecamatan')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="desa_id">Desa</label>
                                                    <select class="form-select" name="desa_id" id="desa_id">
                                                    </select>
                                                    @error('desa')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="website">Website</label>
                                                    <input type="text" placeholder="Website"
                                                        class="form-control @error('website') is-invalid @enderror"
                                                        id="website" name="website" value="{{ old('website') }}">
                                                    @error('website')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="informasi_singkat">Informasi Singkat</label>
                                                    <textarea type="text" placeholder="Informasi Singkat"
                                                        class="form-control @error('informasi_singkat') is-invalid @enderror" id="informasi_singkat"
                                                        name="informasi_singkat" value="{{ old('informasi_singkat') }}"></textarea>
                                                    @error('informasi_singkat')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_organisasi_id">Jenis Organisasi</label>
                                                    <select class="form-select" name="jenis_organisasi_id"
                                                        id="jenis_organisasi_id">
                                                        <option value="">--Pilih--</option>
                                                        @foreach ($jenisOrganisasis as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="komitmen_sdgs">Komitmen SDGs</label>
                                                    <select class="form-select form-control" name="komitmen_sdgs[]"
                                                        id="komitmen_sdgs" multiple>
                                                        <option value="">--Pilih--</option>
                                                        @foreach ($komitmenSdgs as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date">Tanggal</label>
                                                    <input type="date"
                                                        class="form-control @error('date') is-invalid @enderror"
                                                        id="date" name="date" value="{{ old('date') }}">
                                                    @error('date')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="dokumen_donor" class="form-label">Dokumen</label>
                                                    <input type="file" class="form-control" id="dokumen_donor"
                                                        name="dokumen_donor" onchange="validateFile()">
                                                    <small class="text-muted">File harus berupa gambar (jpg, jpeg, png,
                                                        gif) atau PDF.</small>
                                                    <span id="file-error-donor" class="text-danger"></span>
                                                </div>
                                                <div id="filePreview-addMaster-donor"></div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- NARAHUBUNG --}}
                                    <div class="tab-pane fade" id="narahubung-justified" role="tabpanel"
                                        aria-labelledby="narahubung-tab">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h2></h2>
                                            <div class="action-buttons">
                                                @if (Auth::user()->role_id != 1)

                                                @else
                                                    <a href="#" class="btn btn-outline-danger btn-circle me-2 dash-button-add"
                                                        id="btn-blank-row-narahubung" data-bs-toggle="tooltip" title="Add Blank Row">
                                                        <i class="fas fa-plus icon-narhub"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr class="text-center fw-bold" style="width: 250px;">
                                                        <th>Nama Kontak</th>
                                                        <th>Jabatan</th>
                                                        <th>Email</th>
                                                        <th>No Telepon</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table-narahubung">
                                                    {{-- @for ($i = 1; $i <= 3; $i++) --}}
                                                    <tr>
                                                        <td>
                                                            <input type="text" placeholder="Nama Kontak"
                                                                class="form-control @error('nama_kontak') is-invalid @enderror"
                                                                id="nama_kontak" name="inputs_narahubung[0][nama_kontak]"
                                                                value="{{ old('nama_kontak') }}">
                                                            @error('nama_kontak')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </td>
                                                        <td><input type="text" placeholder="Jabatan"
                                                                class="form-control @error('jabatan') is-invalid @enderror"
                                                                id="jabatan" name="inputs_narahubung[0][jabatan]" value="{{ old('jabatan') }}">
                                                            @error('jabatan')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </td>
                                                        <td><input type="email" placeholder="Email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                id="email" name="inputs_narahubung[0][email]" value="{{ old('email') }}">
                                                            @error('email')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </td>
                                                        <td><input type="tel" placeholder="No Telepon"
                                                                class="form-control @error('no_telp') is-invalid @enderror"
                                                                id="no_telp" name="inputs_narahubung[0][no_telp]" value="{{ old('no_telp') }}">
                                                            @error('no_telp')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </td>
                                                        <td><select class="form-select" name="inputs_narahubung[0][status_id]" id="status_id">
                                                                <option value="">--Pilih Status--</option>
                                                                @foreach ($status as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block">
                                                                <a class="btn btn-danger btn-circle" id="delete-btn-row-narahubung" title="Delete">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    {{-- @endfor --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- KOMUNIKASI --}}
                                    <div class="tab-pane fade" id="komunikasi-justified" role="tabpanel"
                                        aria-labelledby="komunikasi-tab">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h2></h2>
                                            <div class="action-buttons">
                                                @if (Auth::user()->role_id != 1)

                                                @else
                                                    <a href="#" class="btn btn-outline-danger btn-circle me-2 dash-button-add"
                                                        id="btn-blank-row-komunikasi" data-bs-toggle="tooltip" title="Add Blank Row">
                                                        <i class="fas fa-plus icon-kom"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr class="text-center fw-bold" style="width: 250px;">
                                                        <th>Tanggal</th>
                                                        <th>Saluran</th>
                                                        <th>Jenjang Komunikasi</th>
                                                        <th>Tindak Lanjut</th>
                                                        <th>Catatan</th>
                                                        <th>Tanggal Selanjutnya</th>
                                                        <th>Dokumen</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table-komunikasi">
                                                    <tr>
                                                        <td>
                                                            <input type="date" placeholder="Tanggal"
                                                            class="form-control @error('tanggal') is-invalid @enderror"
                                                            id="tanggal" name="inputs_komunikasi[0][tanggal]" value="{{ old('tanggal') }}">
                                                            @error('tanggal')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <select class="form-select form-control" name="inputs_komunikasi[0][saluran_id]" id="saluran_id">
                                                                <option value="">--Pilih Saluran--</option>
                                                                @foreach ($saluran as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select form-control" name="inputs_komunikasi[0][jenjang_komunikasi_id]"
                                                                id="jenjang_komunikasi_id">
                                                                <option value="">--Pilih Jenjang Komunikasi--</option>
                                                                @foreach ($jenjangKomunikasi as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select form-control" name="inputs_komunikasi[0][tindak_lanjut_id]"
                                                                id="tindak_lanjut_id">
                                                                <option value="">--Pilih Tindak Lanjut--</option>
                                                                @foreach ($tindakLanjut as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <textarea type="text" placeholder="Catatan" class="form-control @error('catatan') is-invalid @enderror"
                                                                id="catatan" name="inputs_komunikasi[0][catatan]" value="{{ old('catatan') }}"></textarea>
                                                            @error('catatan')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="date" placeholder="Tanggal Selanjutnya"
                                                                class="form-control @error('tgl_selanjutnya') is-invalid @enderror"
                                                                id="tgl_selanjutnya" name="inputs_komunikasi[0][tgl_selanjutnya]"
                                                                value="{{ old('tgl_selanjutnya') }}">
                                                            @error('tgl_selanjutnya')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="file" class="form-control" id="dokumen_komunikasi"
                                                                name="inputs_komunikasi[0][dokumen_komunikasi]" onchange="validateFile()">
                                                            <small class="text-muted">File harus berupa gambar (jpg, jpeg, png, gif)
                                                                atau PDF.</small>
                                                            <span id="file-error" class="text-danger"></span>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block">
                                                                <a class="btn btn-danger btn-circle" id="delete-btn-row-komunikasi" title="Delete">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- PROPOSAL --}}
                                    <div class="tab-pane fade" id="proposal-justified" role="tabpanel"
                                        aria-labelledby="proposal-tab">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h2></h2>
                                            <div class="action-buttons">
                                                @if (Auth::user()->role_id != 1)

                                                @else
                                                    <a href="#" class="btn btn-outline-danger btn-circle me-2 dash-button-add"
                                                        id="btn-blank-row-proposal" data-bs-toggle="tooltip" title="Add Blank Row">
                                                        <i class="fas fa-plus icon-prop"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr class="text-center fw-bold" style="width: 250px;">
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
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table-proposal">
                                                    {{-- @for ($i = 1; $i <= 3; $i++) --}}
                                                    <tr>
                                                        <td>
                                                            <select class="form-select form-control" name="inputs_proposal[0][tujuan_pendanaan_id]"
                                                                id="tujuan_pendanaan_id">
                                                                <option value="">--Pilih Tujuan Pendanaan--</option>
                                                                @foreach ($tujuanPendanaan as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select form-control" name="inputs_proposal[0][jenis_penerimaan_id]"
                                                                id="jenis_penerimaan_id">
                                                                <option value="">--Pilih Jenis Penerimaan--</option>
                                                                @foreach ($jenisPenerimaan as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select form-control" name="inputs_proposal[0][saluran_pendanaan_id]"
                                                                id="saluran_pendanaan_id">
                                                                <option value="">--Pilih Saluran Pendanaan--</option>
                                                                @foreach ($saluranPendanaan as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select form-control" name="inputs_proposal[0][jenis_intermediaries_id]"
                                                                id="jenis_intermediaries_id">
                                                                <option value="">--Pilih Jenis Intermediary--</option>
                                                                @foreach ($jenisIntermediaries as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" placeholder="Nama Proyek"
                                                                class="form-control @error('nama_proyek') is-invalid @enderror"
                                                                id="nama_proyek" name="inputs_proposal[0][nama_proyek]"
                                                                value="{{ old('nama_proyek') }}">
                                                            @error('nama_proyek')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <select class="form-select form-control" name="inputs_proposal[0][klasifikasi_portfolio_id]"
                                                                id="klasifikasi_portfolio_id">
                                                                <option value="">--Pilih Klasifikasi Portfolio--</option>
                                                                @foreach ($klasifikasiPortfolios as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-select form-control"
                                                                name="inputs_proposal[0][impact_goals_id][]"
                                                                id="impact_goals_id" multiple>
                                                                <option value="">--Pilih Impact Goals--</option>
                                                                @foreach ($impactGoals as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" placeholder="Estimasi Nilai USD"
                                                                class="form-control @error('estimasi_nilai_usd') is-invalid @enderror"
                                                                id="estimasi_nilai_usd" name="inputs_proposal[0][estimasi_nilai_usd]"
                                                                value="{{ old('estimasi_nilai_usd') }}">
                                                            @error('estimasi_nilai_usd')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" placeholder="Estimasi Nilai IDR"
                                                                class="form-control @error('estimasi_nilai_idr') is-invalid @enderror"
                                                                id="estimasi_nilai_idr" name="inputs_proposal[0][estimasi_nilai_idr]"
                                                                value="{{ old('estimasi_nilai_idr') }}">
                                                            @error('estimasi_nilai_idr')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" placeholder="Usulan Durasi"
                                                                class="form-control @error('usulan_durasi') is-invalid @enderror"
                                                                id="usulan_durasi" name="inputs_proposal[0][usulan_durasi]"
                                                                value="{{ old('usulan_durasi') }}">
                                                            @error('usulan_durasi')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <select class="form-select form-control" name="inputs_proposal[0][status_kemajuan_id]"
                                                                id="status_kemajuan_id">
                                                                <option value="">--Pilih Status Kemajuan--</option>
                                                                @foreach ($statusKemajuan as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="file" class="form-control" id="dokumen_proposal"
                                                                name="inputs_proposal[0][dokumen_proposal]" onchange="validateFile()">
                                                            <small class="text-muted">File harus berupa gambar (jpg, jpeg, png, gif)
                                                                atau PDF.</small>
                                                            <span id="file-error" class="text-danger"></span>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block">
                                                                <a class="btn btn-danger btn-circle" id="delete-btn-row-proposal" title="Delete">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    {{-- @endfor --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ url('donor') }}" class="btn btn-outline-primary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>


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
        <div class="modal fade text-black" id="logoutModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-semibold" id="exampleModalLabel">Logout Account</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body fw-light">Are you sure you want to logout? Once you logout you need to login
                        again.</div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-primary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ url('logout') }}">Yes, Logout!</a>
                    </div>
                </div>
            </div>
        </div>


        {{-- Custom Js --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        {{-- Custom Javascript --}}
        <script>
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // MENAMPILKAN KABUPATEN DARI PROVINSI YG DIPILIH
                $(function() {
                    $('#provinsi_id').on('change', function() {
                        let id_provinsi = $('#provinsi_id').val();

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('getkabupaten') }}",
                            data: {
                                id_provinsi: id_provinsi
                            },
                            cache: false,

                            success: function(msg) {
                                $('#kabupaten_id').html(msg);
                                $('#kecamatan_id').html('');
                                $('#desa_id').html('');
                            },
                            error: function(data) {
                                console.log('error:', data)
                            },
                        })
                    })
                })


                // MENAMPILKAN KECAMATAN DARI KABUPATEN YG DIPILIH
                $(function() {
                    $('#kabupaten_id').on('change', function() {
                        let id_kabupaten = $('#kabupaten_id').val();


                        $.ajax({
                            type: 'POST',
                            url: "{{ route('getkecamatan') }}",
                            data: {
                                id_kabupaten: id_kabupaten
                            },
                            cache: false,

                            success: function(msg) {
                                $('#kecamatan_id').html(msg);
                                // $('#kecamatan').html('');
                                $('#desa_id').html('');
                            },
                            error: function(data) {
                                console.log('error:', data)
                            },
                        })
                    })
                })


                // MENAMPILKAN KECAMATAN DARI KECAMATAN YG DIPILIH
                $(function() {
                    $('#kecamatan_id').on('change', function() {
                        let id_kecamatan = $('#kecamatan_id').val();


                        $.ajax({
                            type: 'POST',
                            url: "{{ route('getdesa') }}",
                            data: {
                                id_kecamatan: id_kecamatan
                            },
                            cache: false,

                            success: function(msg) {
                                $('#desa_id').html(msg);
                                // $('#kecamatan').html('');
                                // $('#desa').html('');
                            },
                            error: function(data) {
                                console.log('error:', data)
                            },
                        })
                    })
                })

            });
        </script>

        <script id="statusIDs" type="application/json">
            {!! json_encode($status) !!}
        </script>

        <script id="saluranIDs" type="application/json">
            {!! json_encode($saluran) !!}
        </script>

        <script id="jenjangkomunikasiIDs" type="application/json">
            {!! json_encode($jenjangKomunikasi) !!}
        </script>

        <script id="tindaklanjutIDs" type="application/json">
            {!! json_encode($tindakLanjut) !!}
        </script>

        <script id="tujuanpendanaanIDs" type="application/json">
            {!! json_encode($tujuanPendanaan) !!}
        </script>

        <script id="jenispenerimaanIDs" type="application/json">
            {!! json_encode($jenisPenerimaan) !!}
        </script>

        <script id="saluranpendanaanIDs" type="application/json">
            {!! json_encode($saluranPendanaan) !!}
        </script>

        <script id="jenisintermediaryIDs" type="application/json">
            {!! json_encode($jenisIntermediaries) !!}
        </script>

        <script id="klasifikasiportfolioIDs" type="application/json">
            {!! json_encode($klasifikasiPortfolios) !!}
        </script>

        <script id="impactgoalsIDs" type="application/json">
            {!! json_encode($impactGoals) !!}
        </script>

        <script id="statuskemajuanIDs" type="application/json">
            {!! json_encode($statusKemajuan) !!}
        </script>

        <script>
        var statusIDs = JSON.parse(document.getElementById("statusIDs").textContent);
        var saluranIDs = JSON.parse(document.getElementById("saluranIDs").textContent);
        var jenjangkomunikasiIDs = JSON.parse(document.getElementById("jenjangkomunikasiIDs").textContent);
        var tindaklanjutIDs = JSON.parse(document.getElementById("tindaklanjutIDs").textContent);
        var tujuanpendanaanIDs = JSON.parse(document.getElementById("tujuanpendanaanIDs").textContent);
        var jenispenerimaanIDs = JSON.parse(document.getElementById("jenispenerimaanIDs").textContent);
        var saluranpendanaanIDs = JSON.parse(document.getElementById("saluranpendanaanIDs").textContent);
        var jenisintermediaryIDs = JSON.parse(document.getElementById("jenisintermediaryIDs").textContent);
        var klasifikasiportfolioIDs = JSON.parse(document.getElementById("klasifikasiportfolioIDs").textContent);
        var impactgoalsIDs = JSON.parse(document.getElementById("impactgoalsIDs").textContent);
        var statuskemajuanIDs = JSON.parse(document.getElementById("statuskemajuanIDs").textContent);

        function addBlankRowNarahubung() {
            var tableBodyNarahubung = document.getElementById("table-narahubung");
            var newRowNarahubung = document.createElement("tr");
            var i = tableBodyNarahubung.children.length;
            newRowNarahubung.innerHTML = `
                                <td>
                                    <input type="text" placeholder="Nama Kontak" class="form-control" name="inputs_narahubung[${i}][nama_kontak]">
                                </td>
                                <td>
                                    <input type="text" placeholder="Jabatan" class="form-control" name="inputs_narahubung[${i}][jabatan]">
                                </td>
                                <td>
                                    <input type="email" placeholder="Email" class="form-control" name="inputs_narahubung[${i}][email]">
                                </td>
                                <td>
                                    <input type="tel" placeholder="No Telepon" class="form-control" name="inputs_narahubung[${i}][no_telp]">
                                </td>
                                <td>
                                    <select class="form-select" name="inputs_narahubung[${i}][status_id]">
                                    <option value="">--Pilih Status--</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="d-inline-block">
                                        <a class="btn btn-danger btn-circle" id="delete-btn-row-narahubung" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
            `;

            var statusSelect = newRowNarahubung.querySelector(`select[name='inputs_narahubung[${i}][status_id]']`);
            statusIDs.forEach(function(status) {
                var option = document.createElement('option');
                option.value = status.id;
                option.text = status.name;
                statusSelect.appendChild(option);
            });

            tableBodyNarahubung.appendChild(newRowNarahubung);
            newRowNarahubung.querySelector("#delete-btn-row-narahubung").addEventListener("click", deleteRow);
        }

        function addBlankRowKomunikasi() {
            var tableBodyKomunikasi = document.getElementById("table-komunikasi");
            var newRowKomunikasi = document.createElement("tr");
            var i = tableBodyKomunikasi.children.length;
            newRowKomunikasi.innerHTML = `
                                    <td>
                                        <input type="date" placeholder="Tanggal" class="form-control" id="tanggal" name="inputs_komunikasi[${i}][tanggal]" value="{{ old('tanggal') }}">
                                    </td>
                                    <td>
                                        <select class="form-select form-control" name="inputs_komunikasi[${i}][saluran_id]" id="saluran_id">
                                        <option value="">--Pilih Saluran--</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select form-control" name="inputs_komunikasi[${i}][jenjang_komunikasi_id]" id="jenjang_komunikasi_id">
                                        <option value="">--Pilih Jenjang Komunikasi--</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select form-control" name="inputs_komunikasi[${i}][tindak_lanjut_id]" id="tindak_lanjut_id">
                                        <option value="">--Pilih Tindak Lanjut--</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea type="text" placeholder="Catatan" class="form-control" id="catatan" name="inputs_komunikasi[${i}][catatan]" value="{{ old('catatan') }}"></textarea>
                                    </td>
                                    <td>
                                        <input type="date" placeholder="Tanggal Selanjutnya" class="form-control" id="tgl_selanjutnya" name="inputs_komunikasi[${i}][tgl_selanjutnya]" value="{{ old('tgl_selanjutnya') }}">
                                    </td>
                                    <td>
                                        <input type="file" class="form-control" id="dokumen_komunikasi" name="inputs_komunikasi[${i}][dokumen_komunikasi]" onchange="validateFile()">
                                        <small class="text-muted">File harus berupa gambar (jpg, jpeg, png, gif) atau PDF.</small>
                                        <span id="file-error" class="text-danger"></span>
                                    </td>
                                    <td>
                                        <div class="d-inline-block">
                                            <a class="btn btn-danger btn-circle" id="delete-btn-row-komunikasi" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
            `;

            var saluranSelect = newRowKomunikasi.querySelector(`select[name='inputs_komunikasi[${i}][saluran_id]']`);
            saluranIDs.forEach(function(saluran) {
                var option = document.createElement('option');
                option.value = saluran.id;
                option.text = saluran.name;
                saluranSelect.appendChild(option);
            });

            var jenjangkomunikasiSelect = newRowKomunikasi.querySelector(`select[name='inputs_komunikasi[${i}][jenjang_komunikasi_id]']`);
            jenjangkomunikasiIDs.forEach(function(jenjang_komunikasi) {
                var option = document.createElement('option');
                option.value = jenjang_komunikasi.id;
                option.text = jenjang_komunikasi.name;
                jenjangkomunikasiSelect.appendChild(option);
            });

            var tindaklanjutSelect = newRowKomunikasi.querySelector(`select[name='inputs_komunikasi[${i}][tindak_lanjut_id]']`);
            tindaklanjutIDs.forEach(function(tindak_lanjut) {
                var option = document.createElement('option');
                option.value = tindak_lanjut.id;
                option.text = tindak_lanjut.name;
                tindaklanjutSelect.appendChild(option);
            });

            tableBodyKomunikasi.appendChild(newRowKomunikasi);
            newRowKomunikasi.querySelector("#delete-btn-row-komunikasi").addEventListener("click", deleteRow);
        }

        function addBlankRowProposal() {
            var tableBodyProposal = document.getElementById("table-proposal");
            var newRowProposal = document.createElement("tr");
            var i = tableBodyProposal.children.length;
            newRowProposal.innerHTML = `
                                    <td>
                                        <select class="form-select form-control" name="inputs_proposal[${i}][tujuan_pendanaan_id]" id="tujuan_pendanaan_id">
                                        <option value="">--Pilih Tujuan Pendanaan--</option></select>
                                    </td>
                                    <td>
                                        <select class="form-select form-control" name="inputs_proposal[${i}][jenis_penerimaan_id]" id="jenis_penerimaan_id">
                                        <option value="">--Pilih Jenis Penerimaan--</option></select>
                                    </td>
                                    <td>
                                        <select class="form-select form-control" name="inputs_proposal[${i}][saluran_pendanaan_id]" id="saluran_pendanaan_id">
                                        <option value="">--Pilih Saluran Pendanaan--</option></select>
                                    </td>
                                    <td>
                                        <select class="form-select form-control" name="inputs_proposal[${i}][jenis_intermediaries_id]" id="jenis_intermediaries_id">
                                        <option value="">--Pilih Jenis Intermediary--</option></select>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="Nama Proyek" class="form-control" id="nama_proyek" name="inputs_proposal[${i}][nama_proyek]" value="{{ old('nama_proyek') }}">
                                    </td>
                                    <td>
                                        <select class="form-select form-control" name="inputs_proposal[${i}][klasifikasi_portfolio_id]" id="klasifikasi_portfolio_id">
                                        <option value="">--Pilih Klasifikasi Portfolio--</option></select>
                                    </td>
                                    <td>
                                        <select class="impact-goals-select-grid form-select form-control" name="inputs_proposal[${i}][impact_goals_id][]" id="impact_goals_id_${i}" multiple>
                                            <option value="">--Pilih Impact Goals--</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="Estimasi Nilai USD" class="form-control" id="estimasi_nilai_usd" name="inputs_proposal[${i}][estimasi_nilai_usd]"
                                        value="{{ old('estimasi_nilai_usd') }}">
                                    </td>
                                    <td>
                                        <input type="text" placeholder="Estimasi Nilai IDR" class="form-control" id="estimasi_nilai_idr" name="inputs_proposal[${i}][estimasi_nilai_idr]"
                                        value="{{ old('estimasi_nilai_idr') }}">
                                    </td>
                                    <td>
                                        <input type="text" placeholder="Usulan Durasi"class="form-control" id="usulan_durasi" name="inputs_proposal[${i}][usulan_durasi]"
                                        value="{{ old('usulan_durasi') }}">
                                    </td>
                                    <td>
                                        <select class="form-select form-control" name="inputs_proposal[${i}][status_kemajuan_id]" id="status_kemajuan_id">
                                        <option value="">--Pilih Status Kemajuan--</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="file" class="form-control" id="dokumen_proposal" name="inputs_proposal[${i}][dokumen_proposal]" onchange="validateFile()">
                                        <small class="text-muted">File harus berupa gambar (jpg, jpeg, png, gif) atau PDF.</small>
                                        <span id="file-error" class="text-danger"></span>
                                    </td>
                                    <td>
                                        <div class="d-inline-block">
                                        <a class="btn btn-danger btn-circle" id="delete-btn-row-proposal" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        </div>
                                    </td>
            `;

            var tujuanpendanaanSelect = newRowProposal.querySelector(`select[name='inputs_proposal[${i}][tujuan_pendanaan_id]']`);
            tujuanpendanaanIDs.forEach(function(tujuan_pendanaan) {
                var option = document.createElement('option');
                option.value = tujuan_pendanaan.id;
                option.text = tujuan_pendanaan.name;
                tujuanpendanaanSelect.appendChild(option);
            });

            var jenispenerimaanSelect = newRowProposal.querySelector(`select[name='inputs_proposal[${i}][jenis_penerimaan_id]']`);
            jenispenerimaanIDs.forEach(function(jenis_penerimaan) {
                var option = document.createElement('option');
                option.value = jenis_penerimaan.id;
                option.text = jenis_penerimaan.name;
                jenispenerimaanSelect.appendChild(option);
            });

            var saluranpendanaanSelect = newRowProposal.querySelector(`select[name='inputs_proposal[${i}][saluran_pendanaan_id]']`);
            saluranpendanaanIDs.forEach(function(saluran_pendanaan) {
                var option = document.createElement('option');
                option.value = saluran_pendanaan.id;
                option.text = saluran_pendanaan.name;
                saluranpendanaanSelect.appendChild(option);
            });

            var jenisintermediarySelect = newRowProposal.querySelector(`select[name='inputs_proposal[${i}][jenis_intermediaries_id]']`);
            jenisintermediaryIDs.forEach(function(jenis_intermediary) {
                var option = document.createElement('option');
                option.value = jenis_intermediary.id;
                option.text = jenis_intermediary.name;
                jenisintermediarySelect.appendChild(option);
            });

            var klasifikasiportfolioSelect = newRowProposal.querySelector(`select[name='inputs_proposal[${i}][klasifikasi_portfolio_id]']`);
            klasifikasiportfolioIDs.forEach(function(klasifikasi_portfolio) {
                var option = document.createElement('option');
                option.value = klasifikasi_portfolio.id;
                option.text = klasifikasi_portfolio.name;
                klasifikasiportfolioSelect.appendChild(option);
            });

            var impactgoalsSelect = newRowProposal.querySelector(`select[name='inputs_proposal[${i}][impact_goals_id][]']`);
            impactgoalsIDs.forEach(function(impact_goals) {
                var option = document.createElement('option');
                option.value = impact_goals.id;
                option.text = impact_goals.name;
                impactgoalsSelect.appendChild(option);
            });
            // $(impactgoalsSelect).select2();

            var statuskemajuanSelect = newRowProposal.querySelector(`select[name='inputs_proposal[${i}][status_kemajuan_id]']`);
            statuskemajuanIDs.forEach(function(status_kemajuan) {
                var option = document.createElement('option');
                option.value = status_kemajuan.id;
                option.text = status_kemajuan.name;
                statuskemajuanSelect.appendChild(option);
            });

            tableBodyProposal.appendChild(newRowProposal);
            newRowProposal.querySelector("#delete-btn-row-proposal").addEventListener("click", deleteRow);
        }

        function deleteRow(event) {
            var deleteButton = event.target;
            var rowToDelete = deleteButton.closest("tr");
            if (rowToDelete) {
                rowToDelete.remove();
            }
        }

        document.getElementById("btn-blank-row-narahubung").addEventListener("click", function (event) {
            event.preventDefault();
            addBlankRowNarahubung();
        });

        document.getElementById("btn-blank-row-komunikasi").addEventListener("click", function (event) {
            event.preventDefault();
            addBlankRowKomunikasi();
        });

        document.getElementById("btn-blank-row-proposal").addEventListener("click", function (event) {
            event.preventDefault();
            addBlankRowProposal();
        });

        document.getElementById("delete-btn-row-narahubung").addEventListener("click", function (event) {
            deleteRow(event);
        });

        document.getElementById("delete-btn-row-komunikasi").addEventListener("click", function (event) {
            deleteRow(event);
        });

        document.getElementById("delete-btn-row-proposal").addEventListener("click", function (event) {
            deleteRow(event);
        });

        </script>

        @include('layouts.template')
</body>

</html>
