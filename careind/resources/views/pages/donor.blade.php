<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Care Indonesia</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('style/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('style/css/sb-admin-2.min.css') }}" rel="stylesheet">

     <!-- Custom styles for this page -->
     <link href="{{ asset('style/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">


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
                                <a href="{{url('donor/add')}}" class="btn btn-primary btn-circle me-2" data-bs-toggle="tooltip" title="Add"><i class="fas fa-plus"></i></a>
                                {{-- <a href="" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Master/Detail Add"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
                                  </svg>
                                </a> --}}
                              </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="text-center fw-bold">
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
                                            <th colspan="4">Aksi</th>
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
                                        @foreach($donor as $item)
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
                                            <td>{{ $item->komitmenSdgs->name }}</td>
                                            <td>{{ $item->date }}</td>
                                            {{-- <td><img height="50px" src="{{url('')}}/{{$item->dokumen}}" class="rounded" alt=""></td> --}}
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
                                                    <a href="{{ url('donor/'.$item->id)}}" class="btn btn-info btn-circle" data-bs-toggle="tooltip" title="View">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                    <a href="{{ url('donor/'.$item->id.'/edit')}}" class="btn btn-warning btn-circle" data-bs-toggle="tooltip" title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                                        </svg>
                                                    </a>
                                                    <form action="{{ url('donor/'.$item->id) }}" method="POST" id="delete-form-{{ $item->id }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-circle delete-btn" data-confirm-delete="true" data-bs-toggle="tooltip" title="Delete" data-donor-id="{{ $item->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- <div class="card-footer">
                            {{ $donor->links}}
                        </div> --}}
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

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('style/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('style/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('style/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('style/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('style/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('style/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('style/js/demo/datatables-demo.js')}}"></script>

    {{-- Custom Script Dialog --}}
    <script src="{{ asset('js_2/script.js')}}"></script>

    @include('sweetalert::alert')

</body>

</html>
