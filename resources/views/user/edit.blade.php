@extends('guest.template.app')

@section('title', 'Edit Barang')

@section('content')
<style>
    .center-screen {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="container center-screen">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Barang</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="nama">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama" class="form-control" value="{{ $barang->nama_barang }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="{{ $barang->kode_barang }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="kategori_barang">Kategori Barang</label>
                            <input type="text" name="kategori_barang" id="kategori_barang" class="form-control" value="{{ $barang->kategori_barang }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="lokas_barang">Lokasi Barang</label>
                            <input type="text" name="lokas_barang" id="lokas_barang" class="form-control" value="{{ $barang->lokas_barang }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="stock_barang">Stock Barang</label>
                            <input type="number" name="stock_barang" id="stock_barang" class="form-control" value="{{ $barang->stock_barang }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="satuan_barang">Satuan Barang</label>
                            <input type="text" name="satuan_barang" id="satuan_barang" class="form-control" value="{{ $barang->satuan_barang }}" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Update Barang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
