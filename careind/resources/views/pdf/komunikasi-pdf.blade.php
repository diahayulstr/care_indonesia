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
            width: 160px;
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
    <h3 id="title">Daftar Komunikasi Client</h3>
    @forelse ($komunikasi as $item)
        <div class="page-break">
            <div class="data-donor">
                <table class="table">
                    <tbody>
                        <tr style="background-color: rgba(220, 53, 69, 0.2);">
                            <th scope="row">Donor ID</th>
                            <td>{{ $item->donorID->nama_organisasi }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal</th>
                            <td>{{ $item->tanggal }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Saluran</th>
                            <td>{{ $item->saluran->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jenjang Komunikasi</th>
                            <td>{{ $item->jenjangKomunikasi->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tindak Lanjut</th>
                            <td>{{ $item->tindakLanjut->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Catatan</th>
                            <td>{{ $item->catatan }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Selanjutnya</th>
                            <td>{{ $item->tgl_selanjutnya }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Dokumen</th>
                            <td>
                                @if ($item->dokumen_komunikasi)
                                    {{ basename($item->dokumen_komunikasi) }}
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
                        <td colspan="10" class="text-center">Tidak ada data...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforelse
</body>

</html>
