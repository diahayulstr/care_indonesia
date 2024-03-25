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
    <link href="{{ asset('style/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('style/css/sb-admin-2.min.css')}}" rel="stylesheet">


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
                        <a class="collapse-item" href="{{ url('klasifikasi_portfolio') }}">Klasifikasi Portfolio</a>
                        <a class="collapse-item" href="{{ url('komitmen_sdgs') }}">Komitmen SDGs</a>
                        <a class="collapse-item" href="{{ url('saluran') }}">Saluran</a>
                        <a class="collapse-item" href="{{ url('saluran_pendanaan') }}">Saluran Pendanaan</a>
                        <a class="collapse-item" href="{{ url('status') }}">Status</a>
                        <a class="collapse-item" href="{{ url('status_kemajuan') }}">Status Kemajuan</a>
                        <a class="collapse-item" href="{{ url('tindak_lanjut') }}">Tindak Lanjut</a>
                        <a class="collapse-item" href="{{ url('tujuan_pendanaan') }}">Tujuan Pendanaan</a>
                        <a class="collapse-item" href="#">User</a>
                    </div>
                </div>
            </li>

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('style/img/user.png')}}">
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
                                <h6 class="m-0 font-weight-bold text-danger">Master/Detail Add</h6>
                            </div>
                        </div>
                        <form action="{{ url('master/add') }}" id="form-add-master" method="POST" enctype="multipart/form-data">
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
                                                            <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
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
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="komitmen_sdgs">Komitmen SDGs</label>
                                                    <select class="form-select form-control" name="komitmen_sdgs[]"
                                                        id="komitmen_sdgs" multiple>
                                                        <option value="">--Pilih--</option>
                                                        @foreach ($komitmenSdgs as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                        <div class="row">
                                            <div class="col-16">
                                                {{-- <input type="hidden" id="donor_id" name="donor_id"> --}}

                                                <div class="form-group">
                                                    <label for="nama_kontak">Nama Kontak</label>
                                                    <input type="text" placeholder="Nama Kontak"
                                                        class="form-control @error('nama_kontak') is-invalid @enderror"
                                                        id="nama_kontak" name="nama_kontak"
                                                        value="{{ old('nama_kontak') }}">
                                                    @error('nama_kontak')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jabatan">Jabatan</label>
                                                    <input type="text" placeholder="Jabatan"
                                                        class="form-control @error('jabatan') is-invalid @enderror"
                                                        id="jabatan" name="jabatan"
                                                        value="{{ old('jabatan') }}">
                                                    @error('jabatan')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jabatan">Email</label>
                                                    <input type="email" placeholder="Email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="email" name="email" value="{{ old('email') }}">
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_telp">No Telepon</label>
                                                    <input type="tel" placeholder="No Telepon"
                                                        class="form-control @error('no_telp') is-invalid @enderror"
                                                        id="no_telp" name="no_telp" value="{{ old('no_telp') }}">
                                                    @error('no_telp')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="status_id">Status</label>
                                                    <select class="form-select" name="status_id" id="status_id">
                                                        <option value="">--Pilih Status--</option>
                                                        @foreach ($status as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- KOMUNIKASI --}}
                                    <div class="tab-pane fade" id="komunikasi-justified" role="tabpanel"
                                        aria-labelledby="komunikasi-tab">
                                        <div class="row">
                                            <div class="col-16">
                                                {{-- <input type="hidden" id="donor_id_komunikasi" name="donor_id"> --}}
                                                {{-- <input type="hidden" name="donor_id" value="{{ $donorId }}"> --}}

                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <input type="date" placeholder="Tanggal"
                                                        class="form-control @error('tanggal') is-invalid @enderror"
                                                        id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                                                    @error('tanggal')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="saluran_id">Saluran</label>
                                                    <select class="form-select form-control" name="saluran_id"
                                                        id="saluran_id">
                                                        <option value="">--Pilih Saluran--</option>
                                                        @foreach ($saluran as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenjang_komunikasi_id">Jenjang Komunikasi</label>
                                                    <select class="form-select form-control"
                                                        name="jenjang_komunikasi_id" id="jenjang_komunikasi_id">
                                                        <option value="">--Pilih Jenjang Komunikasi--</option>
                                                        @foreach ($jenjangKomunikasi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tindak_lanjut_id">Tindak Lanjut</label>
                                                    <select class="form-select form-control" name="tindak_lanjut_id"
                                                        id="tindak_lanjut_id">
                                                        <option value="">--Pilih Tindak Lanjut--</option>
                                                        @foreach ($tindakLanjut as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="catatan">Catatan</label>
                                                    <textarea type="text" placeholder="Catatan" class="form-control @error('catatan') is-invalid @enderror"
                                                        id="catatan" name="catatan" value="{{ old('catatan') }}"></textarea>
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
                                                    <label for="dokumen_komunikasi" class="form-label">Dokumen</label>
                                                    <input type="file" class="form-control" id="dokumen_komunikasi"
                                                        name="dokumen_komunikasi" onchange="validateFile()">
                                                    <small class="text-muted">File harus berupa gambar (jpg, jpeg, png,
                                                        gif)
                                                        atau PDF.</small>
                                                    <span id="file-error-komunikasi" class="text-danger"></span>
                                                </div>
                                                <div id="filePreview-addMaster-komunikasi"></div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- PROPOSAL --}}
                                    <div class="tab-pane fade" id="proposal-justified" role="tabpanel"
                                        aria-labelledby="proposal-tab">
                                        <div class="row">
                                            <div class="col-16">
                                                {{-- <input type="hidden" id="donor_id_proposal" name="donor_id"> --}}
                                                {{-- <input type="hidden" name="donor_id" value="{{ $donorId }}"> --}}

                                                <div class="form-group">
                                                    <label for="tujuan_pendanaan_id">Tujuan Pendanaan</label>
                                                    <select class="form-select form-control"
                                                        name="tujuan_pendanaan_id" id="tujuan_pendanaan_id">
                                                        <option value="">--Pilih Tujuan Pendanaan--</option>
                                                        @foreach ($tujuanPendanaan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_penerimaan_id">Jenis Penerimaan</label>
                                                    <select class="form-select form-control"
                                                        name="jenis_penerimaan_id" id="jenis_penerimaan_id">
                                                        <option value="">--Pilih Jenis Penerimaan--</option>
                                                        @foreach ($jenisPenerimaan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="saluran_pendanaan_id">Saluran Pendanaan</label>
                                                    <select class="form-select form-control"
                                                        name="saluran_pendanaan_id" id="saluran_pendanaan_id">
                                                        <option value="">--Pilih Saluran Pendanaan--</option>
                                                        @foreach ($saluranPendanaan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_intermediaries_id">Jenis Intermediary</label>
                                                    <select class="form-select form-control"
                                                        name="jenis_intermediaries_id" id="jenis_intermediaries_id">
                                                        <option value="">--Pilih Jenis Intermediary--</option>
                                                        @foreach ($jenisIntermediaries as $item)
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
                                                    <select class="form-select form-control"
                                                        name="klasifikasi_portfolio_id" id="klasifikasi_portfolio_id">
                                                        <option value="">--Pilih Klasifikasi Portfolio--</option>
                                                        @foreach ($klasifikasiPortfolios as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="impact_goals_id">Impact Goals</label>
                                                    <select class="form-select form-control"
                                                        name="impact_goals_id[]" id="impact_goals_id" multiple>
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
                                                    <select class="form-select form-control" name="status_kemajuan_id"
                                                        id="status_kemajuan_id">
                                                        <option value="">--Pilih Status Kemajuan--</option>
                                                        @foreach ($statusKemajuan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="dokumen_proposal" class="form-label">Dokumen</label>
                                                    <input type="file" class="form-control" id="dokumen_proposal"
                                                        name="dokumen_proposal" onchange="validateFile()">
                                                    <small class="text-muted">File harus berupa gambar (jpg, jpeg, png,
                                                        gif)
                                                        atau PDF.</small>
                                                    <span id="file_error_proposal" class="text-danger"></span>
                                                </div>
                                                <div id="filePreview-addMaster-proposal"></div>
                                            </div>
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
                        <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
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

        @include('layouts.template')
</body>

</html>
