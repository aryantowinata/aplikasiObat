<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Sisa Stok Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>

<body>
    <h2>LAPORAN SISA STOK AKHIR OBAT DAN PERBEKALAN KESEHATAN</h2>
    <p>Periode:
        {{ request('tanggal_awal') ? request('tanggal_awal') : date('d-m-Y') }} -
        {{ request('tanggal_akhir') ? request('tanggal_akhir') : date('d-m-Y') }}
    </p>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>KODE OBAT</th>
                <th>NAMA OBAT</th>
                <th>SATUAN</th>
                <th>JUMLAH</th>
                <th>TANGGAL KADALUARSA</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $obat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $obat->kode_obat }}</td>
                <td>{{ $obat->nama_obat }}</td>
                <td>{{ $obat->satuan }}</td>
                <td>{{ $obat->jumlah }}</td>
                <td>{{ $obat->tanggal_kadaluarsa }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        <p>Bengkalis, 30 JUNI 2024</p>
        <p>Mengetahui,</p>
        <p>Kepala Puskesmas</p>
        <p>UPT Puskesmas Meskom</p>
        <p>____________________</p>
        <p>ARI YANI, A.R.S., Kep</p>
        <p>NIP. 19821212820003 2 004</p>
    </div>
</body>

</html>