<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <style>
        @page {
            size: landscape;
            margin: 1cm;
        }

        @media print {
            .page-break {
                page-break-before: always;
            }

            .data-donor {
                page-break-inside: avoid;
            }
        }

        .page-break h3 {
            margin-bottom: 2px;
        }

        .spacer {
            padding-bottom: 5px;
            /* Sesuaikan dengan jarak yang diinginkan */
        }

        .table,
        .table1 {
            font-family: 'Times New Roman';
            color: #000000;
            border-collapse: collapse;
            width: 100%;
        }

        .table1 th {
            width: 150px;
        }

        .table,
        .table1,
        th,
        td {
            border: 0.5px solid #000000;
            padding: 8px 20px;
        }

        #title {
            text-align: left;
            margin-left: 20px;
        }

        .auto-fit-text {
            font-size: 100%;
        }
    </style>
</head>

<body>

    {{-- Donor --}}
    <div class="page-break">
        <h3 id="title">Profil Donor/Client</h3>
        <table class="table1">
            <tbody>
                <tr style="background-color: rgba(220, 53, 69, 0.2);">
                    <th scope="row">Donor ID</th>
                    <td>{{ $donors->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Nama Organisasi</th>
                    <td>{{ $donors->nama_organisasi }}</td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td>{{ $donors->alamat }}</td>
                </tr>
                <tr>
                    <th scope="row">Provinsi</th>
                    <td>{{ $donors->provinsi->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Kabupaten</th>
                    <td>{{ $donors->kabupaten->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Kecamatan</th>
                    <td>{{ $donors->kecamatan->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Desa</th>
                    <td>{{ $donors->desa->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Website</th>
                    <td>{{ $donors->website }}</td>
                </tr>
                <tr>
                    <th scope="row">Informasi Singkat</th>
                    <td>{{ $donors->informasi_singkat }}</td>
                </tr>
                <tr>
                    <th scope="row">Jenis Organisasi</th>
                    <td>{{ $donors->jenisOrganisasi->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Komitmen SDGs</th>
                    @php $komitSdgs = json_decode($donors->komitmen_sdgs); @endphp
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
                    <td>{{ $donors->date }}</td>
                </tr>
                <tr>
                    <th scope="row">Dokumen</th>
                    <td>
                        @if ($donors->dokumen_donor)
                            {{ basename($donors->dokumen_donor) }}
                        @else
                            Tidak ada dokumen
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="spacer"></div>

    {{-- Narahubung --}}
    <div class="page-break">
        <h3 id="title">Narahubung Client</h3>
        <table class="table">
            <thead>
                <tr class="text-center fw-bold" style="background-color: rgba(220, 53, 69, 0.2);">
                    <th>No</th>
                    <th>Nama Kontak</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($narahubungs as $item)
                    <tr>
                        <td scope="row" class="fw-bold" style="text-align: center">
                            {{ $loop->iteration }}</td>
                        <td>{{ $item->nama_kontak }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->status->name }}</td>
                    @empty
                        <td colspan="6" class="text-center">Tidak ada
                            data...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="spacer"></div>

    {{-- Komunikasi --}}
    <div class="page-break">
        <h3 id="title">Komunikasi Client</h3>
        <table class="table">
            <thead>
                <tr class="text-center fw-bold" style="background-color: rgba(220, 53, 69, 0.2);">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Saluran</th>
                    <th>Jenjang Komunikasi</th>
                    <th>Tindak Lanjut</th>
                    <th>Catatan</th>
                    <th>Tanggal Selanjutnya</th>
                    <th style="max-width: 150px">Dokumen</th>
                </tr>
            </thead>
            <tbody>
                @forelse($komunikasis as $item)
                    <tr>
                        <td scope="row" class="fw-bold" style="text-align: center">
                            {{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->saluran->name }}</td>
                        <td>{{ $item->jenjangKomunikasi->name }}</td>
                        <td>{{ $item->tindakLanjut->name }}</td>
                        <td>{{ $item->catatan }}</td>
                        <td>{{ $item->tgl_selanjutnya }}</td>
                        <td class="auto-fit-text" style="max-width: 150px; overflow: hidden; word-wrap: break-word;">
                            @if ($item->dokumen_komunikasi)
                                {{ basename($item->dokumen_komunikasi) }}
                            @else
                                Tidak ada dokumen
                            @endif
                        </td>
                    @empty
                        <td colspan="8" class="text-center">Tidak ada
                            data...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="spacer"></div>

    {{-- Proposal --}}
    <div class="page-break">
        <h3 id="title">Proposal Client</h3>
        @forelse ($proposals as $item)
            <table class="table1">
                <tbody>
                    <tr style="background-color: rgba(220, 53, 69, 0.2);">
                        <th scope="row">Proposal ID</th>
                        <td>{{ $item->id }}</td>
                    </tr>
                    <tr>

                        <th scope="row">Tujuan Pendanaan</th>
                        <td>{{ $item->tujuanPendanaan->name }}</td>
                    </tr>
                    <tr>

                        <th scope="row">Jenis Penerimaan</th>
                        <td>{{ $item->jenisPenerimaan->name }}</td>
                    </tr>
                    <tr>

                        <th scope="row">Saluran Pendanaan</th>
                        <td>{{ $item->saluranPendanaan->name }}</td>
                    </tr>
                    <tr>

                        <th scope="row">Jenis Intermediary</th>
                        <td>{{ $item->jenisIntermediaries->name }}</td>
                    </tr>
                    <tr>

                        <th scope="row">Nama Proyek</th>
                        <td>{{ $item->nama_proyek }}</td>
                    </tr>
                    <tr>

                        <th scope="row">Klasifikasi Portfolio</th>
                        <td>{{ $item->klasifikasiPortfolios->name }}</td>
                    </tr>
                    @php $impactGoalsIds = json_decode($item->impact_goals_id); @endphp
                    <tr>

                        <th scope="row">Impact Goals</th>
                        <td>
                            @foreach ($impactGoalsIds as $impactGoalId)
                                {{ \App\Models\TabelImpactGoals::find($impactGoalId)->name }}
                                <!-- Tambahkan pemisah antara nama impact goals jika diperlukan -->
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>

                        <th scope="row">Estimasi Nilai USD</th>
                        <td>{{ $item->estimasi_nilai_usd }}</td>
                    </tr>
                    <tr>

                        <th scope="row">Estimasi Nilai IDR</th>
                        <td>{{ $item->estimasi_nilai_idr }}</td>
                    </tr>
                    <tr>

                        <th scope="row">Usulan Durasi</th>
                        <td>{{ $item->usulan_durasi }}</td>
                    </tr>
                    <tr>

                        <th scope="row">Status Kemajuan</th>
                        <td>{{ $item->statusKemajuan->name }}</td>
                    </tr>
                    <tr>

                        <th scope="row">Dokumen</th>
                        <td>
                            @if ($item->dokumen_proposal)
                                {{ basename($item->dokumen_proposal) }}
                            @else
                                Tidak ada dokumen
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="spacer"></div>
        @empty
            <div class="page-break">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td></td>
                            <th></th>
                            <td colspan="13" class="text-center">Tidak ada data...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforelse
    </div>
</body>

</html>
