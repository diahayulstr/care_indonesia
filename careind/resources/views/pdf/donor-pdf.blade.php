<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <style>
        /* @page {
            size: landscape;
        } */

        @media print {
            .page-break {
                page-break-before: always;
            }

            .data-donor {
                page-break-inside: avoid;
            }
        }

        .spacer {
            padding-bottom: 20px; /* Sesuaikan dengan jarak yang diinginkan */
        }

        .table {
            font-family: 'Times New Roman';
            color: #000000;
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            width: 150px;
        }

        .table,
        th,
        td {
            border: 0.5px solid #000000;
            padding: 8px 20px;
        }

        #title {
            text-align: center;
        }
    </style>


</head>

<body>
    <h3 id="title">Daftar Profil Donor/Client</h3>
    @forelse ($donor as $donors)
        <div class="page-break">
            <div class="data-donor">
                <table class="table">
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
        </div>
        <div class="spacer"></div>
    @empty
        <div class="page-break">
            <table class="table table-hover table-bordered">
                <tbody>
                    <tr>
                        <th></th>
                        <td colspan="15" class="text-center">Tidak ada data...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforelse
</body>

</html>
