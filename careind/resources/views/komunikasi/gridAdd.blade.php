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
            <li class="nav-item active">
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
                                <h6 class="m-0 font-weight-bold text-danger">Grid Add Komunikasi</h6>
                            </div>
                            <div>
                                @if (Auth::user()->role_id != 1)

                                @else
                                    <a href="#" class="btn btn-outline-danger btn-circle me-2 dash-button-add"
                                        id="btn-blank-row-komunikasi" data-bs-toggle="tooltip" title="Add Blank Row">
                                        <i class="fas fa-plus icon-kom"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <form action="{{ url('grid_add/komunikasi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="table-responsive" id="tabel-grid">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="text-center fw-bold" style="width: 250px;">
                                                <th>Donor ID</th>
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
                                        <tbody>
                                            {{-- @for ($i = 1; $i <= 3; $i++) --}}
                                            <tr>
                                                <td><select class="form-select form-control" name="inputs_komunikasi[0][donor_id]" id="donor_id">
                                                    <option value="">--Pilih Donor ID--</option>
                                                    @foreach ($donorID as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_organisasi }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </td>
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
                                            {{-- @endfor --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ url('komunikasi') }}" class="btn btn-outline-primary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add</button>
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

    <script id="donorIDs" type="application/json">
        {!! json_encode($donorID) !!}
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

    <script>
        var donorIDs = JSON.parse(document.getElementById("donorIDs").textContent);
        var saluranIDs = JSON.parse(document.getElementById("saluranIDs").textContent);
        var jenjangkomunikasiIDs = JSON.parse(document.getElementById("jenjangkomunikasiIDs").textContent);
        var tindaklanjutIDs = JSON.parse(document.getElementById("tindaklanjutIDs").textContent);
        function addBlankRow() {
            var tableBody = document.querySelector("table tbody");
            var newRow = document.createElement("tr");
            var i = tableBody.children.length;
            newRow.innerHTML = `
                                    <td><select class="form-select form-control" name="inputs_komunikasi[${i}][donor_id]">
                                        <option value="">--Pilih Donor ID--</option>
                                        </select>
                                    </td>
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

            var donorSelect = newRow.querySelector(`select[name='inputs_komunikasi[${i}][donor_id]']`);
            donorIDs.forEach(function(donor) {
                var option = document.createElement('option');
                option.value = donor.id;
                option.text = donor.nama_organisasi;
                donorSelect.appendChild(option);
            });

            var saluranSelect = newRow.querySelector(`select[name='inputs_komunikasi[${i}][saluran_id]']`);
            saluranIDs.forEach(function(saluran) {
                var option = document.createElement('option');
                option.value = saluran.id;
                option.text = saluran.name;
                saluranSelect.appendChild(option);
            });

            var jenjangkomunikasiSelect = newRow.querySelector(`select[name='inputs_komunikasi[${i}][jenjang_komunikasi_id]']`);
            jenjangkomunikasiIDs.forEach(function(jenjang_komunikasi) {
                var option = document.createElement('option');
                option.value = jenjang_komunikasi.id;
                option.text = jenjang_komunikasi.name;
                jenjangkomunikasiSelect.appendChild(option);
            });

            var tindaklanjutSelect = newRow.querySelector(`select[name='inputs_komunikasi[${i}][tindak_lanjut_id]']`);
            tindaklanjutIDs.forEach(function(tindak_lanjut) {
                var option = document.createElement('option');
                option.value = tindak_lanjut.id;
                option.text = tindak_lanjut.name;
                tindaklanjutSelect.appendChild(option);
            });

            tableBody.appendChild(newRow);
            newRow.querySelector("#delete-btn-row-komunikasi").addEventListener("click", deleteRow);
        }

        document.getElementById("btn-blank-row-komunikasi").addEventListener("click", function (event) {
            event.preventDefault();
            addBlankRow();
        });

        function deleteRow(event) {
            var deleteButton = event.target;
            var rowToDelete = deleteButton.closest("tr");
            if (rowToDelete) {
                rowToDelete.remove();
            }
        }

        document.querySelectorAll("#delete-btn-row-komunikasi").forEach(function (button) {
            button.addEventListener("click", function (event) {
                deleteRow(event);
            });
        });
    </script>

    @include('layouts.template')
</body>

</html>
