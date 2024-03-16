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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div>
                                <h6 class="m-0 font-weight-bold text-danger">Donor Edit</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- Form Edit --}}
                            <div class="row">
                                <div class="col-8">
                                    <form action="{{ route('donor.update', ['donor' => $donor->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf

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
                                            <label for="date">Date</label>
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
                                            <label for="dokumen" class="form-label">Dokumen</label>
                                            <input type="file" class="form-control" id="dokumen"
                                                name="dokumen">
                                            <br>
                                            @if ($donor->dokumen)
                                                <input type="text" class="form-control"
                                                    value="{{ basename($donor->dokumen) }}" readonly>
                                                <br>
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
                                                <p>Tidak ada dokumen</p>
                                            @endif
                                        </div>
                                        <!-- Tombol Submit -->
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ url('donor') }}" class="btn btn-outline-primary">Cancel</a>
                                    </form>

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
