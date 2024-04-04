<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
    <link rel="stylesheet" href="{{ asset('css_2/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css_2/app.css') }}">

    <style>
        #dash-count .icon-container {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #dash-count .icon-container i {
            font-size: 2em;
        }
    </style>

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

                    <!-- Topbar Search -->
                    <form
                     class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group shadow-sm rounded">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-light" type="submit" title="Search">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>


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
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group shadow-sm rounded">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="submit" title="Search">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                    <!-- Sale & Revenue Start -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4" id="dash-count">
                            <div
                                class="shadow h-100 py-2 bg-white rounded d-flex align-items-center justify-content-between p-4">
                                <div class="icon-container bg-gradient-danger rounded-circle shadow">
                                    <i data-feather="bar-chart-2" aria-hidden="true" style="color: white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Total Donor</p>
                                    <h6 class="mb-0">{{ $donor }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4" id="dash-count">
                            <div
                                class="shadow h-100 py-2 bg-white rounded d-flex align-items-center justify-content-between p-4">
                                <div class="icon-container bg-gradient-warning rounded-circle shadow">
                                    <i data-feather="users" aria-hidden="true" style="color: white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Total Narahubung</p>
                                    <h6 class="mb-0">{{ $narahubung }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4" id="dash-count">
                            <div
                                class="shadow h-100 py-2 bg-white rounded d-flex align-items-center justify-content-between p-4">
                                <div class="icon-container bg-gradient-info rounded-circle shadow">
                                    <i data-feather="phone-call" aria-hidden="true" style="color: white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Total Komunikasi</p>
                                    <h6 class="mb-0">{{ $komunikasi }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4" id="dash-count">
                            <div
                                class="shadow h-100 py-2 bg-white rounded d-flex align-items-center justify-content-between p-4">
                                <div class="icon-container bg-gradient-success rounded-circle shadow">
                                    <i data-feather="file-text" aria-hidden="true" style="color: white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Total Proposal</p>
                                    <h6 class="mb-0">{{ $proposal }}</h6>
                                </div>
                            </div>
                        </div>


                        <!-- Sale & Revenue End -->


                        <!-- Content Column -->
                        <div class="col-xl-4 col-lg-5 mb-4">
                            <!-- Calender Card -->
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Calender</h6>
                                </div>
                                <div class="card-body">
                                    <div class="align-self-center w-100">
                                        <div class="chart">
                                            <div id="datetimepicker-dashboard"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Schedule Card -->
                        <div class="col-xl-8 col-lg-7 mb-4">
                            <div class="card shadow" style="height: 455px; overflow: auto;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Schedule</h6>
                                </div>
                                <div class="card-body" style="overflow: auto;">
                                    <div class="align-self-center w-100">
                                        <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                                            <li class="nav-item flex-fill" role="presentation">
                                                <button class="nav-link w-100 active" id="approach-tab" data-bs-toggle="tab"
                                                    data-bs-target="#approach-justified" type="button" role="tab"
                                                    aria-controls="approach" aria-selected="true">Akan Datang</button>
                                            </li>
                                            <li class="nav-item flex-fill" role="presentation">
                                                <button class="nav-link w-100" id="past-tab" data-bs-toggle="tab"
                                                    data-bs-target="#past-justified" type="button" role="tab"
                                                    aria-controls="past" aria-selected="false">Terlewat</button>
                                            </li>
                                        </ul>

                                        <div class="tab-content pt-4" id="myTabjustifiedContent">
                                            {{-- Akan Datang --}}
                                            <div class="tab-pane fade show active" id="approach-justified" role="tabpanel"
                                                aria-labelledby="approach-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-hover my-0">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Komunikasi ID</th>
                                                                <th>Donor ID</th>
                                                                <th>Tanggal</th>
                                                                <th>Tanggal Selanjutnya</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($approach as $items)
                                                                <tr>
                                                                    <td scope="row" class="fw-bold">{{ $loop->iteration }}
                                                                    </td>
                                                                    <td>{{ $items->id }}</td>
                                                                    <td>{{ $items->donorID->nama_organisasi }}</td>
                                                                    <td>{{ $items->tanggal }}</td>
                                                                    <td id="ongoingkomunikasi">
                                                                        @php
                                                                            $firstTglSelanjutnya = $approach->first()->tgl_selanjutnya;
                                                                            $buttonClass = $items->tgl_selanjutnya == $firstTglSelanjutnya ? 'bg-warning pending' : '';
                                                                            $textColor = $items->tgl_selanjutnya == $firstTglSelanjutnya ? 'text-white' : 'text-black';
                                                                        @endphp
                                                                        <button class="status-button {{ $buttonClass }} {{ $textColor }}">
                                                                            {{ $items->tgl_selanjutnya }}
                                                                        </button>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-inline-block" id="action-btn">
                                                                            <a href="{{ url('komunikasi/' . $items->id) }}"
                                                                                class="btn btn-info detail-button"
                                                                                data-bs-toggle="tooltip" title="View">
                                                                                Detail
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                @empty
                                                                    <td colspan="6" class="text-center">Tidak ada jadwal terdekat...
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            {{-- Terlewat --}}
                                            <div class="tab-pane fade show" id="past-justified" role="tabpanel"
                                                aria-labelledby="past-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-hover my-0">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Komunikasi ID</th>
                                                                <th>Donor ID</th>
                                                                <th>Tanggal</th>
                                                                <th>Tanggal Selanjutnya</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($past as $pastitems)
                                                                <tr>
                                                                    <td scope="row" class="fw-bold">{{ $loop->iteration }}
                                                                    </td>
                                                                    <td>{{ $pastitems->id }}</td>
                                                                    <td>{{ $pastitems->donorID->nama_organisasi }}</td>
                                                                    <td>{{ $pastitems->tanggal }}</td>
                                                                    <td id="ongoingkomunikasi">
                                                                        @php
                                                                            $firstTglSelanjutnya = $past->first()->tgl_selanjutnya;
                                                                            $buttonClass = $pastitems->tgl_selanjutnya == $firstTglSelanjutnya ? '' : '';
                                                                            $textColor = $pastitems->tgl_selanjutnya == $firstTglSelanjutnya ? 'text-black' : 'text-black';
                                                                        @endphp
                                                                        <button class="status-button {{ $buttonClass }} {{ $textColor }}">
                                                                            {{ $pastitems->tgl_selanjutnya }}
                                                                        </button>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-inline-block" id="action-btn">
                                                                            <a href="{{ url('komunikasi/' . $pastitems->id) }}"
                                                                                class="btn btn-info detail-button"
                                                                                data-bs-toggle="tooltip" title="View">
                                                                                Detail
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                @empty
                                                                    <td colspan="6" class="text-center">Tidak ada jadwal terlewat...
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- History Card --}}
                        <div class="mb-4">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-danger">Proposal History</h6>
                                </div>
                                <div class="card-body">
                                    <div class="align-self-center w-100">
                                        <div class="table-responsive">
                                            <table class="table table-hover my-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Updated Time</th>
                                                        <th>Proposal ID</th>
                                                        <th>Donor ID</th>
                                                        <th>Nama Proyek</th>
                                                        <th>Status Kemajuan</th>
                                                        <th>Dokumen</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($update_proposal as $item)
                                                        <tr>
                                                            <td scope="row" class="fw-bold">{{ $loop->iteration }}
                                                            </td>
                                                            <td>{{ $item->updated_at }}</td>
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->donorID->nama_organisasi }}</td>
                                                            <td>{{ $item->nama_proyek }}</td>
                                                            <td id="statuskemajuanact">
                                                                @if ($item->statusKemajuan->name == 'Disetujui')
                                                                    <button
                                                                        class="status-button bg-success active">{{ $item->statusKemajuan->name }}</button>
                                                                @elseif ($item->statusKemajuan->name == 'Tidak dilanjutkan')
                                                                    <button
                                                                        class="status-button bg-danger pending">{{ $item->statusKemajuan->name }}</button>
                                                                @else
                                                                    <button
                                                                        class="status-button bg-warning inactive">{{ $item->statusKemajuan->name }}</button>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($item->dokumen_proposal)
                                                                    {{ basename($item->dokumen_proposal) }}
                                                                @else
                                                                    Tidak ada dokumen
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="d-inline-block" id="action-btn">
                                                                    <a href="{{ url('proposal/' . $item->id) }}"
                                                                        class="btn btn-info detail-button"
                                                                        data-bs-toggle="tooltip" title="View">
                                                                        Detail
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        @empty
                                                            <td colspan="5" class="text-center">Tidak ada data...
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    {{ $update_proposal->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
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

    <!-- Icons library -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>

    {{-- Custom Js --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ asset('js_2/app.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#datetimepicker-dashboard", {
                inline: true,
                prevArrow: "<span title=\"Previous month\">&laquo;</span>",
                nextArrow: "<span title=\"Next month\">&raquo;</span>",
                defaultDate: "today"
            });
        });
    </script>

    @include('layouts.template')

</body>


</html>
