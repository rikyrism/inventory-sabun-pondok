<!DOCTYPE html>
<html>

<head>
    <title>Laporan Stok Seluruh Barang</title>
    <link rel="stylesheet" type="text/css" href="{{ public_path('assets/css/laporan.css') }}">
</head>

<body class="text-dark">
    <div class="text-center mb-4">
        <h1>LAPORAN STOK SELURUH BARANG</h1>
    </div>
    <hr>
    <div class="mt-4">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead class="bg-secondary text-white text-center">
                <tr>
                    <th>No.</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <tbody class="text-dark">
                @foreach ($barangs as $index => $item)
                    <tr>
                        <td width="50" class="text-center"> {{ $index + 1 }} </td>
                        <td class="text-center">{{ $item->unique_id }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td class="text-right">
                            @if ($item->stok <= $item->stok_minimum)
                                <span class="badge badge-warning">{{ $item->stok }}</span>
                            @else
                                {{ $item->stok }}
                            @endif
                        </td>
                        <td class="text-center">{{ $item->satuan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-right mt-5">............, {{ \Carbon\Carbon::parse(now())->translatedFormat('d F Y') }}</div>
</body>

</html>

