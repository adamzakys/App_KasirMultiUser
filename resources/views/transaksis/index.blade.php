<!-- resources/views/transaksis/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text mb-4">Daftar Transaksi</h1>
        <a href="{{ route('transaksis.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kasir</th>
                    <th>Tanggal</th>
                    <th>Total Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id_transaksi }}</td>
                        <td>
                            @if($transaksi->user)
                                @if($transaksi->user->trashed())
                                    <span style="color: red;">{{ $transaksi->user->nama }} [User Telah Dihapus]</span>
                                @else
                                    {{ $transaksi->user->nama }}
                                @endif
                            @else
                                [User Telah Dihapus]
                            @endif
                        </td>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td>{{ $transaksi->total_bayar }}</td>
                        <td>
                            <a href="{{ route('transaksis.show', $transaksi->id_transaksi) }}" class="btn btn-info btn-sm">Detail</a>
                            @if (Auth::user()->role == 'owner')
                                <form action="{{ route('transaksis.destroy', $transaksi->id_transaksi) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            @else
                                <button class="btn btn-danger btn-sm">Hapus</button> * Hanya owner
                            @endif
                            
                            <!-- Tambahkan tombol-tombol aksi lainnya jika diperlukan -->
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
