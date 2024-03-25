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
            <li class="nav-item active">
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
                                <h6 class="m-0 font-weight-bold text-danger">Proposal Edit</h6>
                            </div>
                        </div>
                        <form id="form-edit-proposal" action="{{ route('proposal.update', ['proposal' => $proposal->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-16">
                                        <div class="form-group">
                                            <label for="donor_id">Donor ID</label>
                                            <select class="form-select form-control" name="donor_id" id="donor_id">
                                                <option value="">--Pilih Donor ID--</option>
                                                @foreach ($donorID as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == old('donor_id', $proposal->donor_id) ? 'selected' : '' }}>
                                                        {{ $item->nama_organisasi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tujuan_pendanaan_id">Tujuan Pendanaan</label>
                                            <select class="form-select form-control" name="tujuan_pendanaan_id"
                                                id="tujuan_pendanaan_id">
                                                <option value="">--Pilih Tujuan Pendanaan--</option>
                                                @foreach ($tujuanPendanaan as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == old('tujuan_pendanaan_id', $proposal->tujuan_pendanaan_id) ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_penerimaan_id">Jenis Penerimaan</label>
                                            <select class="form-select form-control" name="jenis_penerimaan_id"
                                                id="jenis_penerimaan_id">
                                                <option value="">--Pilih Jenis Penerimaan--</option>
                                                @foreach ($jenisPenerimaan as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == old('jenis_penerimaan_id', $proposal->jenis_penerimaan_id) ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="saluran_pendanaan_id">Saluran Pendanaan</label>
                                            <select class="form-select form-control" name="saluran_pendanaan_id"
                                                id="saluran_pendanaan_id">
                                                <option value="">--Pilih Saluran Pendanaan--</option>
                                                @foreach ($saluranPendanaan as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == old('saluran_pendanaan_id', $proposal->saluran_pendanaan_id) ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_intermediaries_id">Jenis Intermediary</label>
                                            <select class="form-select form-control" name="jenis_intermediaries_id"
                                                id="jenis_intermediaries_id">
                                                <option value="">--Pilih Jenis Intermediary--</option>
                                                @foreach ($jenisIntermediaries as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == old('jenis_intermediaries_id', $proposal->jenis_intermediaries_id) ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_intermediaries_id">Jenis Intermediary</label>
                                            <select class="form-select form-control" name="jenis_intermediaries_id"
                                                id="jenis_intermediaries_id">
                                                <option value="">--Pilih Jenis Intermediary--</option>
                                                @foreach ($jenisIntermediaries as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == old('jenis_intermediaries_id', $proposal->jenis_intermediaries_id) ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_proyek">Nama Proyek</label>
                                            <input type="text" placeholder="Nama Proyek"
                                                class="form-control @error('nama_proyek') is-invalid @enderror"
                                                id="nama_proyek" name="nama_proyek"
                                                value="{{ old('nama_proyek') ?? $proposal->nama_proyek }}">
                                            @error('nama_proyek')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="klasifikasi_portfolio_id">Klasifikasi Portfolio</label>
                                            <select class="form-select form-control" name="klasifikasi_portfolio_id"
                                                id="klasifikasi_portfolio_id">
                                                <option value="">--Pilih Klasifikasi Portfolio--</option>
                                                @foreach ($klasifikasiPortfolios as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == old('klasifikasi_portfolio_id', $proposal->klasifikasi_portfolio_id) ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="impact_goals_id">Impact Goals</label>
                                            <select class="form-select form-control" name="impact_goals_id[]"
                                                id="impact_goals_id" multiple>
                                                <option value="">--Pilih Impact Goals--</option>
                                                @php $impactGoalsIds = json_decode($proposal->impact_goals_id); @endphp
                                                @foreach ($impactGoals as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ in_array($item->id, $impactGoalsIds) ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="estimasi_nilai_usd">Estimasi Nilai USD</label>
                                            <input type="text" placeholder="Estimasi Nilai USD"
                                                class="form-control @error('estimasi_nilai_usd') is-invalid @enderror"
                                                id="estimasi_nilai_usd" name="estimasi_nilai_usd"
                                                value="{{ old('estimasi_nilai_usd') ?? $proposal->estimasi_nilai_usd }}">
                                            @error('estimasi_nilai_usd')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="estimasi_nilai_idr">Estimasi Nilai IDR</label>
                                            <input type="text" placeholder="Estimasi Nilai IDR"
                                                class="form-control @error('estimasi_nilai_idr') is-invalid @enderror"
                                                id="estimasi_nilai_idr" name="estimasi_nilai_idr"
                                                value="{{ old('estimasi_nilai_idr') ?? $proposal->estimasi_nilai_usd }}">
                                            @error('estimasi_nilai_idr')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="usulan_durasi">Usulan Durasi</label>
                                            <input type="text" placeholder="Usulan Durasi"
                                                class="form-control @error('usulan_durasi') is-invalid @enderror"
                                                id="usulan_durasi" name="usulan_durasi"
                                                value="{{ old('usulan_durasi') ?? $proposal->usulan_durasi }}">
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
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == old('status_kemajuan_id', $proposal->status_kemajuan_id) ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="dokumen_proposal" class="form-label">Dokumen</label>
                                            <input type="file" class="form-control" id="dokumen_proposal"
                                                name="dokumen_proposal">
                                            <br>
                                            @if ($proposal->dokumen_proposal)
                                                <input type="text" class="form-control"
                                                    value="{{ basename($proposal->dokumen_proposal) }}" readonly>
                                            @else
                                                <p>Tidak ada dokumen</p>
                                            @endif
                                        </div>
                                        <div id="filePreview-edit-proposal"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ url('proposal') }}" class="btn btn-outline-primary">Cancel</a>
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
                    <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.template')
</body>

</html>
