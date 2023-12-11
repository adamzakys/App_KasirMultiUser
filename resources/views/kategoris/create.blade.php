<!-- resources/views/kategoris/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Tambah Kategori</h1>

    <form action="{{ route('kategoris.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" name="nama_kategori" class="form-control" required>
        </div>

        <!-- Tambahkan isian form sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
