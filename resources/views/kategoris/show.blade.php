<!-- resources/views/kategoris/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Detail Kategori</h1>

    <p>ID: {{ $kategori->id_kategori }}</p>
    <p>Nama Kategori: {{ $kategori->nama_kategori }}</p>

    <h2>Daftar Menu</h2>
    <ul>
        @foreach ($menus as $menu)
            <li>{{ $menu->nama_menu }} - Harga: {{ $menu->harga_menu }}</li>
        @endforeach
    </ul>

    <a href="{{ route('kategoris.index') }}" class="btn btn-primary">Kembali</a>
@endsection
