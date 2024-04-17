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
            font-family: sans-serif;
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
    <h3 id="title">Daftar Proposal Client</h3>
    @forelse ($proposal as $item)
        <div class="page-break">
            <div class="data-donor">
                <table class="table">
                    <tbody>
                        <tr style="background-color: rgba(220, 53, 69, 0.2);">
                            <th scope="row">Donor ID</th>
                            <td>{{ $item->donorID->nama_organisasi }}</td>
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
                            <td>{{  $item->estimasi_nilai_usd }}</td>
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
