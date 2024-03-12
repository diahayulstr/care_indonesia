<!DOCTYPE html>
<html lang="en">

<head>

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
                                <h6 class="m-0 font-weight-bold text-danger">Donor View</h6>
                            </div>
                            <div class="action-buttons d-flex justify-content-center">
                                <a href="{{ url('donor/add') }}" class="btn btn-primary btn-circle me-2"
                                    data-bs-toggle="tooltip" title="Add"><i class="fas fa-plus"></i></a>
                                <a href="{{ url('donor/' . $donor->id . '/edit') }}" class="btn btn-warning btn-circle"
                                    data-bs-toggle="tooltip" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                    </svg>
                                </a>
                                <form action="{{ url('donor/'. $donor->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-circle delete-btn" data-confirm-delete="true" data-bs-toggle="tooltip"
                                        title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Donor ID</th>
                                            <th>{{ $donor->id }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Nama Organisasi</th>
                                            <th>{{ $donor->nama_organisasi }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Alamat</th>
                                            <th>{{ $donor->alamat }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Provinsi</th>
                                            <th>{{ $donor->provinsi->name }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kabupaten</th>
                                            <th>{{ $donor->kabupaten->name }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kecamatan</th>
                                            <th>{{ $donor->kecamatan->name }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Desa</th>
                                            <th>{{ $donor->desa->name }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Website</th>
                                            <th>{{ $donor->website }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Informasi Singkat</th>
                                            <th>{{ $donor->informasi_singkat }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jenis Organisasi</th>
                                            <th>{{ $donor->jenisOrganisasi->name }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Komitmen SDGs</th>
                                            @php $komitSdgs = json_decode($donor->komitmen_sdgs); @endphp
                                            <th>
                                                @foreach ($komitSdgs as $komit_sdgs)
                                                    {{ \App\Models\TabelKomitmenSdg::find($komit_sdgs)->name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tanggal</th>
                                            <th>{{ $donor->date }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Dokumen</th>
                                            <th>
                                                @if ($donor->dokumen)
                                                    @php
                                                        $extension = pathinfo($donor->dokumen, PATHINFO_EXTENSION);
                                                    @endphp
                                                    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                        <img src="{{ url('') }}/{{ $donor->dokumen }}"
                                                            alt="Pratinjau Gambar"
                                                            style="max-width: 300px; max-height: 300px;">
                                                    @elseif ($extension === 'pdf')
                                                        <embed src="{{ url('') }}/{{ $donor->dokumen }}"
                                                            type="application/pdf" width="500" height="500">
                                                    @else
                                                        Tidak ada pratinjau
                                                    @endif
                                                @else
                                                    Tidak ada dokumen
                                                @endif
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
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
    @include('layouts.template')
</body>

</html>
