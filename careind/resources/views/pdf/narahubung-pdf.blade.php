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
        }

        .table {
            font-family: sans-serif;
            color: #000000;
            border-collapse: collapse;
            width: 100%;
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
    <h3 id="title">Daftar Narahubung Client</h3>
    <table class="table">
        <thead>
            <tr class="text-center fw-bold" style="background-color: rgba(220, 53, 69, 0.2);">
                <th>No</th>
                <th>Donor ID</th>
                <th>Nama Kontak</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($narahubung as $item)
                <tr>
                    <td scope="row" class="fw-bold"
                        style="text-align: center">
                        {{ $loop->iteration }}</td>
                    <td>{{ $item->donorID->nama_organisasi }}</td>
                    <td>{{ $item->nama_kontak }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->status->name }}</td>
                @empty
                    <td colspan="10" class="text-center">Tidak ada
                        data...</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
