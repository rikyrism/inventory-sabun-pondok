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
            <th align="center">Harga Barang</th>
            <th align="center">Varian</th>
            <th align="center">Jumlah Keluar</th>
            <th align="center">Ukuran</th>
            <th align="center">Penerima Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang_keluars as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-center">{{ $item->id_keluar }}</td>
                <td class="text-center">{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                <td>{{ $item->barangTable->id_barang }} - {{ $item->barangTable->nama_barang }}</td>
                <td class="text-center">{{ $item->barangTable->harga_barang }}</td>
                <td class="text-center">{{ $item->barangTable->nama_varian }}</td>
                <td class="text-center">{{ $item->jumlah }}</td>
                <td class="text-center">{{ $item->barangTable->ukuran }} ml</td>
                <td class="text-center">{{ $item->penerima_keluar }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

