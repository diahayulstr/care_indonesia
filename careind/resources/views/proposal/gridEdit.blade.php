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
                                <h6 class="m-0 font-weight-bold text-danger">Grid Add Proposal</h6>
                            </div>
                            <div>
                                @if (Auth::user()->role_id != 1)

                                @else
                                    <a href="#" class="btn btn-outline-danger btn-circle me-2 dash-button-add"
                                        id="btn-blank-row-proposal" data-bs-toggle="tooltip" title="Add Blank Row">
                                        <i class="fas fa-plus icon-prop"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <form action="{{ route('proposal.update_grid_proposal') }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="table_id">
                                        <thead>
                                            <tr class="text-center fw-bold">
                                                <th>Proposal ID</th>
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
                                                            name="inputs_proposal[{{ $proposals->id }}][id]"
                                                            value="{{ old('id') ?? $proposals->id }}"
                                                            readonly>
                                                        @error('id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <select class="form-select"
                                                            name="inputs_proposal[{{ $proposals->id }}][donor_id]"
                                                            id="donor_id_{{ $proposals->id }}">
                                                            <option value="">--Pilih Donor--</option>
                                                            @foreach ($donorID as $id_donor)
                                                                <option value="{{ $id_donor->id }}"
                                                                    {{ $id_donor->id == old('inputs_proposal.' . $proposals->id . '.donor_id', $proposals->donor_id) ? 'selected' : '' }}>
                                                                    {{ $id_donor->nama_organisasi }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('inputs_proposal.' . $proposals->id . '.donor_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <select class="form-select form-control"
                                                            name="inputs_proposal[{{ $proposals->id }}][tujuan_pendanaan_id]"
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
                                                            name="inputs_proposal[{{ $proposals->id }}][jenis_penerimaan_id]"
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
                                                            name="inputs_proposal[{{ $proposals->id }}][saluran_pendanaan_id]"
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
                                                            name="inputs_proposal[{{ $proposals->id }}][jenis_intermediaries_id]"
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
                                                            name="inputs_proposal[{{ $proposals->id }}][nama_proyek]"
                                                            value="{{ old('nama_proyek') ?? $proposals->nama_proyek }}">
                                                        @error('nama_proyek')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <select class="form-select form-control"
                                                            name="inputs_proposal[{{ $proposals->id }}][klasifikasi_portfolio_id]"
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
                                                            name="inputs_proposal[{{ $proposals->id }}][impact_goals_id][]"
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
                                                            name="inputs_proposal[{{ $proposals->id }}][estimasi_nilai_usd]"
                                                            value="{{ old('estimasi_nilai_usd') ?? $proposals->estimasi_nilai_usd }}">
                                                        @error('estimasi_nilai_usd')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="Estimasi Nilai IDR"
                                                            class="form-control @error('estimasi_nilai_idr') is-invalid @enderror"
                                                            id="estimasi_nilai_idr"
                                                            name="inputs_proposal[{{ $proposals->id }}][estimasi_nilai_idr]"
                                                            value="{{ old('estimasi_nilai_idr') ?? $proposals->estimasi_nilai_idr }}">
                                                        @error('estimasi_nilai_idr')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <input type="number" placeholder="Usulan Durasi"
                                                            class="form-control @error('usulan_durasi') is-invalid @enderror"
                                                            id="usulan_durasi"
                                                            name="inputs_proposal[{{ $proposals->id }}][usulan_durasi]"
                                                            value="{{ old('usulan_durasi') ?? $proposals->usulan_durasi }}">
                                                        @error('usulan_durasi')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        <select class="form-select form-control"
                                                            name="inputs_proposal[{{ $proposals->id }}][status_kemajuan_id]" id="status_kemajuan_id">
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
                                                            name="inputs_proposal[{{ $proposals->id }}][dokumen_proposal]">
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
                                                            <a class="btn btn-danger btn-circle delete-btn-proposal"
                                                                onclick="deleteGridEditProposal()"
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

    <form id="deleteFormGridEditProposal" action="{{ url('grid_edit/'.$proposals->id.'/proposal') }}" method="POST" style="display: none;">
        @method('DELETE')
        @csrf
    </form>

    @include('layouts.template')
</body>

</html>
