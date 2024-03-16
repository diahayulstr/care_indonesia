<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.template')

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
                                <h6 class="m-0 font-weight-bold text-danger">Donor</h6>
                            </div>
                            <div>
                                {{-- <a href="#" class="btn btn-icon-split split-icon-btn btn-danger rounded-pill">
                                    <span class="icon text-white">
                                      <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Add Master</span>
                                    <span class="divider"></span>

                                </a> --}}
                                <a href="{{ url('master/add') }}" class="btn btn-outline-primary btn-circle me-2" data-bs-toggle="tooltip" title="Master/Detail Add"><i class="fas fa-plus"></i></a>
                                <a href="{{url('donor/add')}}" class="btn btn-primary btn-circle me-2" data-bs-toggle="tooltip" title="Add"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id=>
                                    <thead>
                                        <tr class="text-center fw-bold">
                                            <th>Donor ID</th>
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
                                            <th colspan="5">Aksi</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>Donor_id</th>
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
                                    </tfoot> --}}
                                    <tbody>
                                        @forelse($donor as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
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

                                            <!-- Mengubah JSON impact_goals_id menjadi array -->
                                            @php $komitSdgs = json_decode($item->komitmen_sdgs); @endphp
                                            <!-- Mendapatkan nama impact goals berdasarkan id -->
                                            <td>
                                                @foreach ($komitSdgs as $komit_sdgs)
                                                    {{ \App\Models\TabelKomitmenSdg::find($komit_sdgs)->name }}
                                                    <!-- Tambahkan pemisah antara nama impact goals jika diperlukan -->
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $item->date }}</td>
                                            <td>@if ($item->dokumen)
                                                @php
                                                    $extension = pathinfo($item->dokumen, PATHINFO_EXTENSION);
                                                @endphp
                                                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                    <img src="{{url('')}}/{{$item->dokumen}}" alt="Pratinjau Gambar" style="max-width: 100px; max-height: 100px;">
                                                @elseif ($extension === 'pdf')
                                                    <embed src="{{url('')}}/{{$item->dokumen}}" type="application/pdf" width="200" height="200">
                                                @else
                                                    Tidak ada pratinjau
                                                @endif
                                            @else
                                                Tidak ada dokumen
                                            @endif</td>
                                            <td class="text-center">
                                                <div class="action-buttons d-flex justify-content-center">
                                                    <div class="d-inline-block">
                                                        <a href="{{ url('donor/'.$item->id)}}" class="btn btn-info btn-circle" data-bs-toggle="tooltip" title="View">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                    </div>
                                                    <div class="d-inline-block mx-1">
                                                        <a href="{{ url('donor/'.$item->id.'/edit')}}" class="btn btn-warning btn-circle" data-bs-toggle="tooltip" title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="d-inline-block mx-1">
                                                        <form action="{{ url('donor/'.$item->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger btn-circle delete-btn" data-confirm-delete="true" data-bs-toggle="tooltip" title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <div class="dropdown">
                                                            <button class="btn btn-success btn-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fas fa-project-diagram"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="{{ url('master/'.$item->id) }}">Master/Detail View</a></li>
                                                                <li><a class="dropdown-item" href="{{ url('master/'.$item->id.'/edit') }}">Master/Detail Edit</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            @empty
                                            <td colspan="15" class="text-center">Tidak ada data...</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{ $donor->links('vendor.pagination.bootstrap-5') }}
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
