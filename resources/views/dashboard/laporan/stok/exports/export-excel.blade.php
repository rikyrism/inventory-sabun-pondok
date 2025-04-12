<h4 align="center">LAPORAN STOK SELURUH BARANG</h4>
<!-- tabel untuk menampilkan data dari database -->
<table border="1">
    <thead>
        <tr>
            <th align="center">No.</th>
            <th align="center">ID Barang</th>
            <th align="center">Nama Barang</th>
            <th align="center">Stok</th>
            <th align="center">Ukuran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barangs as $index => $item)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td align="center">{{ $item->id_barang }}</td>
                <td align="center">{{ $item->nama_barang }}</td>
                @if ($item->stok <= $item->stok_minimum)
                    <td style="background-color:#ffad46;color:#fff">{{ $item->stok }}</td>
                @else
                    <td align="center">{{ $item->stok }}</td>
                @endif
                <td align="center">{{ $item->ukuran }} ml</td>
            </tr>
        @endforeach

    </tbody>
</table>

