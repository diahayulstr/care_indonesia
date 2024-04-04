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

            @if(Auth::user()->role_id != 1)
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
                        <a class="collapse-item" href="{{ url('klasifikasi_portfolio') }}">Klasifikasi Portfolio</a>
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div>
                                <h6 class="m-0 font-weight-bold text-danger">Donor Edit</h6>
                            </div>
                        </div>
                        <form id="form-edit-donor" action="{{ route('donor.update', ['donor' => $donor->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                {{-- Form Edit --}}
                                <div class="row">
                                    <div class="col-16">
                                        <!-- Nama Organisasi -->
                                        <div class="form-group">
                                            <label for="nama_organisasi">Nama Organisasi</label>
                                            <input type="text" placeholder="Nama Organisasi"
                                                class="form-control @error('nama_organisasi') is-invalid @enderror"
                                                id="nama_organisasi" name="nama_organisasi"
                                                value="{{ old('nama_organisasi') ?? $donor->nama_organisasi }}">
                                            @error('nama_organisasi')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Alamat -->
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" placeholder="Alamat"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                id="alamat" name="alamat"
                                                value="{{ old('alamat') ?? $donor->alamat }}">
                                            @error('alamat')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Negara -->
                                        <div class="form-group">
                                            <label for="negara">Negara</label>
                                            <input type="text" placeholder="Negara"
                                                class="form-control @error('negara') is-invalid @enderror"
                                                id="negara" name="negara"
                                                value="{{ old('negara') ?? $donor->negara }}">
                                            @error('negara')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Provinsi -->
                                        <div class="form-group">
                                            <label for="provinsi_id">Provinsi</label>
                                            <select class="form-select" name="provinsi_id" id="provinsi_id">
                                                <option value="">Pilih Provinsi</option>
                                                @foreach ($provinces as $provinsi)
                                                    <option value="{{ $provinsi->id }}"
                                                        {{ $provinsi->id == old('provinsi_id', $donor->provinsi_id) ? 'selected' : '' }}>
                                                        {{ $provinsi->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('provinsi_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Kabupaten -->
                                        <div class="form-group">
                                            <label for="kabupaten_id">Kabupaten</label>
                                            <select class="form-select" name="kabupaten_id" id="kabupaten_id">
                                                <option value="{{ $donor->kabupaten->id }}"
                                                    {{ $donor->kabupaten->id == old('kabupaten_id', $donor->kabupaten_id) ? 'selected' : '' }}>
                                                    {{ $donor->kabupaten->name }}</option>
                                            </select>
                                            @error('kabupaten_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Kecamatan -->
                                        <div class="form-group">
                                            <label for="kecamatan_id">Kecamatan</label>
                                            <select class="form-select" name="kecamatan_id" id="kecamatan_id">
                                                <option value="{{ $donor->kecamatan->id }}"
                                                    {{ $donor->kecamatan->id == old('kecamatan_id', $donor->kecamatan_id) ? 'selected' : '' }}>
                                                    {{ $donor->kecamatan->name }}</option> }
                                            </select>
                                            @error('kecamatan_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Desa -->
                                        <div class="form-group">
                                            <label for="desa_id">Desa</label>
                                            <select class="form-select" name="desa_id" id="desa_id">
                                                <option value="{{ $donor->desa->id }}"
                                                    {{ $donor->desa->id == old('desa_id', $donor->desa_id) ? 'selected' : '' }}>
                                                    {{ $donor->desa->name }}</option>
                                            </select>
                                            @error('desa_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Website -->
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="text" placeholder="Website"
                                                class="form-control @error('website') is-invalid @enderror"
                                                id="website" name="website"
                                                value="{{ old('website') ?? $donor->website }}">
                                            @error('website')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Informasi Singkat -->
                                        <div class="form-group">
                                            <label for="informasi_singkat">Informasi Singkat</label>
                                            <textarea placeholder="Informasi Singkat" class="form-control @error('informasi_singkat') is-invalid @enderror"
                                                id="informasi_singkat" name="informasi_singkat">{{ old('informasi_singkat') ?? $donor->informasi_singkat }}</textarea>
                                            @error('informasi_singkat')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Jenis Organisasi -->
                                        <div class="form-group">
                                            <label for="jenis_organisasi_id">Jenis Organisasi</label>
                                            <select class="form-select" name="jenis_organisasi_id"
                                                id="jenis_organisasi_id">
                                                <option value="">Pilih Jenis Organisasi</option>
                                                @foreach ($jenisOrganisasis as $jenisOrganisasi)
                                                    <option value="{{ $jenisOrganisasi->id }}"
                                                        {{ $jenisOrganisasi->id == old('jenis_organisasi_id', $donor->jenis_organisasi_id) ? 'selected' : '' }}>
                                                        {{ $jenisOrganisasi->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('jenis_organisasi_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Komitmen SDGs -->
                                        <div class="form-group">
                                            <label for="komitmen_sdgs">Komitmen SDGs</label>
                                            <select class="form-select form-control" name="komitmen_sdgs[]"
                                                id="komitmen_sdgs" multiple>
                                                <option value="">Pilih Komitmen SDGs</option>
                                                @php $komitSdgs = json_decode($donor->komitmen_sdgs); @endphp
                                                @foreach ($komitmenSdgs as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ in_array($item->id, $komitSdgs) ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('komitmen_sdgs')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Date -->
                                        <div class="form-group">
                                            <label for="date">Tanggal</label>
                                            <input type="date"
                                                class="form-control @error('date') is-invalid @enderror"
                                                id="date" name="date"
                                                value="{{ old('date') ?? $donor->date }}">
                                            @error('date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Dokumen -->
                                        <div class="form-group mb-4">
                                            <label for="dokumen_donor" class="form-label">Dokumen</label>
                                            <input type="file" class="form-control" id="dokumen_donor"
                                                name="dokumen_donor">
                                            <br>
                                            @if ($donor->dokumen_donor)
                                                <input type="text" class="form-control"
                                                    value="{{ basename($donor->dokumen_donor) }}" readonly>
                                            @else
                                                <p>Tidak ada dokumen</p>
                                            @endif
                                        </div>
                                        <div id="filePreview-edit-donor"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end">
                                <!-- Tombol Submit -->
                                <a href="{{ url('donor') }}" class="btn btn-outline-primary">Cancel</a>
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
    <div class="modal fade text-black" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Logout Account</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body fw-light">Are you sure you want to logout? Once you logout you need to login again.</div>
                <div class="modal-footer">
                    <button class="btn btn-outline-primary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('logout') }}">Yes, Logout!</a>
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
