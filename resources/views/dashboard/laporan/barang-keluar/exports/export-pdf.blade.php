<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Barang Keluar</title>
    <link rel="stylesheet" type="text/css" href="{{ public_path('assets/css/laporan.css') }}">
</head>

<body class="text-dark">
    <div class="text-center mb-4">
        <h1>LAPORAN DATA BARANG KELUAR</h1>
        <span>Tanggal : {{ $tanggal_awal }} s.d. {{ $tanggal_akhir }}</span>
    </div>
    <hr>
    <div class="mt-4">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead class="bg-secondary text-white text-center">
                <tr>
                    <th>No.</th>
                    <th>ID Keluar</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Jumlah Keluar</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <tbody class="text-dark">
                @foreach ($barang_keluars as $index => $item)
                    <tr>
                        <td width="50" class="text-center"> {{ $index + 1 }} </td>
                        <td class="text-center">{{ $item->unique_id }}</td>
                        <td class="text-center">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                        <td>{{ $item->barang->unique_id }} - {{ $item->barang->nama_barang }}</td>
                        <td class="text-center">{{ $item->jumlah }}</td>
                        <td class="text-center">{{ $item->barang->satuan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-right mt-5">............, {{ \Carbon\Carbon::parse(now())->translatedFormat('d F Y') }}</div>
</body>

</html>

