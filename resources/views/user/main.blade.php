@extends('guest.template.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5 text-dark">
    <h3 class="mb-4">Data Barang</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Tambah -->
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <input type="text" name="nama_barang" placeholder="Nama Barang" required>
        <input type="text" name="kode_barang" placeholder="Kode Barang" required>
        <input type="text" name="kategori_barang" placeholder="Kategori" required>
        <input type="text" name="lokas_barang" placeholder="Lokasi" required>
        <input type="number" name="stock_barang" placeholder="Stok" required>
        <input type="text" name="satuan_barang" placeholder="Satuan" required>
        <button type="submit">Tambah</button>
    </form>

    <!-- Tabel -->
    <table border="1" cellpadding="5" class="mt-4 text-dark">
        <tr>
            <th>Nama</th><th>Kode</th><th>Kategori</th><th>Lokasi</th><th>Stok</th><th>Satuan</th><th>Aksi</th>
        </tr>
        @foreach($barangs as $item)
        <tr>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->kode_barang }}</td>
            <td>{{ $item->kategori_barang }}</td>
            <td>{{ $item->lokas_barang }}</td>
            <td>{{ $item->stock_barang }}</td>
            <td>{{ $item->satuan_barang }}</td>
            <td>
                <!-- Edit -->
                <a href="{{ route('barang.edit', $item->id_barang) }}">
                    <button>Update</button>
                </a>

                <!-- Delete -->
                <form action="{{ route('barang.destroy', $item->id_barang) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')">🗑️</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
