
<!DOCTYPE html>
<html lang="en">

<head>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @include('layouts.template')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('home')}}">
                <div class="sidebar-brand-text mx-3">Care Indonesia</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="{{url('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="{{url('donor')}}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Donor</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{url('narahubung')}}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Narahubung</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{url('komunikasi')}}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Komunikasi</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{url('proposal')}}">
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
                                    src="{{ asset('style/img/undraw_profile.svg')}}">
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
                                <h6 class="m-0 font-weight-bold text-danger">Proposal Add</h6>
                            </div>
                            <div>
                                <a href="" class="btn btn-primary btn-circle me-2" data-bs-toggle="tooltip" title="Add"><i class="fas fa-plus"></i></a>
                                {{-- <a href="" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Master/Detail Add"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
                                  </svg>
                                </a> --}}
                              </div>
                        </div>
                        <div class="card-body">
                            {{-- Form Add --}}
                            <div class="row">
                                <div class="col-8">
                                    {{-- <form action="{{ url('komunikasi') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="donor_id">Donor ID</label>
                                            <select class="form-select form-control" name="donor_id" id="donor_id">
                                                <option value="">--Pilih Donor ID--</option>
                                                @foreach($donorID as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_organisasi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="date" placeholder="Tanggal"
                                                class="form-control @error('tanggal') is-invalid @enderror"
                                                id="tanggal" name="tanggal"
                                                value="{{ old('tanggal') }}">
                                            @error('tanggal')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="saluran_id">Saluran</label>
                                            <select class="form-select form-control" name="saluran_id" id="saluran_id">
                                                <option value="">--Pilih Saluran--</option>
                                                @foreach($saluran as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenjang_komunikasi_id">Jenjang Komunikasi</label>
                                            <select class="form-select form-control" name="jenjang_komunikasi_id" id="jenjang_komunikasi_id">
                                                <option value="">--Pilih Jenjang Komunikasi--</option>
                                                @foreach($jenjangKomunikasi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tindak_lanjut_id">Tindak Lanjut</label>
                                            <select class="form-select form-control" name="tindak_lanjut_id" id="tindak_lanjut_id">
                                                <option value="">--Pilih Tindak Lanjut--</option>
                                                @foreach($tindakLanjut as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="catatan">Catatan</label>
                                            <textarea type="text" placeholder="Catatan"
                                                class="form-control @error('catatan') is-invalid @enderror"
                                                id="catatan" name="catatan"
                                                value="{{ old('catatan') }}"></textarea>
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
                                            <label for="dokumen" class="form-label">Dokumen</label>
                                            <input type="file" class="form-control" id="dokumen" name="dokumen" onchange="validateFile()">
                                            <small class="text-muted">File harus berupa gambar (jpg, jpeg, png, gif) atau PDF.</small>
                                            <span id="file-error" class="text-danger"></span>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a href="{{ url('komunikasi') }}" class="btn btn-outline-primary">Cancel</a>
                                    </form> --}}
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
