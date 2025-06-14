<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('style/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('style/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css_2/style.css') }}">

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


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
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
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
                        <i class="fa fa-bars" style="color: #e74a3b;"></i>
                    </button>

                    {{-- <!-- Topbar Search -->
                    <form method="GET" action="{{ url('impact_goals/cari') }}"
                     class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group shadow-sm rounded">
                            <input type="text" name="cari" class="form-control bg-light border-0 small" placeholder="Search for..."
                            value="{{ old('cari') }}"
                            aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-light" title="Search">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        {{-- Search --}}
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw" style="color: #858796;"></i>
                            </a>
                            <!-- Dropdown - Search -->
                            {{-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form method="GET" action="{{ url('impact_goals/cari') }}"
                                    class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group shadow-sm rounded">
                                        <input type="text" name="cari" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search" value="{{ old('cari') }}"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" title="Search">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </li>

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
                    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Report</h1>
                    </div> --}}

                    <div class="row">
                        {{-- DONOR --}}
                        <div class="mb-4">
                            <div class="card shadow">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-danger">Generate Report</h6>
                                </div>
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
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="m-0 font-weight-bold text-danger"></h6>
                                                <a href="{{ url('downloadpdf-donor') }}" class="btn btn-primary me-2"
                                                    data-bs-toggle="tooltip" title="Download All">Export Pdf</a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Organisasi</th>
                                                            <th>Alamat</th>
                                                            <th>Negara</th>
                                                            <th>Provinsi</th>
                                                            <th>Kabupaten</th>
                                                            <th>Kecamatan</th>
                                                            <th>Desa</th>
                                                            <th>Website</th>
                                                            <th>Informasi Singkat</th>
                                                            <th>Jenis Organisasi</th>
                                                            <th>Komitmen SDGs</th>
                                                            <th>Tanggal</th>
                                                            <th>Dokumen</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($donor as $item)
                                                            <tr>
                                                                <td scope="row" class="fw-bold"
                                                                    style="text-align: center">
                                                                    {{ $loop->iteration }}</td>
                                                                <td>{{ $item->nama_organisasi }}</td>
                                                                <td>{{ $item->alamat }}</td>
                                                                <td>{{ $item->negara }}</td>
                                                                <td>{{ $item->provinsi->name }}</td>
                                                                <td>{{ $item->kabupaten->name }}</td>
                                                                <td>{{ $item->kecamatan->name }}</td>
                                                                <td>{{ $item->desa->name }}</td>
                                                                <td>{{ $item->website }}</td>
                                                                <td>{{ $item->informasi_singkat }}</td>
                                                                <td>{{ $item->jenisOrganisasi->name }}</td>
                                                                @php $komitSdgs = json_decode($item->komitmen_sdgs); @endphp
                                                                <td>
                                                                    @foreach ($komitSdgs as $komit_sdgs)
                                                                        {{ \App\Models\TabelKomitmenSdg::find($komit_sdgs)->name }}
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                                <td>{{ $item->date }}</td>
                                                                <td>
                                                                    @if ($item->dokumen_donor)
                                                                        {{ basename($item->dokumen_donor) }}
                                                                    @else
                                                                        Tidak ada dokumen
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="d-inline-block">
                                                                        <a href="{{ url('downloadpdf/' . $item->id) }}"
                                                                            class="btn btn-outline-success btn-circle"
                                                                            data-bs-toggle="tooltip" title="Download">
                                                                            <i class="fas fa-download fa-sm"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            @empty
                                                                <td colspan="15" class="text-center">Tidak ada
                                                                    data...
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="footer-table">
                                                {{ $donor->links('vendor.pagination.bootstrap-5') }}
                                            </div>
                                        </div>

                                        {{-- NARAHUBUNG --}}
                                        <div class="tab-pane fade " id="narahubung-justified" role="tabpanel"
                                            aria-labelledby="narahubung-tab">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="m-0 font-weight-bold text-danger"></h6>
                                                <a href="{{ url('downloadpdf-narahubung') }}" class="btn btn-primary me-2"
                                                    data-bs-toggle="tooltip" title="Download All">Export Pdf</a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr class="text-center fw-bold">
                                                            <th>No</th>
                                                            <th>Donor ID</th>
                                                            <th>Nama Kontak</th>
                                                            <th>Jabatan</th>
                                                            <th>Email</th>
                                                            <th>No Telepon</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($narahubungs as $item)
                                                            <tr>
                                                                <td scope="row" class="fw-bold"
                                                                    style="text-align: center">
                                                                    {{ $loop->iteration }}</td>
                                                                <td>{{ $item->donorID->nama_organisasi }}</td>
                                                                <td>{{ $item->nama_kontak }}</td>
                                                                <td>{{ $item->jabatan }}</td>
                                                                <td>{{ $item->email }}</td>
                                                                <td>{{ $item->no_telp }}</td>
                                                                <td>{{ $item->status->name }}</td>
                                                            @empty
                                                                <td colspan="10" class="text-center">Tidak ada
                                                                    data...</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="footer-table">
                                                {{ $narahubungs->links('vendor.pagination.bootstrap-5') }}
                                            </div>
                                        </div>

                                        {{-- KOMUNIKASI --}}
                                        <div class="tab-pane fade" id="komunikasi-justified" role="tabpanel"
                                            aria-labelledby="komunikasi-tab">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="m-0 font-weight-bold text-danger"></h6>
                                                <a href="{{ url('downloadpdf-komunikasi') }}" class="btn btn-primary me-2"
                                                    data-bs-toggle="tooltip" title="Download All">Export Pdf</a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr class="text-center fw-bold">
                                                            <th>No</th>
                                                            <th>Donor ID</th>
                                                            <th>Tanggal</th>
                                                            <th>Saluran</th>
                                                            <th>Jenjang Komunikasi</th>
                                                            <th>Tindak Lanjut</th>
                                                            <th>Catatan</th>
                                                            <th>Tanggal Selanjutnya</th>
                                                            <th>Dokumen</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($komunikasis as $item)
                                                            <tr>
                                                                <td scope="row" class="fw-bold"
                                                                    style="text-align: center">
                                                                    {{ $loop->iteration }}</td>
                                                                <td>{{ $item->donorID->nama_organisasi }}</td>
                                                                <td>{{ $item->tanggal }}</td>
                                                                <td>{{ $item->saluran->name }}</td>
                                                                <td>{{ $item->jenjangKomunikasi->name }}</td>
                                                                <td>{{ $item->tindakLanjut->name }}</td>
                                                                <td>{{ $item->catatan }}</td>
                                                                <td>{{ $item->tgl_selanjutnya }}</td>
                                                                <td>
                                                                    @if ($item->dokumen_komunikasi)
                                                                        {{ basename($item->dokumen_komunikasi) }}
                                                                    @else
                                                                        Tidak ada dokumen
                                                                    @endif
                                                                </td>
                                                            @empty
                                                                <td colspan="10" class="text-center">Tidak ada
                                                                    data...</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="footer-table">
                                                {{ $komunikasis->links('vendor.pagination.bootstrap-5') }}
                                            </div>
                                        </div>

                                        {{-- PROPOSAL --}}
                                        <div class="tab-pane fade " id="proposal-justified" role="tabpanel"
                                            aria-labelledby="proposal-tab">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="m-0 font-weight-bold text-danger"></h6>
                                                <a href="{{ url('downloadpdf-proposal') }}" class="btn btn-primary me-2"
                                                    data-bs-toggle="tooltip" title="Download All">Export Pdf</a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr class="text-center fw-bold">
                                                            <th>No</th>
                                                            <th>Donor ID</th>
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
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($proposals as $item)
                                                            <tr>
                                                                <td scope="row" class="fw-bold"
                                                                    style="text-align: center">
                                                                    {{ $loop->iteration }}</td>
                                                                <td>{{ $item->donorID->nama_organisasi }}</td>
                                                                <td>{{ $item->tujuanPendanaan->name }}</td>
                                                                <td>{{ $item->jenisPenerimaan->name }}</td>
                                                                <td>{{ $item->saluranPendanaan->name }}</td>
                                                                <td>{{ $item->jenisIntermediaries->name }}</td>
                                                                <td>{{ $item->nama_proyek }}</td>
                                                                <td>{{ $item->klasifikasiPortfolios->name }}</td>
                                                                <!-- Mengubah JSON impact_goals_id menjadi array -->
                                                                @php $impactGoalsIds = json_decode($item->impact_goals_id); @endphp
                                                                <!-- Mendapatkan nama impact goals berdasarkan id -->
                                                                <td>
                                                                    @foreach ($impactGoalsIds as $impactGoalId)
                                                                        {{ \App\Models\TabelImpactGoals::find($impactGoalId)->name }}
                                                                        <!-- Tambahkan pemisah antara nama impact goals jika diperlukan -->
                                                                        @if (!$loop->last)
                                                                            ,
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                                {{-- <td>{{ $item->impactGoals->name }}</td> --}}
                                                                <td>{{ $item->estimasi_nilai_usd }}</td>
                                                                <td>{{ $item->estimasi_nilai_idr }}</td>
                                                                <td>{{ $item->usulan_durasi }}</td>
                                                                <td>{{ $item->statusKemajuan->name }}</td>
                                                                <td>
                                                                    @if ($item->dokumen_proposal)
                                                                        {{ basename($item->dokumen_proposal) }}
                                                                    @else
                                                                        Tidak ada dokumen
                                                                    @endif
                                                                </td>
                                                            @empty
                                                                <td colspan="15" class="text-center">Tidak ada data...</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="footer-table">
                                                {{ $proposals->links('vendor.pagination.bootstrap-5') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>

                        {{-- NARAHUBUNG --}}

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

    @include('layouts.template')

    <!-- Icons library -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>

</body>


</html>
