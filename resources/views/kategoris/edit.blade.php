<!-- resources/views/kategoris/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Kategori</h1>

    <form action="{{ route('kategoris.update', $kategori->id_kategori) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" name="nama_kategori" class="form-control" value="{{ $kategori->nama_kategori }}" required>
        </div>

        <!-- Tambahkan isian form sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>

    <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
