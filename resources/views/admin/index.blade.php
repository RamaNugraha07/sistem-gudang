@extends('guest.template.app')

@section('title', 'Admin')
<div class="container">
    <h1>Daftar Mutasi</h1>
    <a href="{{ route('mutasi.create') }}" class="btn btn-primary mb-3">Tambah Mutasi</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Barang</th>
                <th>User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mutasis as $mutasi)
            <tr>
                <td>{{ $mutasi->tanggal_mutasi }}</td>
                <td>{{ ucfirst($mutasi->jenis_mutasi) }}</td>
                <td>{{ $mutasi->jumlah_mutasi }}</td>
                <td>{{ $mutasi->barang->nama_barang }}</td>
                <td>{{ $mutasi->user->name }}</td>
                <td>
                    <form action="{{ route('mutasi.destroy', $mutasi->id_mutasi) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mutasi ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
