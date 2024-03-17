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
                                <h6 class="m-0 font-weight-bold text-danger">Master/Detail View</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Default Tabs -->
                            <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100 active" id="donor-tab" data-bs-toggle="tab"
                                        data-bs-target="#donor-justified" type="button" role="tab"
                                        aria-controls="donor" aria-selected="true">Donor</button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100" id="narahubung-tab" data-bs-toggle="tab"
                                        data-bs-target="#narahubung-justified" type="button" role="tab"
                                        aria-controls="narahubung" aria-selected="false">Narahubung</button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100" id="komunikasi-tab" data-bs-toggle="tab"
                                        data-bs-target="#komunikasi-justified" type="button" role="tab"
                                        aria-controls="komunikasi" aria-selected="false">Komunikasi</button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link w-100" id="proposal-tab" data-bs-toggle="tab"
                                        data-bs-target="#proposal-justified" type="button" role="tab"
                                        aria-controls="proposal" aria-selected="false">Proposal</button>
                                </li>
                            </ul>


                            <div class="tab-content pt-4" id="myTabjustifiedContent">
                                {{-- DONOR --}}
                                <div class="tab-pane fade show active" id="donor-justified" role="tabpanel"
                                    aria-labelledby="donor-tab">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Donor ID</th>
                                                    <td>{{ $donor->id }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Nama Organisasi</th>
                                                    <td>{{ $donor->nama_organisasi }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Alamat</th>
                                                    <td>{{ $donor->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Provinsi</th>
                                                    <td>{{ $donor->provinsi->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Kabupaten</th>
                                                    <td>{{ $donor->kabupaten->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Kecamatan</th>
                                                    <td>{{ $donor->kecamatan->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Desa</th>
                                                    <td>{{ $donor->desa->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Website</th>
                                                    <td>{{ $donor->website }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Informasi Singkat</th>
                                                    <td>{{ $donor->informasi_singkat }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Jenis Organisasi</th>
                                                    <td>{{ $donor->jenisOrganisasi->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Komitmen SDGs</th>
                                                    @php $komitSdgs = json_decode($donor->komitmen_sdgs); @endphp
                                                    <td>
                                                        @foreach ($komitSdgs as $komit_sdgs)
                                                            {{ \App\Models\TabelKomitmenSdg::find($komit_sdgs)->name }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Tanggal</th>
                                                    <td>{{ $donor->date }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Dokumen</th>
                                                    <td>
                                                        @if ($donor->dokumen)
                                                            @php
                                                                $extension = pathinfo(
                                                                    $donor->dokumen,
                                                                    PATHINFO_EXTENSION,
                                                                );
                                                            @endphp
                                                            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                                <img src="{{ url('') }}/{{ $donor->dokumen }}"
                                                                    alt="Pratinjau Gambar"
                                                                    style="max-width: 300px; max-height: 300px;">
                                                            @elseif ($extension === 'pdf')
                                                                <embed
                                                                    src="{{ url('') }}/{{ $donor->dokumen }}"
                                                                    type="application/pdf" width="500"
                                                                    height="500">
                                                            @else
                                                                Tidak ada pratinjau
                                                            @endif
                                                        @else
                                                            Tidak ada dokumen
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- NARAHUBUNG --}}
                                <div class="tab-pane fade " id="narahubung-justified" role="tabpanel"
                                    aria-labelledby="narahubung-tab">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h2></h2>
                                        <div class="action-buttons">
                                            <a href="#" class="btn btn-primary btn-circle me-2" title="Add"
                                                data-bs-toggle="modal" data-bs-target="#form-master-narahubung"
                                                id="btn-addmaster-narahubung" data-id="{{ $donor->id }}">
                                                <i class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr class="text-center fw-bold">
                                                    <th>Narahubung ID</th>
                                                    <th>Nama Kontak</th>
                                                    <th>Jabatan</th>
                                                    <th>Email</th>
                                                    <th>No Telepon</th>
                                                    <th>Status</th>
                                                    <th colspan="4">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($narahubungs as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->nama_kontak }}</td>
                                                        <td>{{ $item->jabatan }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->no_telp }}</td>
                                                        <td id="statusact">
                                                            @if ($item->status->name == 'Aktif')
                                                                <button
                                                                    class="status-button bg-success active">{{ $item->status->name }}</button>
                                                            @else
                                                                <button
                                                                    class="status-button bg-danger inactive">{{ $item->status->name }}</button>
                                                            @endif
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="action-buttons d-flex justify-content-center">
                                                                <div class="d-inline-block">
                                                                    <a href="{{ url('narahubung/' . $item->id) }}"
                                                                        class="btn btn-info btn-circle"
                                                                        data-bs-toggle="tooltip" title="View">
                                                                        <i class="fas fa-search"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="d-inline-block mx-1">
                                                                    <a href="#"
                                                                        class="btn btn-warning btn-circle"
                                                                        id="btn-editmaster-narahubung" title="Edit"
                                                                        data-id = "{{ $item->id }}"
                                                                        data-donor-id = "{{ $item->donor_id }}"
                                                                        data-nama-kontak = "{{ $item->nama_kontak }}"
                                                                        data-jabatan = "{{ $item->jabatan }}"
                                                                        data-email = "{{ $item->email }}"
                                                                        data-no-telp = "{{ $item->no_telp }}"
                                                                        data-status-id = "{{ $item->status->id }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor"
                                                                            class="bi bi-pencil-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                                <div class="d-inline-block">
                                                                    <form
                                                                        action="{{ url('master_narahubung/' . $item->id) }}"
                                                                        method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button
                                                                            class="btn btn-danger btn-circle delete-btn"
                                                                            data-confirm-delete="true"
                                                                            data-bs-toggle="tooltip" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @empty
                                                        <td colspan="10" class="text-center">Tidak ada data...</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- KOMUNIKASI --}}
                                <div class="tab-pane fade" id="komunikasi-justified" role="tabpanel"
                                    aria-labelledby="komunikasi-tab">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h2></h2>
                                        <div class="action-buttons">
                                            <a href="#" class="btn btn-primary btn-circle me-2" title="Add"
                                                data-bs-toggle="modal" data-bs-target="#form-add-master-komunikasi"
                                                id="btn-addmaster-komunikasi"
                                                data-id="{{ $donor->nama_organisasi }}"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr class="text-center fw-bold">
                                                    <th>Komunikasi ID</th>
                                                    <th>Tanggal</th>
                                                    <th>Saluran</th>
                                                    <th>Jenjang Komunikasi</th>
                                                    <th>Tindak Lanjut</th>
                                                    <th>Catatan</th>
                                                    <th>Tanggal Selanjutnya</th>
                                                    <th>Dokumen</th>
                                                    <th colspan="4">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($komunikasis as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->tanggal }}</td>
                                                        <td>{{ $item->saluran->name }}</td>
                                                        <td>{{ $item->jenjangKomunikasi->name }}</td>
                                                        <td>{{ $item->tindakLanjut->name }}</td>
                                                        <td>{{ $item->catatan }}</td>
                                                        <td>{{ $item->tgl_selanjutnya }}</td>
                                                        <td>
                                                            @if ($item->dokumen)
                                                                @php
                                                                    $extension = pathinfo(
                                                                        $item->dokumen,
                                                                        PATHINFO_EXTENSION,
                                                                    );
                                                                @endphp
                                                                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                                    <img src="{{ url('') }}/{{ $item->dokumen }}"
                                                                        alt="Pratinjau Gambar"
                                                                        style="max-width: 100px; max-height: 100px;">
                                                                @elseif ($extension === 'pdf')
                                                                    <embed
                                                                        src="{{ url('') }}/{{ $item->dokumen }}"
                                                                        type="application/pdf" width="200"
                                                                        height="200">
                                                                @else
                                                                    Tidak ada pratinjau
                                                                @endif
                                                            @else
                                                                Tidak ada dokumen
                                                            @endif
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="action-buttons d-flex justify-content-center">
                                                                <div class="d-inline-block">
                                                                    <a href="{{ url('komunikasi/' . $item->id) }}"
                                                                        class="btn btn-info btn-circle"
                                                                        data-bs-toggle="tooltip" title="View">
                                                                        <i class="fas fa-search"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="d-inline-block mx-1">
                                                                    <a href="#"
                                                                        class="btn btn-warning btn-circle"
                                                                        id="btn-editmaster-komunikasi"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#form-edit-master-komunikasi"
                                                                        title="Edit"
                                                                        data-komunikasi-id="{{ $item->id }}"
                                                                        data-donor-id="{{ $item->donorID->nama_organisasi }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor"
                                                                            class="bi bi-pencil-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                                <div class="d-inline-block">
                                                                    <form
                                                                        action="{{ url('master_komunikasi/' . $item->id) }}"
                                                                        method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button
                                                                            class="btn btn-danger btn-circle delete-btn"
                                                                            data-confirm-delete="true"
                                                                            data-bs-toggle="tooltip" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @empty
                                                        <td colspan="10" class="text-center">Tidak ada data...</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- PROPOSAL --}}
                                <div class="tab-pane fade " id="proposal-justified" role="tabpanel"
                                    aria-labelledby="proposal-tab">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h2></h2>
                                        <div class="action-buttons">
                                            <a href="#" class="btn btn-primary btn-circle me-2" title="Add"
                                                data-bs-toggle="modal" data-bs-target="#form-add-master-proposal"
                                                id="btn-addmaster-proposal"
                                                data-id="{{ $donor->nama_organisasi }}"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr class="text-center fw-bold">
                                                    <th>Proposal ID</th>
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
                                                @forelse($proposals as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->tujuanPendanaan->name }}</td>
                                                        <td>{{ $item->jenisPenerimaan->name }}</td>
                                                        <td>{{ $item->saluranPendanaan->name }}</td>
                                                        <td>{{ $item->jenisIntermediaries->name }}</td>
                                                        <td>{{ $item->nama_proyek }}</td>
                                                        <td>{{ $item->klasifikasiPortfolios->name }}</td>
                                                        <!-- Mengubah JSON impact_goals_id menjadi array -->
                                                        @php $impactGoalsIds = json_decode($item->impact_goals_id); @endphp
                                                        <!-- Mendapatkan nama impact goals berdasarkan id -->
                                                        <td>
                                                            @foreach ($impactGoalsIds as $impactGoalId)
                                                                {{ \App\Models\TabelImpactGoals::find($impactGoalId)->name }}
                                                                <!-- Tambahkan pemisah antara nama impact goals jika diperlukan -->
                                                                @if (!$loop->last)
                                                                    ,
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        {{-- <td>{{ $item->impactGoals->name }}</td> --}}
                                                        <td>{{ $item->estimasi_nilai_usd }}</td>
                                                        <td>{{ $item->estimasi_nilai_idr }}</td>
                                                        <td>{{ $item->usulan_durasi }}</td>
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
                                                            @if ($item->dokumen)
                                                                @php
                                                                    $extension = pathinfo(
                                                                        $item->dokumen,
                                                                        PATHINFO_EXTENSION,
                                                                    );
                                                                @endphp
                                                                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                                    <img src="{{ url('') }}/{{ $item->dokumen }}"
                                                                        alt="Pratinjau Gambar"
                                                                        style="max-width: 100px; max-height: 100px;">
                                                                @elseif ($extension === 'pdf')
                                                                    <embed
                                                                        src="{{ url('') }}/{{ $item->dokumen }}"
                                                                        type="application/pdf" width="200"
                                                                        height="200">
                                                                @else
                                                                    Tidak ada pratinjau
                                                                @endif
                                                            @else
                                                                Tidak ada dokumen
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="action-buttons d-flex justify-content-center">
                                                                <div class="d-inline-block">
                                                                    <a href="{{ url('proposal/' . $item->id) }}"
                                                                        class="btn btn-info btn-circle"
                                                                        data-bs-toggle="tooltip" title="View">
                                                                        <i class="fas fa-search"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="d-inline-block mx-1">
                                                                    <a href="#"
                                                                        class="btn btn-warning btn-circle"
                                                                        id="btn-editmaster-proposal"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#form-edit-master-proposal"
                                                                        title="Edit"
                                                                        data-proposal-id="{{ $item->id }}"
                                                                        data-donor-id="{{ $item->donorID->nama_organisasi }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor"
                                                                            class="bi bi-pencil-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                                <div class="d-inline-block">
                                                                    <form
                                                                        action="{{ url('master_proposal/' . $item->id) }}"
                                                                        method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button
                                                                            class="btn btn-danger btn-circle delete-btn"
                                                                            data-confirm-delete="true"
                                                                            data-bs-toggle="tooltip" title="Delete">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>
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


        <!-- Modal Add Master/Detail Narahubung -->
        <div class="modal fade" id="form-master-narahubung" role="dialog" data-bs-backdrop="static"
            tabindex="-1" aria-labelledby="formAddLabelNarahubung" aria-hidden="true">
            <form id="addmasterFormNarahubung" method="POST" action="{{ route('master.storeOrUpdate_narahubung', $donor->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="formAddLabelNarahubung">Form Narahubung</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-16">
                                    <input type="hidden" id="narahubung_id" name="narahubung_id">

                                    <div class="form-group">
                                        <label for="donor_id">Donor ID</label>
                                        <input type="text" class="form-control" name="donor_id"
                                            id="donor_id-master-narahubung" readonly
                                            value="{{ $item->donor_id ?? '' }}">
                                        @error('donor_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kontak">Nama Kontak</label>
                                        <input type="text" placeholder="Nama Kontak"
                                            class="form-control @error('nama_kontak') is-invalid @enderror"
                                            id="nama_kontak" name="nama_kontak" value="{{ old('nama_kontak') }}">
                                        @error('nama_kontak')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" placeholder="Jabatan"
                                            class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                            name="jabatan" value="{{ old('jabatan') }}">
                                        @error('jabatan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Email</label>
                                        <input type="email" placeholder="Email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp">No Telepon</label>
                                        <input type="tel" placeholder="No Telepon"
                                            class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                                            name="no_telp" value="{{ old('no_telp') }}">
                                        @error('no_telp')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status_id">Status</label>
                                        <select class="form-select" name="status_id" id="status_id">
                                            <option value="">--Pilih Status--</option>
                                            @foreach ($status as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>




        @include('layouts.template')



</body>

</html>
