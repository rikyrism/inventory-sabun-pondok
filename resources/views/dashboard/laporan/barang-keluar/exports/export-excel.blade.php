<h4 align="center">LAPORAN DATA BARANG KELUAR</h4>
<p align="center"> Tanggal {{ $tanggal_awal }} s.d. {{ $tanggal_akhir }}</p>

<!-- tabel untuk menampilkan data dari database -->
<table border="1">
    <thead>
        <tr>
            <th align="center">No.</th>
            <th align="center">ID Keluar</th>
            <th align="center">Tanggal</th>
            <th align="center">Barang</th>
            <th align="center">Jumlah Keluar</th>
            <th align="center">Satuan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang_keluars as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-center">{{ $item->unique_id }}</td>
                <td class="text-center">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                <td>{{ $item->barang->unique_id }} - {{ $item->barang->nama_barang }}</td>
                <td class="text-center">{{ $item->jumlah }}</td>
                <td class="text-center">{{ $item->barang->satuan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

